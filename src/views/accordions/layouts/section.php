<div class="node closed">
	<button class="toggle-node closed"><?=$title?></button>
	<div class="links">
		<?foreach($posts as $post):?>
		<?=$this->item($post)?>
		<?endforeach;?>
	</div>
</div>
