<?php namespace core;

class Database extends SQL {
	private const ENV_KEYS = ["DB_HOST", "DB_NAME", "DB_USER", "DB_PASS"];
	private $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS;
	private $pdo;
	public function __construct($table){
		parent::__construct($table);
		$this->load_env();
		$this->pdo = $this->get_pdo();
	}
	protected function select($where=null, $opts=[]){
		$stmt = $this->stmt(parent::select($where, $opts));
		$stmt->execute($where);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	protected function insert($values){
		$stmt = $this->stmt(parent::insert($values));
		$stmt->execute($values);
		return $this->new_id();
	}
	protected function update($values, $where=null, $opts=[]){
		$stmt = $this->stmt(parent::update($values, $where, $opts));
		return $stmt->execute($values+$where??[]);
	}
	protected function delete($where, $opts=[]){
		$stmt = $this->stmt(parent::delete($where, $opts));
		return $stmt->execute($where);
	}
	protected function search($search, $where=null, $opts=[]){
		$stmt = $this->stmt(parent::search($search, $where, $opts));
		$stmt->execute($where+["search"=>$search]);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	protected function distinct_dates($type, $col, $where=null){
		$stmt = $this->stmt(parent::distinct_dates($type, $col, $where));
		$stmt->execute($where);
		return array_column($stmt->fetchAll(\PDO::FETCH_ASSOC), "$type($col)");
	}
	protected function select_date($col, $where=null){
		$stmt = $this->stmt(parent::select_date($col, $where));
		$stmt->execute($where);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	private function load_env(){
		foreach(self::ENV_KEYS as $key)
			$this->$key = $_ENV[$key];
	}
	private function get_pdo(){
		return new \PDO($this->dsn(), $this->DB_USER, $this->DB_PASS);
	}
	private function dsn(){
		return sprintf("mysql:host=%s;dbname=%s", 
			$this->DB_HOST, $this->DB_NAME);
	}
	private function stmt($sql){
		return $this->pdo->prepare($sql);
	}
	private function new_id(){
		return $this->pdo->lastInsertId();
	}
}
