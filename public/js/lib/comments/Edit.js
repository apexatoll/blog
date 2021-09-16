import {Comment} from "./Comment.js"

export class Edit extends Comment {
	constructor(source){
		super(source)
		this.submit_path = "/comments/edit/submit"
		this.form  = "#comment-form-edit"
	}
	show(){
		this.post("/comments/edit/show", this.data(), (json)=>{
			$(this.comment).replaceWith(json.message);
			this.scroll_to()
		})
	}
	hide(){
		this.refresh();
	}
	scroll_to(){
		super.scroll_to("comment-form-edit");
	}
	data(){
		return {
			id:this.comment_id()
		}
	}
}
