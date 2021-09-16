import {Publish} from "./Publish.js"

$(document).ready(()=>{
	$(document).on("click", ".posts-publish", (e)=>{
		new Publish().publish()
	})
	$(document).on("click", ".posts-unpublish", (e)=>{
		new Publish().unpublish()
	})
})
