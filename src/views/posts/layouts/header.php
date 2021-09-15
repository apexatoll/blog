<div class="box">
	<h2><?=$this->title?></h2>
	<div class="content">
		<div class="post-response"></div>
			<?=$this->unpublished()?>
			<div class="meta">
				<?=$this->user()?>
				<?=$this->date()?>
				<?//=$this->comments()?>
				<?=$this->views()?>
				<?=$this->categories()?>
				<?=$this->tags()?>
				<?//=$this->series()?>
			</div>
	</div>
	<div class="bar bar-bottom bar-end">
		<?//=$this->share()?>
		<div>
			<?=$this->publish()?>
			<?=$this->edit()?>
			<?=$this->delete()?>
		</div>
	</div>
</div>
