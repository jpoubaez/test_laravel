
<x-layout>
	<section class="py-8 max-w-md mx-auto">
		<h1 class="text-lg font-bold mb-4">
			Editar un material
		</h1>
		<x-panell>
			<form method="POST" action="/admin/material/actualitzar/{{ $material->id }}" enctype="multipart/form-data">
				@csrf

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="nom">
						Nom
					</label>
					<input class="border border-gray-400 p-2 w-full" 
						type="text" name="nom" id="nom" value="{{ $material->nom }}" >
					@error('nom')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>	

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="codimaterial">
						Codi
					</label>
					<input class="border border-gray-400 p-2 w-full" 
						type="text" name="codimaterial" id="codimaterial" value="{{ $material->codimaterial }}" required>
					@error('codimaterial')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>	

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="preu_unitari">
						Preu unitari
					</label>
					<input class="border border-gray-400 p-2 w-full" 
						type="text" name="preu_unitari" id="preu_unitari" value="{{ $material->preu_unitari }}" required>
					@error('preu_unitari')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>	

				{{-- <div class="mb-6">
                    <img class="py-4 px-5 mb-4" src="/storage/{{ $dentista->fotodentista }}" alt="" class="rounded-xl">    
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="fotomaterial">
						Foto del material
					</label>
					<input class="border border-gray-400 p-2 w-full" 
						type="file" name="fotomaterial" id="fotomaterial" >
					@error('fotomaterial')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div> --}}

				<x-submit-button>Actualitza</x-submit-button>
				<x-materials.enrera-button :desti="$material->id">Torna Enrera </x-materials.enrera-button>			
			</form>
		</x-panell>
	</section>
</x-layout>