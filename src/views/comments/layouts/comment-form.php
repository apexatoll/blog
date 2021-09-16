<div class="<?=$class?>">
	<div class="box comment-form comment-form-insert <?=$class?>">
		<form id="<?=$class?>">
			<?=$this->id()?>
			<?=$this->parent()?>
			<?=$this->body($prompt)?>
		</form>
	</div>
	<nav>
		<?=$buttons?>
	</nav>
</div>
