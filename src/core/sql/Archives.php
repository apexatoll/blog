<?php namespace core\sql;

trait Archives {
	protected function distinct_dates($type, $col, $where=null){
		return $this->join([
			"SELECT distinct $type($col) FROM $this->table",
			$this->where_date($where, $col),
			$this->order(["$type($col)"=>"ASC"])
		]);
	}
	protected function select_date($col, $where=null){
		return $this->join([
			"SELECT * FROM $this->table",
			$this->where_date($where, $col)
		]);
	}
	private function where_date($where, $col){
		if(isset($where))
			return "WHERE ".$this->placehold_dates($where, $col);
	}
	private function placehold_dates($where, $col){
		foreach(array_keys($where) as $key)
			$frags[]= in_array($key, ["year", "month", "day"]) ?
				"$key($col) = :$key" :
				"$key = :$key";
		return implode(" AND ", $frags ?? []);
	}
}
