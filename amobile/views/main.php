<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
	<head>
		<meta name="robots" content="index, follow" /> 
		<meta name="keywords" content="Курительные смеси в Новосибирске, легальные курительные смеси, порошки в Новосибирске, нюхательные порошки, легальные порошки в Новосибирске, новые курительные смеси, новые порошки в Новосибирске, наркотики, не запрещенные курительные смеси, афродизиаки!" /> 
		<meta name="description" content="Здравствуйте! На нашем сайт вы можете найти информацию о средствах для отпугивания Ежей и Енотов. У нас вы не можете купить курительные смеси в Новосибирске, мы не знаем, где купить курительные миксы в Новосибирске." /> 
		<title>[mobile].Anti-Ezh.com</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="/src/css/base.m.css" type="text/css" media="all" /> 
	</head>
	<body>
		<div id="header"><?=$title?></div>
		<div id="content">
		<?foreach($points as $point){?>
			<a href="http://static-maps.yandex.ru/1.x/?ll=<?=$point->x?>,<?=$point->y?>&size=450,450&z=15&l=map&pt=<?=$point->x?>,<?=$point->y?>,pmwtm&key=AFpjGU4BAAAAIVhKUQIA-sW7JbkCRE9XnZ5GV6eYLIwiGqUAAAAAAAAAAACIh6IJ01Rrkj4b0KVuu_n9m4TVKA=="><?=$point->desc?><?=($point->title!="")?"<p>".$point->title."</p>":""?></p></a></br>
		<?}?>
		</div>
	</body>
</html>