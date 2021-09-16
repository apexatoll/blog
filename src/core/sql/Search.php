<?php namespace core\sql;

trait Search {
	protected function search($search, $where=null, $opts=[]){
		return $this->join([
			"SELECT *,",
			$this->relevance($this->weight()),
			"AS relevance FROM $this->table",
			$this->search_where($where, $opts['op'] ?? " AND "),
			$this->order(
				["relevance"=>"desc"]+($opts['order']?? [])),
			$this->limit($opts['limit']??null),
			$this->offset($opts['offset']??null)
		]);
	}
	private function relevance($weight){
		foreach($weight as $col => $val)
			$rel[]= sprintf("(%s * %s)", $val, $this->match_against($col));
		return implode(" + ", $rel);
	}
	private function match_against($column){
		return "(match($column) against (:search in boolean mode))";
	}
	private function search_where($where, $glue){
		return sprintf("WHERE %s%s", 
			$this->match_against($this->weight_columns()),
			$where ? 
				$glue.$this->placehold($where, $glue) : null
		);
	}
	private function weight_columns(){
		return implode(", ", array_keys($this->weight()));
	}
}
