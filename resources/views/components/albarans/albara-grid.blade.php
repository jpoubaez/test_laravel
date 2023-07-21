@props(['albarans'])

	<x-albarans.albara-featured-card :albara="$albarans[0]" />

	@if ($albarans->count()>1)
	    <div class="lg:grid lg:grid-cols-6">
	    	@foreach ($albarans->skip(1) as $albara)
	        	<x-albarans.albara-card :albara="$albara" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}"/>
	        @endforeach
	    </div>
	@endif