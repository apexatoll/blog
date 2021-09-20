<?=$this->box("Sort Posts", "flush")?>
<div class="series-response"></div>
<div class="sort-posts">
	<input type="hidden" id="series-id" value="<?=$series['id'];?>">
	<input type="hidden" id="series-name" value="<?=$series['title']?>">
	<?foreach($posts as $post):?>
	<?=$this->buffer_reorder_item($post)?>
	<?endforeach;?>
</div>
<?=$this->_box()?>

<nav>
	<a href="/series/<?=preg_replace("/ /", "-", $series['title'])?>" class="cancel">cancel</a>
	<button class="series-reorder-submit">save</button>
</nav>
