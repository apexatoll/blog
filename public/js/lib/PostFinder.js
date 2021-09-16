import {Validate} from "./Validate.js"

export class PostFinder extends Validate {
	constructor(source){
		super();
		let button = $(source).closest("button");
		this.target = $(button).closest(".finder")
		this.new    = $(button).attr("id").replace(/^show-finder-/, "");
	}
	show(){
		this.html(`/finders/show/${this.new}`, this.target)
	}
}

$(document).ready(()=>{
	$(document).on("click", "button.tab.update", (e)=>{
		new PostFinder(e.target).show();
	})
})
