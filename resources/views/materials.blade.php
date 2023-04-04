<x-layout>
	<x-slot name="banner">
		<h1> Els materials </h1>
	</x-slot>	
	<x-slot name="content">
		@foreach ($materials as $material)
		<article class="{{ $loop->even ? 'foo' : '' }}">
			<h1>
				<a href="/materials/{{ $material->id }}">
						Material id: {{ $material->id }}
				</a>
			</h1>
			
			@php
			$encarrecs = $material->encarrecs;
			foreach ($encarrecs as $encarrec) {
			@endphp
			<p>
				Apareix a Encarrec: <a href="/encarrecs/{{$encarrec->id}}"> {{ $encarrec->descripcio}}</a>
			</p>
			@php
			}
            @endphp
			<div>
				Material: {{ $material->nom }}
			</div>
			<div>
				{{ $material->preu_unitari }} euros
			</div>
			
		</article>
			@endforeach
	</x-slot>
</x-layout>
