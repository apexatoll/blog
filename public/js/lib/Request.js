export class Request {
	post(url, data=null, callback){
		this.send_request("POST", url, data, (php)=>{
			callback(php)
		})
	}
	get(url, data=null, callback){
		this.send_request("GET", url, data, (php)=>{
			callback(php)
		});
	}
	send_request(type, url, data, callback){
		$.ajax({
			type:type, url:url, data:data,
			success:(php)=>{callback(php)}
		})
	}
}
