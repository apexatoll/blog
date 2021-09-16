import {Validate} from "./Validate.js"

export class Upload extends Validate {
	constructor(form_id, response_tag){
		super(response_tag);
		this.form = form_id
		this.data = new FormData();
	}
	get_inputs(){
		$(this.form).children("input, textarea")
			.not("input[type='file']")
			.serializeArray().map((field)=>{
				this.data.append(field.name, field.value)
			})
	}
	get_files(){
		Array.from(this.find_file_input()).forEach((file)=>{
			this.data.append("files[]", file)
		})
	}
	find_file_input(){
		return $(this.form).find("input[type='file']").prop("files");
	}
	collect(){
		this.get_files();
		this.get_inputs();
		return this.data;
	}
	post(url){
		super.post(url, this.collect())
	}
	send_request(type, url, data){
		$.ajax({
			type:type, url:url, data:data,
			contentType:false, processData:false,
			success:(php)=>{
				this.parse(php, 
				(json)=>{this.success(json)}, 
				(json)=>{this.error(json)}
			)}
		})
	}
}
