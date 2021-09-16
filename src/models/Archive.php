<?php namespace models;

class Archive extends \core\Model {
	private const COLUMN = "posted";
	private const DATES = ["year", "month", "day"];
	public function __construct(){
		parent::__construct("posts");
	}
	public function get_years($where){
		return $this->distinct_dates("year", self::COLUMN, $where);
	}
	public function get_months($where, $year){
		return $this->distinct_dates("month", self::COLUMN, $where + ["year"=>$year]);
	}
	public function get_days($where, $year, $month){
		return $this->distinct_dates("day", self::COLUMN, $where + ["year"=>$year, "month"=>$month]);
	}
	public function load_posts($where=[], $year=null, $month=null, $day=null){
		foreach([$year, $month, $day] as $i => $arg)
			if(isset($arg))
				$where[self::DATES[$i]] = $arg;
		return $this->select_date(self::COLUMN, $where);
	}
}
