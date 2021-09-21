<div class="box">
	<h2><?=ucwords($this->title)?></h2>
	<div class="content">
		<input type="hidden" id="series-id" value="<?=$this->id?>">
		<?=$this->unpublished()?>
		<?=$this->html?>
	</div>
	<div class="bar bar-bottom">
		<?=$this->share()?>
		<div>
			<?=$this->sort()?>
			<?=$this->publish()?>
			<?=$this->edit()?>
			<?=$this->delete()?>
		</div>
	</div>
</div>
