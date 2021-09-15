<div class="box comment">
	<div class="bar bar-top bar-no-shadow">
		<?=$this->user()?>
		<div class="buttons">
			<?=$this->reply()?>
			<?=$this->edit()?>
			<?=$this->delete()?>
		</div>
	</div>
	<div class="content">
		<input type="hidden" class="comment-id" value="<?=$this->id?>">
		<div class="meta meta-comment">
			<?=$this->date()?>
		</div>
		<div class="body">
			<?=$this->body?>
		</div>
	</div>
</div>
