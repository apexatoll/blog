import {Comment} from "./Comment.js"

export class Reply extends Comment {
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
