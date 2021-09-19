<div class="box">
	<h2><?=$this->title?></h2>
	<div class="content">
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
