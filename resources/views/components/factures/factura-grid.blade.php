@props(['factures'])

	<x-factures.factura-featured-card :factura="$factures[0]" />

	@if ($factures->count()>1)
	    <div class="lg:grid lg:grid-cols-6">
	    	@foreach ($factures->skip(1) as $factura)
	        	<x-factures.factura-card :factura="$factura" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}"/>
	        @endforeach
	    </div>
	@endif