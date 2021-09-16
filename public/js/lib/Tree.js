export class Tree {
	constructor(source){
		this.node = $(source).closest("button").closest(".node");
		this.children = this.find("div.node");
		this.link_button = this.find("button.toggle-links")
		this.node_button = this.find("button.toggle-node")
	}
	find(element){
		return $(this.node).children(element)
	}
	has_children(){
		return this.children.length > 0;
	}
	toggle(element){
		$(element).toggleClass("open").toggleClass("closed")
	}
	toggle_node(){
		this.toggle(this.node_button)
		this.has_children() ?
			$(this.children).toggle():
			this.toggle(this.link_button);
	}
	toggle_links(){
		this.toggle(this.link_button);
		if(!this.has_children())
			this.toggle(this.node_button);
	}
}

$(document).ready(()=>{
	$(document).on("click", ".toggle-node", (e)=>{
		new Tree(e.target).toggle_node()
	})
	$(document).on("click", ".toggle-links", (e)=>{
		new Tree(e.target).toggle_links()
	})
})
