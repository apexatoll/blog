<div class="box">
	<h2><?=$this->title?></h2>
	<div class="content">
		<div class="post-response"></div>
			<?=$this->unpublished()?>
			<div class="meta meta-post-header">
					<?=$this->user()?>
					<?=$this->tags()?>
					<?=$this->date()?>
					<?=$this->categories()?>
					<?=$this->views()?>
					<?=$this->comments()?>
					<?//=$this->series()?>
			</div>
	</div>
	<div class="bar bar-bottom">
		<?=$this->share()?>
		<div>
			<?=$this->publish()?>
			<?=$this->edit()?>
			<?=$this->delete()?>
		</div>
	</div>
</div>
