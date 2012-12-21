<form id="article.set" name="article.set" method="post" action="/admin/articles/<?=(isset($article))?"edit/".$article->id:"add"?>">
	<p>
		<label for="title">Заголовок</label><br />
		<input type="text" name="title" id="title" value="<?=(isset($article))?$article->title:""?>"/>
	</p>
	<p>
		<label for="slug">Заголовок в ссылках (генерируется автоматически)</label><br />
		<input type="text" name="slug" id="slug" value="<?=(isset($article))?$article->url:""?>" />
	</p>
	<p>
		<label for="article">Содержание</label><br />
		<textarea id="article" name="article"><?=(isset($article))?$article->article:""?></textarea>
	</p>
	<p align="center"><input type="submit" value="Отправить"></p>
</form>