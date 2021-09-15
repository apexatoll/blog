import {Response} from "./Response.js"
import {Request} from "./Request.js"

export class Validate extends Request {
	constructor(tag){
		super();
		this.tag = tag
	}
	post(url, data=null, 
		success = (json)=>{this.success(json)}, 
		error   = (json)=>{this.error(json)}){
		super.post(url, data, (php)=>{
			this.parse(php, success, error)
		})
	}
	post_redirect(url, data=null, href=null){
		this.post(url, data, (json)=>{
			this.redirect(json, href)
		})
	}
	html(url, target, data=null){
		super.post(url, data, (html)=>{
			this.parse(html, (json)=>{
				$(target).replaceWith(json.message);
			})
		})
	}
	parse(php, success, error){
		let json = JSON.parse(php)
		json.success ? success(json) : error(json)
	}
	success(json){
		new Response(json, this.tag).success();
	}
	error(json){
		new Response(json, this.tag).error();
	}
	redirect(json, href=null){
		new Response(json, this.tag).redirect(href);
	}
	url_id(){
		return window.location.href.replace(/^.*\/([0-9]+)(#.*$)?/, "$1")
	}
}
