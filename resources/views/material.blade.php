<x-layout>	
	<x-slot name="banner">
	</x-slot>
	
	<x-slot name="content">
		<article>
			<h1>{{$material_din->id}}</h1>

			<div>
				{!! $material_din->nom !!}
			</div>
			<div>
				{!! $material_din->preu_unitari !!}
			</div>
		</article>
		<div>
			<br>
			<a href="/materials">Torna enrera</a>
		</div>
	</x-slot>
</x-layout>