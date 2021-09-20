import {Reorder} from "./Reorder.js"

$(document).ready(()=>{
	$(".sort-posts").sortable();
	$(".series-reorder-submit").on("click", (e)=>{
		e.preventDefault();
		new Reorder().submit();
	})
})
