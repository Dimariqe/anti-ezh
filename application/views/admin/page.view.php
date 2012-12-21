<table class="admin_news" cellpadding=0 cellspacing=0>
<?foreach($pages as $page){?>
	<tr>
		<td class="id"><?=$page->id?></td>
		<td class="title"><a href="/<?=$page->url?>.html"><?=$page->title?></a></td>
		<td class="article"><?=substr(strip_tags($page->content), 0, 150)."..."?></td>
		<td class="control">
			<a href="/admin/static/edit/<?=$page->id?>" class="noborder"><img src="/src/img/admin/edit.png"/></a>
			<a href="/admin/static/delete/<?=$page->id?>" class="noborder"><img src="/src/img/admin/delete.png"/></a>	
		</td>
	</tr>
<?}?>
</table>