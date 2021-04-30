<!doctype html>
<title>El meu blog</title>
<link rel="stylesheet" href="/app.css">

<body>
	<article>
		<h1>{{$posts_din->titol}}</h1>
		<div>
			{!! $posts_din->body !!}
		</div>
		
	</article>

	<a href="/blog">Torna enrera</a>
	
</body>