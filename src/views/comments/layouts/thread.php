<div class="thread">
	<?//=$this->comment($comment)?>
	<?=$comment['body']?>
	<?=$this->thread(["parent"=>$comment['id']]);?>
</div>
