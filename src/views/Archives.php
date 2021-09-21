<?php namespace views;

use \DateTime as Date;

class Archives extends \core\View {
	use traits\Trees;
	use traits\ViewModel;
	public function tree($where){
		return join([
			$this->div("tree"),
			$this->buffer_method("year_nodes", $where),
			$this->_div()
		]);
	}
	protected function year_nodes($where){
		foreach($this->model->get_years($where) as $year){
			$this->make_node($where, $year);
			$this->month_nodes($where, $year);
			echo $this->_div();
		}
	}
	private function month_nodes($where, $year){
		foreach($this->model->get_months($where, $year) as $month){
			$this->make_node($where, $year, $month);
			$this->day_nodes($where, $year, $month);
			echo $this->_div();
		}
	}
	private function day_nodes($where, $year, $month){
		foreach($this->model->get_days($where, $year, $month) as $day){
			$this->make_node($where, $year, $month, $day);
			echo $this->_div();
		}
	}
	private function make_node($where,$year,$month=null,$day=null){
		$this->node(
			$this->node_text($year, $month, $day), 
			$this->model->load_posts($where, $year, $month, $day)
		);
	}
	private function node_text($year,$month=null,$day=null){
		if(isset($day)) 
			return $day;
		elseif(isset($month)) 
			return $this->parse_month($month);
		else 
			return $year;
	}
	private function parse_month($num){
		return (Date::createFromFormat("!m", $num))->format("F");
	}
}
