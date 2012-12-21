<?if(!isset($ajax)){?>
<h1 id="commhead">Комментарии</h1>
<div id="commentaries">
<?}?>
 
<?foreach($comments as $comment){?>
<?for($i=1;$comment->lvl>$i;$i++) {?>
<?="<div class='lvlup'>"?>
<?}?>
<div class="comment <?=($comment->super==1)?'supercomm':'normalcomm'?>" id="comm<?=$comment->id?>">
	<p class="infopanel">Автор: <?=($comment->super==1)?'<span class="superuser">'.$comment->autor.'</span>':$comment->autor?>, Написал:<?=date("d.m.Y\, H:i", strtotime($comment->date))?>.</p>
	<p class="adpost">
            <?if($admin) {?><a href="#" class="deletecomm" id="<?=$comment->id?>">Удалить</a> | <?}?>
            <a href="#comment_post" class="replcomm" id="<?=$comment->id?>">Ответить</a>
        </p>    
	<?=$comment->comment?>
</div>
<?for($i=1;$comment->lvl>$i;$i++) {?>
<?="</div>"?>
<?}?>
<?}?>
<?if(!isset($ajax)){?>
</div>
<?}?>