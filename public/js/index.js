import {Request} from "./lib/Request.js"
import {Response} from "./lib/Response.js"
import {Validate} from "./lib/Validate.js"
import {Form} from "./lib/Form.js"
import {Footer} from "./lib/Footer.js"
import {Cursor} from "./lib/Cursor.js"

hljs.highlightAll();
hljs.configure({tabReplace:'  '})

$(document).ready(()=>{
	new Cursor().tick()
})
