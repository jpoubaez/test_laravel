<x-layout>	
	<x-slot name="banner">
	</x-slot>
	
	<x-slot name="content">
		<article>
			<h1>{{$dentista_din->nom}}</h1>

			<div>
				{!! $dentista_din->adresa !!}
			</div>
		
		</article>
		<a href="/dentistes">Torna enrera</a>
	</x-slot>
</x-layout>