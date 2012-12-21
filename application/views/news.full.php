				<h1><?=$article->title?></h1>
				<?=$article->article?>
				<div class="hr"><span class="info">Автор: <?=$article->autor?> | Опубликована: <?=date("d.m.Y\, H:i", strtotime($article->date))?></span></div>