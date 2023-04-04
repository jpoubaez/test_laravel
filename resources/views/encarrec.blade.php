<x-layout>	
	<x-slot name="banner">
	</x-slot>
	
	<x-slot name="content">
		<article>
			<h1>Num encarrec:{{$encarrec_din->id}}</h1>

			<div>
				Nom del dentista: <a href="/dentistes/{{ $encarrec_din->dentista->id }}">	{{ $encarrec_din->dentista->nom }}</a>
			</div>
			<div>
				Material fet servir: <a href="/materials/{{ $encarrec_din->material->id }}">	{{ $encarrec_din->material->nom }}</a>
			</div>
			<br>
			<div>
				Feina a fer: {!! $encarrec_din->descripcio !!}
			</div>
		</article>
		<div>
			<br>
			<a href="/encarrecs">Torna a encarrecs</a>
		</div>
	</x-slot>
</x-layout>