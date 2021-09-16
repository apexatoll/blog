import {Request} from "./lib/Request.js"
import {Response} from "./lib/Response.js"
import {Validate} from "./lib/Validate.js"
import {Form} from "./lib/Form.js"
import {Footer} from "./lib/Footer.js"
import {Cursor} from "./lib/Cursor.js"
import {Popup} from "./lib/Popup.js"
import {Confirm} from "./lib/Confirm.js"
//import {Comments} from "./lib/Comments.js"

import * as Comments from "./lib/comments/import.js"
import * as Posts from "./lib/posts/import.js"

import {Tree} from "./lib/Tree.js"

hljs.highlightAll();
hljs.configure({tabReplace:'  '})

$(document).ready(()=>{
	new Cursor().tick()
})
