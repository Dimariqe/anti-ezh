<div class="comment <?=($comment->super==1)?'supercomm':'normalcomm'?>">
	<p class="infopanel">Автор: <?=($comment->super==1)?'<span class="superuser">'.$comment->autor.'</span>':$comment->autor?>, Написал:<?=date("d.m.Y\, H:i", strtotime($comment->date))?></p>
	<?=$comment->comment?>
</div>