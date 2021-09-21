import {Upload as BaseUpload} from "../Upload.js"
import {Response} from "../Response.js"

export class Upload extends BaseUpload {
	constructor(form, response=".response"){
		super(form, response)
	}
	new(){
		this.post("/series/new/submit")
	}
	edit(){
		this.post(`/series/edit/submit/${this.url_id()}`);
	}
	success(json){
		//console.log(json.opts.title.replace(/\s/g, "-"))
		new Response(json, this.tag).redirect(`/series/${json.opts.title.replace(/\s/g, "-")}`)
		//con
	}
}

