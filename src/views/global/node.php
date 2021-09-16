<div class="node <?=$class?>">
	<?=$node_button?>
	<?=$link_button?>
	<div class="links">
		<<?=$type?>>
			<?foreach($posts as $post):?>
			<li><?=$post?></li>
			<?endforeach;?>
		</<?=$type?>>
	</div>
