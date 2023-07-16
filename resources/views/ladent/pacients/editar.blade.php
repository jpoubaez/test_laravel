
<x-layout>
	<section class="py-8 max-w-md mx-auto">
		<h1 class="text-lg font-bold mb-4">
			Editar un pacient
		</h1>
		<x-panell>
			<form method="POST" action="/admin/pacient/actualitzar/{{ $pacient->id }}" enctype="multipart/form-data">
				@csrf

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="nom">
						Nom
					</label>
					<input class="border border-gray-400 p-2 w-full" 
						type="text" name="nom" id="nom" value="{{ $pacient->nom }}" >
					@error('nom')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>	

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="cognoms">
						Cognoms
					</label>
					<input class="border border-gray-400 p-2 w-full" 
						type="text" name="cognoms" id="cognoms" value="{{ $pacient->cognoms }}" required>
					@error('cognoms')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>	

				<x-submit-button>Actualitza</x-submit-button>
				<x-pacients.enrera-button :desti="$pacient->id">Torna Enrera </x-enrera-button>			
			</form>
		</x-panell>
	</section>
</x-layout>