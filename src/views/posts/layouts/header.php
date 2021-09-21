<div class="box post-header">
	<h2><?=$this->title?></h2>
	<div class="content">
		<div class="post-response"></div>
			<?=$this->subtitle()?>
			<?=$this->unpublished()?>
			<div class="meta meta-post-header">
				<?=$this->user()?>
				<?=$this->tags()?>
				<?=$this->date()?>
				<?=$this->categories()?>
				<?=$this->views()?>
				<?=$this->series()?>
				<?=$this->comments()?>
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
