
<x-layout>
	<section class="py-8 max-w-md mx-auto">
		<h1 class="text-lg font-bold mb-4">
			Crear un nou dentista
		</h1>
		<x-panell>
			<form method="POST" action="/admin/dentistes" enctype="multipart/form-data">
				@csrf

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="nom">
						Nom
					</label>
					<input class="border border-gray-400 p-2 w-full" 
						type="text" name="nom" id="nom" value="{{ old('nom') }}" >
					@error('nom')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>	

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="cognoms">
						Cognoms
					</label>
					<input class="border border-gray-400 p-2 w-full" 
						type="text" name="cognoms" id="cognoms" value="{{ old('cognoms') }}" required>
					@error('cognoms')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>	

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="clinica">
						Clínica
					</label>
					<input class="border border-gray-400 p-2 w-full" 
						type="text" name="clinica" id="clinica" value="{{ old('clinica') }}" required>
					@error('clinica')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>	

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="fotodentista">
						Foto del dentista/Clínica
					</label>
					<input class="border border-gray-400 p-2 w-full" 
						type="file" name="fotodentista" id="fotodentista" >
					@error('fotodentista')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="adresa">
						Adreça
					</label>
					<input class="border border-gray-400 p-2 w-full" 
						type="text" name="adresa" id="adresa" >
					@error('adresa')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>

				<div class="lg:grid lg:grid-cols-4 gap-5 mb-6" >
					<div class="col-span-3">
						<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="ciutat">
							Ciutat
						</label>
						<input class="border  border-gray-400 p-2 w-full" 
							type="text" name="ciutat" id="ciutat" value="{{ old('ciutat') }}" >
						@error('ciutat')
							<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
						@enderror
					</div>	
					<div>
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="codipostal">
						Codi Postal
					</label>
					<input class="border  border-gray-400 p-2 w-full" 
						type="text" name="codipostal" id="codipostal" value="{{ old('codipostal') }}" >
					@error('codipostal')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
					</div>	
				</div>	

				<div class="lg:grid lg:grid-cols-2 gap-20 mb-6" >
					<div>
						<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="NIF">
							NIF
						</label>
						<input class="border border-gray-400 p-2 w-full" 
							type="text" name="NIF" id="NIF" value="{{ old('NIF') }}" required>
						@error('NIF')
							<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
						@enderror
					</div>	
					<div>
						<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="numcolegiat">
							Número de Col·legiat
						</label>
						<input class="border border-gray-400 p-2 w-full" 
							type="text" name="numcolegiat" id="numcolegiat" value="{{ old('numcolegiat') }}" required>
						@error('numcolegiat')
							<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
						@enderror
					</div>	
				</div>	


				<x-submit-button>Guarda</x-submit-button>

			</form>
		</x-panell>
	</section>
</x-layout>