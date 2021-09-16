import {Validate} from "./Validate.js"
import {Form} from "./Form.js"

export class Footer extends Validate {
	constructor(){
		super(".footer-response")
	}
	show(menu){
		this.html(`/footers/${menu}`, "footer")
	}
	cancel(){
		this.html(`/footers/default`, "footer");
	}
	login(){
		this.post_redirect("/auth/login", new Form("#footer-login").collect())
	}
	logout(){
		this.post_redirect("/auth/logout")
	}
}

$(document).ready(()=>{
	$(document).on("click", ".footer-show-login", (e)=>{
		new Footer().show("login");
	})
	$(document).on("click", ".footer-show-default", (e)=>{
		new Footer().cancel();
	})
	$(document).on("click", ".footer-submit-login", (e)=>{
		e.preventDefault();
		new Footer().login();
	})
	$(document).on("click", ".footer-submit-logout", (e)=>{
		new Footer().logout();
	})
	$(document).on("click", ".footer-show-post", (e)=>{
		new Footer().show("post");
	})
	$(document).on("click", ".footer-show-upload", (e)=>{
		new Footer().show("upload");
	})
})
