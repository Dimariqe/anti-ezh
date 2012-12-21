<table class="admin_news" cellpadding=0 cellspacing=0>
<?foreach($articles as $article){?>
	<tr>
		<td class="id"><?=$article->id?></td>
		<td class="title"><a href="/news/<?=$article->id?>-<?=$article->url?>.html"><?=$article->title?></a></td>
		<td class="article"><?=substr(strip_tags($article->article), 0, 150)."..."?></td>
		<td class="control">
			<a href="/admin/articles/edit/<?=$article->id?>" class="noborder"><img src="/src/img/admin/edit.png"/></a>
			<a href="/admin/articles/delete/<?=$article->id?>" class="noborder"><img src="/src/img/admin/delete.png"/></a>	
		</td>
	</tr>
<?}?>
</table>