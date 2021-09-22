<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>bristol code | <?=$title?></title>
	<?=$this->stylesheets()?>
	<?=$this->scripts()?>
</head>
<body>
		<div class="burger-menu">
			<h3><span class="blue">$</span> bristol code</h3>
			<?=$this->icon_button("bars")?>
		</div>
	<main>
		<?=$this->header($active)?>
		<?=$content?>
	</main>
	<?=$this->footer()?>
</body>
</html>
