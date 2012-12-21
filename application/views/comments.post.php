<p><h3>Добавить комментарий:</h3></p>
<form id="comment_post" name="comment_post" method="post" action="/ajax/comment/add/<?=$id?>">
<input type="hidden" id="postcat" value="<?=$id?>"/>
<input type="hidden" id="poctrepl" name="poctrepl" value="null"/>
<p id="postcommadd"></p>
<?if(!$login) {?>
	<p>
		<label for="autor">Никнейм</label><br />
		<input type="text" name="autor" id="autor"/>
	</p>
<?}?>
	<p>
		<label for="text">Сообщение</label><br />
		<textarea id="text" name="text"></textarea>
	</p>
	<p align="center"><input type="button" id="comment_submit" value="Отправить"></p>
</form>