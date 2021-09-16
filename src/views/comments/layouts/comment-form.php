<div class="comment-reply">
	<div class="box comment-form comment-form-insert comment-form-<?=$class?>">
		<form id="comment-form-<?=$class?>">
			<?foreach($params as $key => $val):?>
			<input type="hidden" name="<?=$key;?>" value="<?=$val;?>">
			<?endforeach;?>
			<textarea name="body" rows="3" placeholder="<?=$prompt?>"><?=$body ?? null?></textarea>
		</form>
	</div>
	<nav>
		<button class="comment-<?=$class?>-hide cancel">cancel</button>
		<button class="comment-<?=$class?>-submit submit">post</button>
	</nav>
</div>
