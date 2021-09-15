<?=$this->box($heading, "flush")?>
	<div class="response"></div>
	<form id="<?=$form_id?>">
		<?=$this->title()?>
		<?=$this->categories()?>
		<?=$this->tags()?>
		<?=$this->series()?>
		<?=$this->md()?>
		<?=$this->file()?>
	</form>
	<?=$images??null?>
<?=$this->_box();?>

<nav class="post-form">
	<?=$buttons?>
</nav>
