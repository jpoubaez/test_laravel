<x-layout>
	<x-slot name="banner">
		<h1> El meu blog </h1>
	</x-slot>	
	<x-slot name="content">
		@foreach ($posts as $post)
		<article class="{{ $loop->even ? 'foo' : '' }}">
			<h1>
				Títol del post:	<a href="/posts/{{ $post->slug }}">
						{{ $post->titol }}
				</a>
			</h1>
			<p>
				Nom categoria: 	<a href="/categories/{{$post->categoria->slug}}"> {{ $post->categoria->nom}}</a>
			</p>

			<div>
				{{ $post->excerpt }}
			</div>
			
		</article>
			@endforeach
	</x-slot>
</x-layout>
