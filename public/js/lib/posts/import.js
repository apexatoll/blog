import {Upload}  from "./Upload.js"
import {Publish} from "./Publish.js"
import {Delete}  from "./Delete.js"
import {Bookmark} from "./Bookmark.js"

$(document).ready(()=>{
	$(document).on("click", ".post-new-submit", (e)=>{
		e.preventDefault();
		new Upload("#new-post").new();
	})
	$(document).on("click", ".post-edit-submit", (e)=>{
		e.preventDefault();
		new Upload("#edit-post").edit();
	})
	$(document).on("click", ".footer-upload-submit", (e)=>{
		e.preventDefault();
		new Upload("#footer-upload", ".footer-response").new();
	})
	$(document).on("click", ".posts-publish", (e)=>{
		new Publish().publish()
	})
	$(document).on("click", ".posts-unpublish", (e)=>{
		new Publish().unpublish()
	})
	$(document).on("click", ".posts-delete", (e)=>{
		new Delete().confirm_delete()
	})
	$(document).on("click", ".bookmark", (e)=>{
		new Bookmark(e).toggle();
	})
})
