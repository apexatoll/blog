<div class="box comment">
	<div class="bar bar-top bar-no-shadow">
		<div>deleted</div>
		<div class="buttons">
			<?=$this->reply()?>
			<?=$this->delete()?>
		</div>
	</div>
	<div class="content">
		<input type="hidden" class="comment-id" value="<?=$this->id?>">
		<div class="body red">deleted</div>
	</div>
</div>
