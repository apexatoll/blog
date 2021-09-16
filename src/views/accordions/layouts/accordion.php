<div class="finder">
	<div class="box">
		<div class="content">
			<div class="tree">
				<?foreach($sections as $title => $posts):?>
				<?=$this->section($title, $posts)?>
				<?endforeach;?>
			</div>
		</div>
	</div>
</div>
