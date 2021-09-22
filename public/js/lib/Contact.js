import {Validate} from "./Validate.js"
import {Form} from "./Form.js"

export class Contact extends Validate {
	constructor(){
		super(".contact-response")
	}
	submit(){
		this.post("/contact/submit", this.data())
	}
	data(){
		return new Form("#contact-form").collect()
	}
	success(json){
		super.success(json)
		this.clear()
	}
	clear(){
		$("#contact-form").trigger("reset");
	}
}

$(document).ready(()=>{
	$(document).on("click", ".contact-submit", (e)=>{
		new Contact().submit()
	})
	$(document).on("click", ".contact-clear", (e)=>{
		new Contact().clear()
	})
})
