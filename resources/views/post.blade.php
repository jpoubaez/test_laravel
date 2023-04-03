@extends('layout')

@section('content')
 <article>
	<h1>{{$posts_din->titol}}</h1>
	<p>
		<a href="#"> {{ $post->categoria->nom}}</a>
	</p>

	<div>
		{!! $posts_din->body !!}
	</div>
		
</article>

<a href="/blog">Torna enrera</a>
@endsection

