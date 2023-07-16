
<x-layout>
	<section class="py-8 max-w-md mx-auto">
		<h1 class="text-lg font-bold mb-4">
			Crear un nou material
		</h1>
		<x-panell>
			<form method="POST" action="/admin/materials" enctype="multipart/form-data">
				@csrf

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="nom">
						Nom
					</label>
					<input class="border border-gray-400 p-2 w-full" 
						type="text" name="nom" id="nom" value="{{ old('nom') }}" required>
					@error('nom')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>	

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="codimaterial">
						Codi
					</label>
					<input class="border border-gray-400 p-2 w-full" 
						type="text" name="codimaterial" id="codimaterial" value="{{ old('codimaterial') }}" required>
					@error('codimaterial')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>	

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="preu_unitari">
						Preu unitari
					</label>
					<input class="border border-gray-400 p-2 w-full" 
						type="text" name="preu_unitari" id="preu_unitari" value="{{ old('preu_unitari') }}" required>
					@error('preu_unitari')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>	

				{{-- <div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="fotomaterial">
						Foto del Material
					</label>
					<input class="border border-gray-400 p-2 w-full" 
						type="file" name="fotomaterial" id="fotomaterial" >
					@error('fotomaterial')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div> --}}

				<x-submit-button>Guarda</x-submit-button>

			</form>
		</x-panell>
	</section>
</x-layout>