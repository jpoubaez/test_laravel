<x-layout>
	<x-slot name="banner">
		<h1> Els dentistes </h1>
	</x-slot>	
	<x-slot name="content">
		@foreach ($dentistes as $dentista)
		<article class="{{ $loop->even ? 'foo' : '' }}">
			<h1>
				<a href="/dentistes/{{ $dentista->id }}">
						{{ $dentista->nom }}
				</a>
			</h1>

			<div>
				{{ $dentista->ciutat }}
			</div>
			
		</article>
			@endforeach
	</x-slot>
</x-layout>
