<div class="box comment">
	<div class="bar top">
		<?=$this->user()?>
		<div class="buttons">
			<?=$this->reply()?>
			<?=$this->edit()?>
			<?=$this->delete()?>
		</div>
	</div>
	<div class="content">
		<input type="hidden" class="comment-id" value="<?=$this->id?>">
		<?=$this->date()?>
		<div class="body">
			<?=$this->body?>
		</div>
	</div>
</div>
