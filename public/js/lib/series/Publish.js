import {Validate} from "../Validate.js"

export class Publish extends Validate {
	constructor(){
		super(".response")
	}
	publish(){
		this.post_redirect(`/series/publish/${this.id()}`)
	}
	unpublish(){
		this.post_redirect(`/series/unpublish/${this.id()}`)
	}
	id(){
		return $("#series-id").val()
	}
}
