@extends('layout')

@section('content')
 <article>
	<h1>{{$posts_din->titol}}</h1>

	<div>
		{!! $posts_din->body !!}
	</div>
		
</article>

<a href="/blog">Torna enrera</a>
@endsection

