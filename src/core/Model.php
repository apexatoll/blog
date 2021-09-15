<?php namespace core;

abstract class Model extends Database {
	use traits\ClassParser;
	public function __construct($table=null){
		$this->group = $this->get_group_name();
		parent::__construct($table ?? $this->table_name());
	}
	public function set($data){
		foreach($data as $col => $val)
			if($val !== null && property_exists($this, $col))
				$this->$col = $val;
		return $this;
	}
	public function input($data){
		$this->set($data)->is_new() ?
			$this->input_callback("input_new"):
			$this->input_callback("input_edit");
		return $this;
	}
	public function load($where=null, $opts=[]){
		$this->set($this->find($where, $opts)??[]);
		return $this;
	}
	public function find_all($where=null, $opts=[]){
		if(is_string($where)||is_int($where))
			$where = [PRIMARY_KEY=>$where];
		return $this->select($where, $opts);
	}
	public function find($where=null, $opts=[]){
		return $this->find_all($where, $opts)[0] ?? null;
	}
	public function save(){
		return $this->is_new() ?
			$this->insert($this->build()):
			$this->update($this->build(), $this->id());
	}
	public function destroy(){
		$this->delete([PRIMARY_KEY=>$this->{PRIMARY_KEY}]);
	}
	public function build(){
		foreach($this->columns() as $col)
			if(isset($this->$col))
				$data[$col] = $this->$col;
		return $data;
	}
	public function build_with_id(){
		return $this->build() + $this->id();
	}
	public function count($where=null){
		return count($this->find_all($where));
	}
	protected function is_new(){
		return !isset($this->{PRIMARY_KEY});
	}
	protected function insert($values){
		$id = parent::insert($values);
		$this->{PRIMARY_KEY} = $id;
		return $id;
	}
	protected function flush(){
		foreach($this->columns() as $col)
			unset($this->$col);
		return $this;
	}
	protected function time_now(){
		return date("Y-m-d H:i:s");
	}
	private function id(){
		if(!$this->is_new())
			return [PRIMARY_KEY=>$this->{PRIMARY_KEY}];
	}
	private function input_callback($method){
		if(method_exists($this, $method))
			call_user_func([$this, $method]);
	}
}
