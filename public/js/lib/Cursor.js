export class Cursor {
	constructor(){
		this.target = "header h1 a"
		this.text = $(this.target).html();
		this.color = "grey"
	}
	update(text=""){
		$(this.target).html(this.text+text);
	}
	cursor(){
		return `<span class='${this.color}'>\u2588</span>`;
	}
	tick(){
		window.setTimeout(()=>{
			this.update(this.cursor());
			window.setTimeout(()=>{
				this.update();
				window.setTimeout(this.tick(), 1000)
			}, 1000)
		}, 1000)
	}
}
