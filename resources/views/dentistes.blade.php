<x-layout>
	<x-slot name="banner">
		<h1> Els dentistes </h1>
	</x-slot>	
	<x-slot name="content">
		@foreach ($dentistes as $dentista)
		<article class="{{ $loop->even ? 'foo' : '' }}">
			<h1>
				<a href="/dentistes/{{ $dentista->id }}">
						Nom dentista: {{ $dentista->nom }}
				</a>
			</h1>
			@php
			$encarrecs = $dentista->encarrecs;
			foreach ($encarrecs as $encarrec) {
			@endphp
			<p>
				Ha fet aquest Encarrec: <a href="/encarrecs/{{$encarrec->id}}"> {{ $encarrec->descripcio}}</a>
			</p>
			@php
			}
            @endphp
			<div>
				{{ $dentista->ciutat }}
			</div>
			
		</article>
			@endforeach
	</x-slot>
</x-layout>
