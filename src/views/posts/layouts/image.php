<div class="image-card">
	<div class="bar bar-top bar-end bar-no-shadow">
		<div>
			<button class="img-add-ref submit"><?=$this->icon("plus");?></button>
			<button class="star"><?=$this->icon("star");?></button>
			<button class="img-delete cancel"><?=$this->icon("trash-alt");?></button>
		</div>
	</div>
	<div class="image-card-content">
		<img class="image-popup" alt="<?=$name?>" src="<?=$path?>">
		<div class="filename"><?=$name?></div>
	</div>
</div>
