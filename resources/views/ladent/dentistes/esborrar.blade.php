
<x-layout>
	<section class="py-8 max-w-md mx-auto">
		<h1 class="text-lg font-bold mb-4">
			Esborrar un nou dentista
		</h1>
		<x-panell>
			

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700">
						Nom
					</label>
					<label class="border border-gray-400 p-2 w-full">{{ $dentista->nom }}</label> 
				</div>	

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700">
						Cognoms
					</label>
					<label class="border border-gray-400 p-2 w-full">{{ $dentista->cognoms }}</label> 

				</div>	

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700">
						Clínica
					</label>
					<label class="border border-gray-400 p-2 w-full">{{ $dentista->clinica }}</label> 	
				</div>	

				<div class="mb-6">   
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" >
						Foto del dentista/Clínica 
					</label>
					<img class="py-4 px-5 mb-4" src="/storage/{{ $dentista->fotodentista }}" alt="" class="rounded-xl">
				</div>

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700">
						Adreça
					</label>
					<label class="border border-gray-400 p-2 w-full">{{ $dentista->adresa }}</label> 
				</div>

				<div class="lg:grid lg:grid-cols-4 gap-5 mb-6" >
					<div class="col-span-3">
						<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="ciutat">
							Ciutat
						</label>
						<label class="border border-gray-400 p-2 w-full">{{ $dentista->ciutat }}</label>
					</div>	
					<div>
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="codipostal">
						Codi Postal
					</label>
					<label class="border border-gray-400 p-2 w-full">{{ $dentista->codipostal }}</label>
					</div>	
				</div>	

				<div class="lg:grid lg:grid-cols-2 gap-20 mb-6" >
					<div>
						<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="NIF">
							NIF
						</label>
						<label class="border border-gray-400 p-2 w-full">{{ $dentista->NIF }}</label>
					</div>	
					<div>
						<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="numcolegiat">
							Número de Col·legiat
						</label>
						<label class="border border-gray-400 p-2 w-full">{{ $dentista->numcolegiat }}</label>
					</div>	
				</div>	

				<a href="/dentista/{{$dentista->numcolegiat}}" 
       				class="px-4 py-2 border border-blue-300 rounded-full text-blue-700 text-xs uppercase font-bold hover:bg-green-300"
        			style="font-size: 10px">Torna enrera 
				</a>

				<a href="/admin/eliminar/{{$dentista->id}}" 
       				class="px-4 py-2 border border-blue-300 rounded-full text-red-500 text-xs uppercase font-bold 
       				   border-opacity-4 hover:border-opacity-5 rounded-xl bg-red-90 hover:bg-red-800 ml-10"
        			style="font-size: 10px">Eliminar
				</a>			
		</x-panell>
	</section>
</x-layout>