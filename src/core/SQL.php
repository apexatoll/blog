<?php namespace core;

class SQL {
	use sql\Search;
	private $table;
	public function __construct($table){
		$this->table = $table;
	}
	protected function select($where=null, $opts=[]){
		return $this->join([
			$this->select_cols($opts['cols'] ?? "*"),
			$this->where($where, $opts['op'] ?? " AND "),
			$this->order($opts['order'] ?? null),
			$this->limit($opts['limit'] ?? null),
			$this->offset($opts['offset'] ?? null)
		]);
	}
	protected function insert($values){
		return $this->join([
			$this->insert_into(),
			$this->values($values)
		]);
	}
	protected function update($values, $where=null, $opts=[]){
		return $this->join([
			"UPDATE $this->table",
			$this->values($values),
			$this->where($where, $opts['op'] ?? " AND ")
		]);
	}
	protected function delete($where, $opts=[]){
		return $this->join([
			"DELETE FROM $this->table",
			$this->where($where, $opts['op'] ?? " AND ")
		]);
	}
	private function select_cols($cols){
		return "SELECT $cols FROM $this->table";
	}
	private function where($where, $glue){
		if($where)
			return "WHERE ".$this->placehold($where, $glue);
	}
	private function order($order){
		if($order)
			foreach($order as $key => $val)
				$frags[]= "$key $val";
		return isset($frags) ? 
			"ORDER BY ".implode(", ", $frags): null;
	}
	private function limit($limit){
		return $limit ? "LIMIT $limit" : null;
	}
	private function offset($offset){
		return $offset ? "OFFSET $offset" : null;
	}
	private function insert_into(){
		return "INSERT INTO $this->table";
	}
	private function values($values){
		return $values ?
			"SET ".$this->placehold($values, ", ") : null;
	}
	private function placehold($data, $glue){
		foreach(array_keys($data) as $key)
			$frags[]= "$key = :$key";
		return implode($glue, $frags);
	}
	private function join($frags){
		return implode(" ", $frags);
	}
}
