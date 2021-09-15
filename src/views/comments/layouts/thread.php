<div class="thread">
	<?=$this->comment($comment)?>
	<?=$this->thread(["parent"=>$comment['id']]);?>
</div>
