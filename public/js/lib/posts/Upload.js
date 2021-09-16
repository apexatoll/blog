import {Upload as BaseUpload} from "../Upload.js"
import {Response} from "../Response.js"

export class Upload extends BaseUpload {
	constructor(form, response=".response"){
		super(form, response)
	}
	new(){
		this.post("/posts/new/submit")
		console.log("called");
	}
	edit(){
		this.post(`/posts/edit/submit/${this.url_id()}`);
	}
	success(json){
		new Response(json, this.tag).redirect(`/posts/${json.opts.id}`)
	}
}

//$(document).ready(()=>{
	//$(document).on("click", ".post-new-submit", (e)=>{
		//e.preventDefault();
		//new UploadPost("#new-post").new();
	//})
	//$(document).on("click", ".post-edit-submit", (e)=>{
		//e.preventDefault();
		//new UploadPost("#edit-post").edit();
	//})
	//$(document).on("click", ".footer-upload-submit", (e)=>{
		//e.preventDefault();
		//new UploadPost("#footer-upload", ".footer-response").new();
	//})
//})
