import {Upload}  from "./Upload.js"
import {Publish} from "./Publish.js"

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
})
