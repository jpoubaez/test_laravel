<x-layout>
	<x-slot name="banner">
		<h1> Els encarrecs </h1>
	</x-slot>	
	<x-slot name="content">
		@foreach ($encarrecs as $encarrec)
		<article class="{{ $loop->even ? 'foo' : '' }}">
			<h1>
				<a href="/encarrecs/{{ $encarrec->id }}">
						Num encarrec: {{ $encarrec->id }}
				</a>
			</h1>

			<div>
				<a href="/dentistes/{{ $encarrec->dentista->id }}">
						Dentista: {{ $encarrec->dentista->nom }}
				</a>
			</div>
			
		</article>
			@endforeach
	</x-slot>
</x-layout>
