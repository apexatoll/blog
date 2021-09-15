<div class="post-header">
	<h2><?=$this->title?></h2>
	<div class="content">
		<div class="post-response"></div>
		<?=$this->unpublished()?>
			<div class="meta">
				<?=$this->user()?>
				<?=$this->tags()?>
				<?=$this->date()?>
				<?//=$this->comments()?>
				<?=$this->categories()?>
				<?=$this->views()?>
				<?//=$this->series()?>
			</div>
	</div>
	<div class="bar bottom">
		<?//=$this->share()?>
		<div>
			<?=$this->publish()?>
			<?=$this->edit()?>
			<?=$this->delete()?>
		</div>
	</div>
</div>
