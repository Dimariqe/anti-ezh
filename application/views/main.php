<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
	<head>
		<meta name="robots" content="index, follow" /> 
		<meta name="keywords" content="Курительные смеси в Новосибирске, легальные курительные смеси, порошки в Новосибирске, нюхательные порошки, легальные порошки в Новосибирске, новые курительные смеси, новые порошки в Новосибирске, наркотики, не запрещенные курительные смеси, афродизиаки!" /> 
		<meta name="description" content="Здравствуйте! На нашем сайт вы можете найти информацию о средствах для отпугивания Ежей и Енотов. У нас вы не можете купить курительные смеси в Новосибирске, мы не знаем, где купить курительные миксы в Новосибирске." /> 
		<title><?=$title?> :: Anti-Ezh.com</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="/src/css/base.css" type="text/css" media="all" /> 
		<link rel="stylesheet" href="/src/css/ui.css" type="text/css" media="all"  />
		<link rel="stylesheet" href="/src/css/cle.css" type="text/css" media="all"  />
		<script type="text/javascript" src="/src/js/jq.js"></script>
		<script type="text/javascript" src="/src/js/jqui.js"></script>
		<script type="text/javascript" src="/src/js/userscript.js"></script>
		<script type="text/javascript" src="/src/js/jcle.js"></script>
		<script type="text/javascript" src="/src/js/translit.js"></script>
		<? if(isset($points)) echo '<script src="http://api-maps.yandex.ru/1.1/index.xml?key=AFpjGU4BAAAAIVhKUQIA-sW7JbkCRE9XnZ5GV6eYLIwiGqUAAAAAAAAAAACIh6IJ01Rrkj4b0KVuu_n9m4TVKA==" type="text/javascript"></script>'; ?> 
		<? if(isset($points)) echo '<script type="text/javascript" src="/ajax/map/jspoints/"></script>'; ?>
		
	</head>
	<body>
		<div id="cover">
			<div id="right-pattern"></div>
			<div id="left-pattern"></div>
			<? if(!isset($points)){ ?>
			<div id="cap"></div>
			<?}?>
			<div id="menu">
				<ul>
					<a href="/"><li>Новости с фронtа</li></a>
					<a href="/product.html"><li>Наше оружие</li></a>
					<a href="/map/"><li>Блокпосты</li></a>
					<?if(!isset($login)) {?>
					<a href="/auth/" id="auth"><li>Авторизация</li></a>
					<?} else {?>
					<a href="/auth/logout/"><li>Выход</li></a>
					<?}?>
				</ul>
			</div>
			<div id="content">
				<?if(!isset($admin)){?>
				<div id="hotlines">
					<span>2-143-143</span><span>291-89-65</span></br>
					<span>299-79-13</span><span>292-77-77</span>
				</div>
				<?} else {?>
				<div id="admin">
					<a href="/admin/">Перейти в админку</a>
				</div>
				<?}?>
				<?=$add?>
				
			</div>
		</div>
		<div id="footer">Анти-ЕЖ и Анти-ЕНОТ TM. Официальная страница.</div>
	</body>
</html>