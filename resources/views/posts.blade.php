
<x-layout>	
	<x-slot name="banner">
	</x-slot>
	
	<x-slot name="content">
		<article>
			<h1>{{$posts_din->titol}}</h1>
			<p>
				<a href="#"> {{ $posts_din->categoria->nom}}</a>
			</p>

			<div>
				{!! $posts_din->body !!}
			</div>
		
		</article>
		<a href="/blog">Torna enrera </a>
	</x-slot>
</x-layout>
