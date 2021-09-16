import {Form}     from "./Form.js"
import {Validate} from "./Validate.js"
import {Confirm}  from "./Confirm.js"

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

export class CommentReply extends Comments {
	constructor(source){
		super(source);
		this.form  = "#comment-form-reply"
		this.class = ".comment-form-reply"
	}
	show(){
		$(this.class).remove()
		$(".comment").removeClass("flush");
		this.post("/comments/reply/show", this.data(), (html)=>{
			$(this.comment).after(html.message)
			$(this.comment).addClass("flush")
			this.scroll_to();
		})
	}
	hide(){
		$(this.class).slideUp(()=>{
			this.refresh();
		})
	}
	scroll_to(){
		super.scroll_to("comment-form-reply");
	}
	data(){
		return {
			post_id:this.url_id(), 
			parent: this.comment_id()
		}
	}
}

export class CommentEdit extends Comments {
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

$(document).ready(()=>{
	$(document).on("click", "#comment-submit-new", (e)=>{
		e.preventDefault();
		new Comments(e).submit();
	})
	$(document).on("click", ".comment-delete", (e)=>{
		new Comments(e).confirm_delete();
	})
	$(document).on("click", ".comment-reply-show", (e)=>{
		new CommentReply(e).show();
	})
	$(document).on("click", ".comment-reply-hide", (e)=>{
		new CommentReply(e).hide();
	})
	$(document).on("click", ".comment-reply-submit", (e)=>{
		new CommentReply(e).submit();
	})
	$(document).on("click", ".comment-edit-show", (e)=>{
		new CommentEdit(e).show();
	})
	$(document).on("click", ".comment-edit-hide", (e)=>{
		new CommentEdit(e).hide();
	})
	$(document).on("click", ".comment-edit-submit", (e)=>{
		new CommentEdit(e).submit();
	})
})
