import {Validate} from "../Validate.js"

export class Reorder extends Validate {
	constructor(){
		super(".series-response")
	}
	submit(){
		this.post_redirect(
			`/series/sort/submit/${this.url_id()}`, 
			{order:Array.from(this.get_order())}, 
			`/series/${this.get_name()}`
		)
	}
	get_order(){
		return $(".sort-posts").children(".sortable-post").map((_, post)=>{
			return $(post).find(".post-id").val()
		})
	}
	get_name(){
		return $("#series-name").val().replace(/\s/g, "-");
	}
}
