import {Validate} from "../Validate.js"

export class Publish extends Validate {
	constructor(){
		super(".post-response")
	}
	publish(){
		this.post_redirect(`/posts/publish/${this.url_id()}`)
	}
	unpublish(){
		this.post_redirect(`/posts/unpublish/${this.url_id()}`)
	}
	id(){
		return $("#series-id").val()
	}
}
//$(document).ready(()=>{
	//$(document).on("click", ".posts-publish", (e)=>{
		//new Post().publish()
	//})
	//$(document).on("click", ".posts-unpublish", (e)=>{
		//new Post().unpublish()
	//})
//})
