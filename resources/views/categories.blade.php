<x-layout>
	<x-slot name="banner">
		<h1> El meu blog </h1>
	</x-slot>	
	<x-slot name="content">
		@foreach ($categories as $categoria)
		<article class="{{ $loop->even ? 'foo' : '' }}">
			<h1>
				Nom categoria: 	<a href="categories/{{ $categoria->slug }}">
					{{ $categoria->nom }}
				</a>
			</h1>
			@php
			$posts = $categoria->posts;
			foreach ($posts as $post) {
			@endphp
			<p>
			Títol del post:	<a href="posts/{{$post->slug}}"> {{ $post->titol}}</a>
			</p>
			@php
			}
            @endphp
		</article>
		@endforeach
	</x-slot>
</x-layout>