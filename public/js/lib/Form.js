export class Form {
	constructor(id){
		this.id = id
		this.data = {}
	}
	collect(){
		$(this.id).children("input, textarea").serializeArray()
			.forEach((input)=>{
			this.data[input.name] = input.value
		})
		return this.data
	}
}
