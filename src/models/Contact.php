<?php namespace models;

class Contact extends \core\Validate {
	protected $name, $email, $subject, $message;
	protected function new_rules(){
		return [
			self::RULE_REQ => ["name", "email", "subject", "message"],
			self::RULE_EMAIL => ["email"]
		];
	}
	protected function input_new(){
		$this->message = $this->build_message();
	}
	public function submit(){
		$sent = mail(
			CONTACT,
			$this->subject,
			$this->message,
			"From: admin@bristolcode.co.uk"
		);
		if(!$sent) 
			$this->error("message could not be sent");
	}
	private function build_message(){
		return "$this->message\nSent from: $this->email";
	}
}
