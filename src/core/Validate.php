<?php namespace core;

abstract class Validate extends Model {
	protected const RULE_REQ   = "val_required";
	protected const RULE_EMAIL = "val_email";
	protected const RULE_MATCH = "val_match";
	protected const RULE_UNIQ  = "val_uniq";
	protected const RULE_REF   = "val_refs";
	protected const RULE_TAGS = "val_tags";
	abstract protected function new_rules();
	public function validate(){
		foreach($this->get_rules() as $rule => $params)
			call_user_func_array([$this, $rule], [$params]);
		return $this;
	}
	private function get_rules(){
		return $this->is_new() ?
			$this->new_rules() :
			$this->edit_rules();
	}
	private function val_required($keys){
		foreach($this->get_props($keys) as $key=>$val)
			if(empty($val))
				$this->error("$key missing");
	}
	private function val_email($keys){
		foreach($this->get_props($keys) as $key=>$val)
			if(!filter_var($val, FILTER_VALIDATE_EMAIL))
				$this->error("$key is invalid");
	}
	private function val_match($groups){
		foreach($groups as $name => $keys)
			if(!$this->props_match($keys))
				$this->error("$name do not match");
	}
	private function val_uniq($keys){
		foreach($keys as $key)
			if($this->find($this->get_props([$key])))
				$this->error("$key exists");
	}
	private function val_refs($params){
		foreach($this->get_prop($params['refs']) as $ref){
			if(!isset($this->{$params['field']}) ||
				!in_array($ref, $this->get_files($params['field'])))
				$this->error("file $ref not found");
		}
	}
	private function val_tags($keys){
		foreach($this->get_props($keys) as $key=>$val)
			if($val != strip_tags($val))
				$this->error("$key contains html tags");
	}
	protected function get_files($field){
		return array_map(fn($file)=>$file->name, $this->get_prop($field));
	}
	private function get_prop($prop){
		return $this->{$prop};
	}
	private function get_props($props){
		return array_combine($props, array_map(
			fn($prop)=>$this->get_prop($prop), $props)
		);
	}
	private function props_match($keys){
		return count(array_unique($this->get_props($keys))) == 1;
	}
	protected function validate_password($attempt, $hash){
		if(!password_verify($attempt, $hash))
			$this->error("incorrect password");
	}
	protected function error($message){
		throw new \Exception($message);
	}
}
