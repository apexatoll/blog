<?=$this->box("Contact", "flush")?>
<div class="contact-response"></div>
<form id="contact-form">
	<input type="text" name="name" placeholder="Enter name..." value="<?=$name?>">
	<input type="text" name="email" placeholder="Enter email...">
	<input type="text" name="subject" placeholder="Enter subject...">
	<textarea name="message" rows="5" placeholder="Enter message..."></textarea>
</form>
<?=$this->_box()?>
<nav>
	<button class="contact-clear cancel">clear</button>
	<button class="contact-submit submit">submit</button>
</nav>
