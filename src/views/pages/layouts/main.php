<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>bristol code | <?=$title?></title>
	<?=$this->stylesheets()?>
	<?=$this->scripts()?>
</head>
<body>
	<main>
		<?=$this->header($active)?>
		<?=$content?>
	</main>
	<?=$this->footer()?>
</body>
</html>
