
<x-layout>
	<section class="py-8 max-w-md mx-auto">
		<h1 class="text-lg font-bold mb-4">
			Crear un nou encàrrec
		</h1>
		<x-panell>
			<form method="POST" action="/admin/encarrecs" enctype="multipart/form-data">
				@csrf

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="descripcio">
						Descripcio
					</label>
					<input class="border border-gray-400 p-2 w-full" 
						type="text" name="descripcio" id="descripcio" value="{{ old('descripcio') }}" required>
					@error('descripcio')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>	

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="data_entrega">
						Data entrega (aaaa-mm-dd)
					</label>
					<input class="border border-gray-400 p-2 w-full" 
						type="text" name="data_entrega" id="data_entrega" value="{{ old('data_entrega') }}">
					@error('data_entrega')
						<p class="text-red-500 text-xs mt-2">{{ $message }}</p>
					@enderror
				</div>	


				<div class="lg:grid lg:grid-cols-2 gap-20 mb-6" >
					<div>
						<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="dentista_id">
							Dentista
						</label>
						<select name="dentista_id" id="dentista_id" required>
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
						<select name="pacient_id" id="pacient_id" required>
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


				<x-submit-button>Guarda</x-submit-button>

			</form>
		</x-panell>
	</section>
</x-layout>