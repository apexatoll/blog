<?=$this->search_results($search??null, $total)?>
<?=$this->search_form($root)?>

<?=$top_bar?>
<div class="list">
	<?foreach($posts as $post):?>
	<?=$this->preview($post);?>
	<?endforeach;?>
</div>
<?=$bottom_bar;?>
