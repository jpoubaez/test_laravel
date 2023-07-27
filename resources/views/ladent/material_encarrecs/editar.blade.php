
<x-layout>
	<section class="py-8 max-w-md mx-auto">
		<h1 class="text-lg font-bold mb-4">
			Editar/Esborrar una línia d'encàrrec
		</h1>
		<x-panell>
			<form method="POST" action="/admin/materialencarrecs/actualitzar/{{ $material_encarrec->id }}" enctype="multipart/form-data">
				@csrf
				<div class="lg:grid lg:grid-cols-10 gap-3 mb-3" >
					<div class="border border-gray-200 p-6 rounded-xl col-span-10">
						<label class="block uppercase font-bold text-lg text-gray-700">
								Descripció Tasca/Material:
						</label>
						<label class=" block uppercase font-bold text-xxs text-gray-700" for="descripcio">
								{{ $material_encarrec->encarrec->descripcio }}
						</label>
					</div>

					
					<label class="block mb-5 col-span-8 uppercase font-bold text-xs text-gray-700" for="materials_id">
							Tasca/Material
					</label>
					<label class="block mb-5 uppercase font-bold text-xs text-gray-700 col-span-2" for="quantitat_material">
									Quantitat
					</label>
					<select name="materials_id" id="materials_id" class="bg-green-100 rounded-xl col-span-8" required>
						@php
							$materials = \App\Models\Material::all()->sortBy("codimaterial");
						@endphp
						@foreach ($materials as $material)
							<option 
								value="{{ $material->id }}" 
									{{ $material_encarrec->materials_id == $material->id ? 'selected' : '' }} 
								>{{ ucwords($material->codimaterial) }} {{ ucwords($material->nom) }}</option>
						@endforeach
					</select>
						@error('materials_id')
							<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
						@enderror
					<input class="border border-gray-400 p-2 w-full col-span-2" 
						type="text" name="quantitat_material" id="quantitat_material" value="{{ $material_encarrec->quantitat_material }}" required>
						@error('quantitat_material')
							<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
						@enderror

					<div class="col-span-10">
						<x-submit-button>Guarda</x-submit-button>
						<a href="/admin/materialencarrecs/eliminar/{{$material_encarrec->id}}" 
       				class="px-4 py-2 mr-2 border border-blue-300 rounded-full text-red-500 text-xs uppercase font-bold 
       				   border-opacity-4 hover:border-opacity-5 rounded-xl bg-red-90 hover:bg-red-800"
        			style="font-size: 10px">Eliminar
						</a>		
						<x-material_encarrecs.enrera-button :desti="$material_encarrec->encarrec->id ">Torna Enrera </x-enrera-button>
					</div>
					
				</div>				
			</form>
			
		</x-panell>
	</section>
</x-layout>
