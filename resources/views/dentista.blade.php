<x-layout>	
	<x-slot name="banner">
	</x-slot>
	
	<x-slot name="content">
		<article>
			<h1>{{$dentista_din->nom}}</h1>

			<div>
				{!! $dentista_din->adresa !!}
			</div>
			<div>
				{!! $dentista_din->codipostal !!}
			</div>
			<div>
				{!! $dentista_din->ciutat !!}
			</div>
			<div>
				{!! $dentista_din->NIF !!}
			</div>
			<div>
				{!! $dentista_din->numcolegiat !!}
			</div>

		</article>
		<div>
			<br>
			<a href="/dentistes">Torna enrera</a>
		</div>
	</x-slot>
</x-layout>