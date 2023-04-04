<!doctype html>

<title>El meu blog amb components blade</title>
<link rel="stylesheet" href="/app.css">

<body>
	<header>
		<nav>
		    <ul>
		      <li><a href="/dentistes">Dentistes</a></li>
		      <li><a href="/encarrecs">Encarrecs</a></li>
		      <li><a href="/factures">Factures</a></li>
		      <li><a href="/materials">Materials</a></li>
		      <li><a href="/blog">Posts</a></li>
		      <li><a href="/categories">Categories</a></li>
		    </ul>
  		</nav>
		{{ $banner }}
	</header>
	
		{{ $content }}
	
</body>