<x-layout>
	<x-slot name="banner">
		<h1> Les factures </h1>
	</x-slot>	
	<x-slot name="content">
		@foreach ($factures as $factura)
		<article class="{{ $loop->even ? 'foo' : '' }}">
			<h1>
				<a href="/factures/{{ $factura->id }}">
						Num. factura: {{ $factura->id }}
				</a>
			</h1>
			<p>
				Encarrec: <a href="/encarrecs/{{$factura->encarrec->id}}"> {{ $factura->encarrec->descripcio}}</a>
			</p>

			<div>
				{{ $factura->datacobrament }}
			</div>
			<div>
				{{ $factura->total_a_cobrar }} euros
			</div>
			
		</article>
			@endforeach
	</x-slot>
</x-layout>
