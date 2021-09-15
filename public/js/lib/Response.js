export class Response {
	constructor(json, tag){
		this.json = json;
		this.tag  = tag;
	}
	success(){
		this.show("Success", "green");
	}
	error(){
		this.show("Error", "red");
	}
	show(prefix, color){
		$(this.tag).hide()
			.addClass(color)
			.html(this.format(prefix, this.json.message))
			.slideDown(()=>{this.hide(color)});
	}
	format(prefix, message){
		return `<b>${prefix}: </b>${message}`;
	}
	hide(color, time=3000){
		window.setTimeout(()=>{
			$(this.tag).slideUp(()=>{
				$(this.tag).removeClass(color).empty()
			})
		}, time)
	}
	redirect(href=false){
		this.success(this.json)
		window.setTimeout(()=>{
			href ? 
				window.location.href = href:
				location.reload();
		}, 2000)
	}
}
