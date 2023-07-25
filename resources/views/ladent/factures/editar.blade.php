
<x-layout>
	<section class="py-8 max-w-md mx-auto">
		<h1 class="text-lg font-bold mb-4">
			Afegir un albarà a una factura
		</h1>
		<x-panell>
			<form method="POST" action="/admin/factura/afegiralbara/{{ $factura->id }}" enctype="multipart/form-data">
				@csrf
				<div class="lg:grid lg:grid-cols-2 gap-5 mb-3" >
					<div class="border border-gray-200 p-6 rounded-xl col-span-2">
						<label class="block uppercase font-bold text-lg text-gray-700">
								Nom factura:
						</label>
						<label class=" block uppercase font-bold text-xxs text-gray-700" for="descripcio">
								{{ $factura->created_at }}
						</label>
						<label class="block uppercase font-bold text-lg text-gray-700">
								Dentista:
						</label>
						<label class=" block uppercase font-bold text-xxs text-gray-700" for="descripcio">
								{{ $factura->albarans[0]->encarrec->dentista->nom }} {{ $factura->albarans[0]->encarrec->dentista->cognoms }}
						</label>
					</div>
					<div class="border border-gray-200 p-6 rounded-xl col-span-2">
						<label class="block mb-5 uppercase font-bold text-xs text-gray-700" for="materials_id">
							Albarans actuals
						</label>
						@foreach ($factura->albarans as $albara)
							<label class="block text-xs text-gray-700">
								Albarà: {{ $albara->encarrec->descripcio }}
							</label>
						@endforeach
					</div>

					<div class="gap-5  col-span-2">
						<select name="albara_id" id="albara_id" class="bg-green-100 rounded-xl" required>
							@php
								$albaransdisponibles = \App\Models\Albara::latest()->with(['encarrec' => fn($query)=>$query->where('dentista_id','like',$factura->albarans[0]->encarrec->dentista->id)])->whereHas('encarrec',fn($query) => $query->where('dentista_id','like',$factura->albarans[0]->encarrec->dentista->id))->get();
							@endphp
							@foreach ($albaransdisponibles as $albarapossible)
								@if (! $albarapossible->factura_id)
									<option 
										value="{{ $albarapossible->id }}"  
									>{{ ucwords($albarapossible->encarrec->descripcio) }}</option>
								@endif
							@endforeach
						</select>
								@error('albara_id')
									<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
								@enderror
					
					</div>				
				
					<x-submit-button>Afegeix</x-submit-button>
					
					<x-factures.enrera-button :desti="$factura->id ">Torna Enrera </x-enrera-button>
				</div>		
			</form>
			
		</x-panell>
	</section>
</x-layout>
