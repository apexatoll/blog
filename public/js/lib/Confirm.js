import {Request} from "./Request.js"
import {Popup} from "./Popup.js"

export class Confirm extends Popup {
	constructor(yes, prompt, title="Are you sure?"){
		super("/popups/confirm");
		this.bind(".popup-submit", ()=>{
			this.close()
			yes()
		})
		this.prompt = prompt;
		this.title = title;
	}
	show(){
		this.post(this.show_url, this.package(), (html)=>{
			$("body").append(html.message);
		});
	}
	package(){
		return {
			prompt:this.prompt,
			title:this.title
		}
	}
}
