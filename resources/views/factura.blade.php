<x-layout>	
	<x-slot name="banner">
	</x-slot>
	
	<x-slot name="content">
		<article>
			<h1>Factura id: {{$factura_din->id}}</h1>

			<p>
				<div>Encarrec: <a href="/encarrecs/{{$factura_din->encarrec->id}}"> {{ $factura_din->encarrec->descripcio}}</a> </div>
				
			</p>

			
			<div>
				Data cobrament: {!! $factura_din->datacobrament !!}
			</div>
			<div>
				Total: {!! $factura_din->total_a_cobrar !!} euros
			</div>
		</article>
		<div>
			<br>
			<a href="/factures">Torna a factures</a>
		</div>
	</x-slot>
</x-layout>