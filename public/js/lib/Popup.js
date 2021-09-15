import {Validate} from "./Validate.js"

export class Popup extends Validate {
	constructor(show_url, close_button=".popup-cancel", response_tag=".popup-response"){
		super(response_tag);
		this.show_url = show_url;
		this.close_button = close_button;
		this.bind(close_button, ()=>{this.close()});
	}
	show(){
		this.post(this.show_url, null, (html)=>{
			$("#window").append(html.message);
		})
	}
	bind(tag, callback){
		$(document).on("click", tag, (e)=>{
			e.preventDefault();
			callback();
		})
	}
	unbind(tag){
		$(document).off("click", tag);
	}
	close(){
		$(".fullscreen").fadeOut(()=>{
			$(".fullscreen").remove();
		})
		this.unbind(this.close_button);
	}
}
