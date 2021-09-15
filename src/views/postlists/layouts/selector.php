<form action="<?=$this->root?>">
	<select name="show">
		<?foreach([10, 25, 50] as $n):?>
		<?=$this->option($n);?>
		<?endforeach;?>
	</select>
	<button><?=$this->icon("angle-right");?></button>
</form>
