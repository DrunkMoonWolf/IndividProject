<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="ru" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta name="description" content=""/>
<meta name="keywords" content=""/> 
<meta name="author" content=""/> 
<link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css">
<title>Natural Essence</title>
</head>
<body>
<div id="wrapper">
<div id="container">
<div class="title">
	<h1><a href="/">Экзотика</a></h1>
</div>
<div class="header"></div>
	@yield('navig')

	

<div class="main" id="two-columns">
	<div class="col2"><div class="inner_copy"><div class="inner_copy">Шаблон с сайта cooltemplates.ru</div></div>
		<div class="left">
			<div class="content">
				<div class="row">

					@yield('content')

				</div>
			</div>
		</div>
		<div class="clearer"></div>
	</div>
	<div class="bottom">
		<div>
			<div class="niz">
			<h2>About</h2>
				<p>ЗОО-портал ЭКЗОТИКА. © Copyright 2003-2022.</p>
				<p><string>Политика конфиденциальности.</string></p>
				<p>Все логотипы, торговые марки и другие материалы на этом сайте являются собственностью их законных владельцев.</p>
				<p><strong>E-mail:</strong> admin@ekzotika.com</p>
				<p><strong>Подробнее:</strong><a href="https://www.ekzotika.com/">https://www.ekzotika.com/</a></p>
			</div>
			<table>
			<h2>Наши соцсети:</h2>
			<tr>
				<td><img src="img/insta.png" width="70" height="70" alt="" /></td><td style="width:2px"></td>
				<td><img src="img/vk.png" width="70" height="70" alt="" /></td><td style="width:2px"></td>
				<td><img src="img/telega.png" width="70" height="70" alt="" /></td>
			</tr>
			</table>
		</div>
		<div class="clearer"></div>
	</div>
	<div class="footer">
		<div class="left"><a href="#">Animals.com</a></div>
		<div class="right"><a href="http://shablonfree.ru/">Website template</a> by <a href="http://shablonfree.ru/">Arcsin</a></div>
		<div class="clearer"></div>

	</div>

</div>

</div>
</div>

</body>
</html>