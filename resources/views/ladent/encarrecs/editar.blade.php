
<x-layout>
	<section class="py-8 max-w-md mx-auto">
		<h1 class="text-lg font-bold mb-4">
			Editar un encarrec
		</h1>
		<x-panell>
			<form method="POST" action="/admin/encarrec/actualitzar/{{ $encarrec->id }}" enctype="multipart/form-data">
				@csrf

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="descripcio">
						Descripcio
					</label>
					<input class="border border-gray-400 p-2 w-full" 
						type="text" name="descripcio" id="descripcio" value="{{ $encarrec->descripcio }}" required>
					@error('descripcio')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>	

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="data_entrega">
						Data entrega (aaaa-mm-dd)
					</label>
					<input class="border border-gray-400 p-2 w-full" 
						type="text" name="data_entrega" id="data_entrega" value="{{ $encarrec->data_entrega }}">
					@error('data_entrega')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>	


				<div class="lg:grid lg:grid-cols-2 gap-20 mb-6" >
					<div>
						<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="dentista_id">
							Dentista
						</label>
						<select name="dentista_id" id="dentista_id" class="bg-green-100 rounded-xl" required>
							@php
								$dentistes = \App\Models\Dentista::all()->sortBy("cognoms");
							@endphp
							@foreach ($dentistes as $dentista)
								<option 
									value="{{ $dentista->id }}" 
									{{ old('dentista') == $dentista->id ? 'selected' : '' }} 
								>{{ ucwords($dentista->nom) }} {{ ucwords($dentista->cognoms) }}</option>
							@endforeach
						</select>
						@error('dentista_id')
							<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
						@enderror
					</div>	
					<div>
						<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="pacient_id">
							Pacient
						</label>
						<select name="pacient_id" id="pacient_id" class="bg-green-100 rounded-xl" required>
							@php
								$pacients = \App\Models\Pacient::all()->sortBy("cognoms");
							@endphp
							@foreach ($pacients as $pacient)
								<option 
									value="{{ $pacient->id }}" 
									{{ old('pacient') == $pacient->id ? 'selected' : '' }} 
								>{{ ucwords($pacient->nom) }} {{ ucwords($pacient->cognoms) }}</option>
							@endforeach
						</select>
						
						@error('pacient_id')
							<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
						@enderror
					</div>
				</div>

				<section class="col-span-8  mt-5 mb-5 space-y-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="dentista_id">
							Tasques Material Quantitat
					</label>

                        @php
                            $totalencarrec = 0;
                        @endphp
                        @foreach($encarrec->material_encarrec as $liniaencarrec)
                            
                        <x-liniaencarrec :liniaencarrec="$liniaencarrec" />
                        @endforeach
                        
					
					<x-submit-button>Actualitza</x-submit-button>
					<x-encarrecs.enrera-button :desti="$encarrec->id">Torna Enrera </x-enrera-button>	
            </form>     
            
                        
           
			<form method="POST" action="/admin/materialencarrecs/afegir/{{ $encarrec->id }}" enctype="multipart/form-data">
					@csrf
				<div class="lg:grid lg:grid-cols-2 gap-10 mb-3" >
	               	<div>
						<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="materials_id">
							Tasca/Material
						</label>
						<select name="materials_id" id="materials_id" class="bg-green-100 rounded-xl" required>
									@php
										$materials = \App\Models\Material::all()->sortBy("codimaterial");
									@endphp
									@foreach ($materials as $material)
										<option 
											value="{{ $material->id }}" 
											{{ old('material') == $material->id ? 'selected' : '' }} 
										>{{ ucwords($material->codimaterial) }} {{ ucwords($material->nom) }}</option>
									@endforeach
						</select>
								@error('materials_id')
									<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
								@enderror
					
					</div>
					<div>		
						<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="quantitat_material">
									Quantitat
						</label>
						<input class="border border-gray-400 p-2 w-full" 
							type="text" name="quantitat_material" id="quantitat_material" value="{{ old('quantitat_material') }}" required>
									@error('quantitat_material')
										<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
									@enderror
						
					</div>		
					<x-submit-button>Afegir</x-submit-button>
				</div>
			</form>
			<x-panell class="bg-purple-100 text-lg mt-4">
                    @if ($encarrec->albara)
                    <span class="font-bold"> Albarà: </span>   <a href="/albara/{{ $encarrec->albara->id }}">{{ $encarrec->albara->id }}</a>  
                    @endif
        	</x-panell>
		</x-panell>
	</section>
</x-layout>
