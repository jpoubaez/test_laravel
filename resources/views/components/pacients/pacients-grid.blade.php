@props(['pacients'])

	<x-pacients.pacient-featured-card :pacient="$pacients[0]" />

	@if ($pacients->count()>1)
	    <div class="lg:grid lg:grid-cols-6">
	    	@foreach ($pacients->skip(1) as $pacient)
	        	<x-pacients.pacient-card :pacient="$pacient" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}"/>
	        @endforeach
	    </div>
	@endif