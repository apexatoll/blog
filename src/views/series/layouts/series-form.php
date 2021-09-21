<?=$this->box($heading, "flush")?>
	<div class="response"></div>
	<form id="<?=$form_id?>" class="post-form">
		<?=$this->title()?>
		<?=$this->md()?>
		<?=$this->file()?>
	</form>
	<?=$images??null?>
<?=$this->_box();?>

<nav class="nav-post-form">
	<?=$buttons?>
</nav>
