<form id="page.set" name="page.set" method="post" action="/admin/static/<?=(isset($page))?"edit/".$page->id:"add"?>">
	<p>
		<label for="title">Заголовок</label><br />
		<input type="text" name="title" id="title" value="<?=(isset($page))?$page->title:""?>"/>
	</p>
	<p>
		<label for="slug">Заголовок в ссылках (генерируется автоматически)</label><br />
		<input type="text" name="slug" id="slug" value="<?=(isset($page))?$page->url:""?>" />
	</p>
	<p>
		<label for="article">Содержание</label><br />
		<textarea id="article" name="article"><?=(isset($page))?$page->content:""?></textarea>
	</p>
	<p align="center"><input type="submit" value="Отправить"></p>
</form>