import {Validate} from "../Validate.js"
import {Form}     from "../Form.js"
import {Confirm}  from "../Confirm.js"

export class Comment extends Validate {
	constructor(source){
		super(".comment-response")
		this.source = source.target
		this.comment = this.find_comment()
		this.post_id = this.url_id()
		this.form    = "#comment-form-new"
	}
	find_comment(){
		return $(this.source).closest(".box.comment");
	}
	comment_id(){
		return $(this.comment).find(".comment-id").val();
	}
	refresh(){
		this.html(`/comments/print/${this.post_id}`, "#comments");
	}
	confirm_delete(){
		new Confirm(
			()=>{this.delete()}, 
			"Are you sure? This cannot be undone!", 
			"Delete comment?"
		).show();
	}
	delete(){
		this.post("/comments/delete", {id:this.comment_id()}, (json)=>{
			this.success(json)
			this.refresh()
		})
	}
	success(json){
		super.success(json)
		$(this.form).find("textarea").val("")
		this.refresh();
	}
	scroll_to(id){
		document.getElementById(id).scrollIntoView({
			block:"center", behavior:"smooth"
		});
		window.setTimeout(()=>{
			$("#"+id).find("textarea").focus();
		}, 300)
	}
	collect(){
		let data = new Form(this.form).collect();
		data['post_id'] = this.url_id()
		return data;
	}
	submit(){
		this.post("/comments/new", this.collect())
	}
}
