<!doctype html>
<title>El meu blog</title>
<link rel="stylesheet" href="/app.css">
<script src="/app.js"/></script>

<body>
	<?php foreach ($posts as $post) : ?>
		<article>
			<h1>
				<a href="/posts/<?= $post->slug; ?>">
						<?= $post->titol; ?>
				</a>
			</h1>

			<div>
				<?= $post->excerpt; ?>
			</div>
			
		</article>
	<?php endforeach; ?>
</body>