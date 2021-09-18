import {Validate} from "../Validate.js"

export class Bookmark extends Validate {
	constructor(source){
		super(".response")
		this.button = $(source.target).closest("button");
		this.box = $(source.target).closest(".post-preview,.post-stats");
		this.id = $(this.box).find("input[name='id']").val()
	}
	toggle(){
		//this.button()
		$(this.button).toggleClass("active");
		this.post(`/users/bookmark/${this.id}`)
		//$(source.target).closest("button").toggleClass("active");
		//$(source.target).closest(".far,.fas").toggleClass("far").toggleClass("fas")
		//let id = $(source.target).closest(".preview,.post-stats").find("input[name='id']").val();
		//new Request().post("/users/bookmark/"+id, (php)=>{ })
	}
	//post_id(source){
		//return 
	//}
}
