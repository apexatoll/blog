import {Reorder} from "./Reorder.js"
import {Upload} from "./Upload.js"

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
})
