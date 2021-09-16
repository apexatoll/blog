//import * as Comments from "./Comments.js"
import {Comment} from "./Comment.js"
import {Reply as CommentReply} from "./Reply.js"
import {Edit as CommentEdit} from "./Edit.js"
//import {Edit} from "./Reply.js"

$(document).ready(()=>{
	$(document).on("click", "#comment-submit-new", (e)=>{
		e.preventDefault();
		new Comment(e).submit();
	})
	$(document).on("click", ".comment-delete", (e)=>{
		new Comment(e).confirm_delete();
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
