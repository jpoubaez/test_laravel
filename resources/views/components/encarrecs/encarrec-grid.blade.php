@props(['encarrecs'])

	<x-encarrecs.encarrec-featured-card :encarrec="$encarrecs[0]" />

	@if ($encarrecs->count()>1)
	    <div class="lg:grid lg:grid-cols-6">
	    	@foreach ($encarrecs->skip(1) as $encarrec)
	        	<x-encarrecs.encarrec-card :encarrec="$encarrec" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}"/>
	        @endforeach
	    </div>
	@endif