@props(['dentistes'])

	<x-dentista-featured-card :dentista="$dentistes[0]" />

	@if ($dentistes->count()>1)
	    <div class="lg:grid lg:grid-cols-6">
	    	@foreach ($dentistes->skip(1) as $dentista)
	        	<x-dentista-card :dentista="$dentista" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}"/>
	        @endforeach
	    </div>
	@endif