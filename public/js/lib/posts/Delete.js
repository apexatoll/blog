import {Validate} from "../Validate.js"
import {Confirm}  from "../Confirm.js"

export class Delete extends Validate {
	constructor(){
		super(".post-response")
	}
	confirm_delete(){
		new Confirm(()=>{ this.delete() }, 
			"Are you sure? This cannot be undone", 
			"Delete post?"
		).show();
	}
	delete(){
		this.post(`/posts/delete/${this.url_id()}`, null, (json)=>{
			this.success(json);
			window.setTimeout(()=>{
				window.history.back();
			}, 2000)
		})
	}
}
