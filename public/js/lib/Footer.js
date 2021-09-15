import {Validate} from "./Validate.js"

export class Footer extends Validate {
	constructor(){
		super("footer-response")
	}
	show(menu){
		this.html(`/footers/${menu}`, "footer")
	}
	cancel(){
		this.html(`/footers/default`, "footer");
	}
}

$(document).ready(()=>{
	$(document).on("click", ".footer-show-login", (e)=>{
		new Footer().show("login");
	})
	$(document).on("click", ".footer-show-default", (e)=>{
		new Footer().cancel();
	})
})
