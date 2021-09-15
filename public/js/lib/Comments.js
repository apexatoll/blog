import {Form} from "./Form.js"
import {Validate} from "./Validate.js"
import {Confirm} from "./Confirm.js"

export class Comments extends Validate {
	constructor(source){
		super(".comment-response")
		this.source = source.target
		this.comment = this.find_comment();
		this.submit_path = "/comments/new"
		this.form = "#comment-form-new"
	}
	find_comment(){
		return $(this.source).closest(".box.comment");
	}
	collect(){
		let data = new Form(this.form).collect();
		data['post_id'] = this.url_id()
		return data;
	}
	submit(){
		this.post(this.submit_path, this.collect())
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
	refresh(){
		this.html(`/comments/print/${this.url_id()}`, "#comments");
	}
	scroll_to(id){
		document.getElementById(id).scrollIntoView({
			block:"center", behavior:"smooth"
		});
		window.setTimeout(()=>{
			$("#"+id).find("textarea").focus();
		}, 300)
	}
	comment_id(){
		return $(this.comment).find(".comment-id").val();
	}
}

$(document).ready(()=>{
	$(document).on("click", "#comment-submit-new", (e)=>{
		e.preventDefault();
		new Comments(e).submit();
	})
	$(document).on("click", ".comment-delete", (e)=>{
		new Comments(e).confirm_delete();
	})
})
