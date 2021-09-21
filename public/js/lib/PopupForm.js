import {Form} from "./Form.js"
import {Popup} from "./Popup.js"

export class PopupForm extends Popup {
	constructor(show_url, form_id, submit_url, submit_button=".popup-submit"){
		super(show_url);
		this.submit_button = submit_button;
		this.url = submit_url;
		this.form = new Form(form_id);
		this.bind(submit_button, ()=>{this.submit()});
	}
	submit(){
		this.post(this.url, this.form.collect());
	}
	close(){
		super.close();
		this.unbind(this.submit_button);
	}
	success(json){
		super.success(json);
		window.setTimeout(()=>{this.close()}, 5000);
	}
}

$(document).ready(()=>{
	$(document).on("click", ".footer-show-signup", ()=>{ 
		new PopupForm(
			"/popups/signup", "#popup-register", "/users/register"
		).show();
	})
	$(document).on("click", ".popup-change-password", ()=>{
		new PopupForm(
			"/popups/change-password", "#popup-password", "/users/change-password"
		).show();
	})
})
