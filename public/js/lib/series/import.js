import {Reorder} from "./Reorder.js"
import {Upload}  from "./Upload.js"
import {Publish} from "./Publish.js"

$(document).ready(()=>{
	$(".sort-posts").sortable();
	$(".series-reorder-submit").on("click", (e)=>{
		e.preventDefault();
		new Reorder().submit();
	})
	$(document).on("click", ".series-edit-submit", (e)=>{
		e.preventDefault();
		new Upload("#edit-series").edit();
	})
	$(document).on("click", ".series-new-submit", (e)=>{
		e.preventDefault();
		new Upload("#new-series").new();
	})
	$(document).on("click", ".series-publish", (e)=>{
		new Publish().publish()
	})
	$(document).on("click", ".series-unpublish", (e)=>{
		new Publish().unpublish()
	})
})
