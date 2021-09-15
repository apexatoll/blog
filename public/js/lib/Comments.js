import {Validate} from "./Validate.js"
import {Confirm} from "./Confirm.js"

export class Comments extends Validate {
	constructor(source){
		super(".comment-response")
	}
	confirm_delete(){
		new Confirm(
			()=>{this.delete()}, 
			"Are you sure? This cannot be undone!", 
			"Delete comment?"
		).show();
	}
}

$(document).ready(()=>{
	$(document).on("click", ".comment-delete", (e)=>{
		new Comments(e).confirm_delete();
	})
})
