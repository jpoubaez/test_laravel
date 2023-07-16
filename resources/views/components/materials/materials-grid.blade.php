@props(['materials'])

	<x-materials.material-featured-card :material="$materials[0]" />

	@if ($materials->count()>1)
	    <div class="lg:grid lg:grid-cols-6">
	    	@foreach ($materials->skip(1) as $material)
	        	<x-materials.material-card :material="$material" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}"/>
	        @endforeach
	    </div>
	@endif