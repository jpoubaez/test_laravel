
<x-layout>
	<section class="py-8 max-w-md mx-auto">
		<h1 class="text-lg font-bold mb-4">
			Esborrar un encàrrec
		</h1>
		<x-panell>
			

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700">
						Descripcio
					</label>
					<label class="border border-gray-400 p-2 w-full">{{ $encarrec->descripcio }}</label> 
				</div>	

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700">
						Data entrega (aaaa-mm-dd)
					</label>
					<label class="border border-gray-400 p-2 w-full">{{ $encarrec->data_entrega }}</label> 

				</div>	

				<div class="lg:grid lg:grid-cols-2 gap-20 mb-6" >
					<div>
						<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="dentista_id">
							Dentista
						</label>
						<label class="border border-gray-400 p-2 w-full">{{ ucwords($encarrec->dentista->nom) }} {{ ucwords($encarrec->dentista->cognoms) }}</label> 
						
					</div>	
					<div>
						<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="pacient_id">
							Pacient
						</label>
						<label class="border border-gray-400 p-2 w-full">{{ ucwords($encarrec->pacient->nom) }} {{ ucwords($encarrec->pacient->cognoms) }}</label> 
						
					</div>	
				</div>		
				<x-encarrecs.enrera-button :desti="$encarrec->id">Torna Enrera </x-enrera-button>
				<a href="/admin/encarrec/eliminar/{{$encarrec->id}}" 
       				class="px-4 py-2 border border-blue-300 rounded-full text-red-500 text-xs uppercase font-bold 
       				   border-opacity-4 hover:border-opacity-5 rounded-xl bg-red-90 hover:bg-red-800 ml-10"
        			style="font-size: 10px">Eliminar
				</a>			
		</x-panell>
	</section>
</x-layout>
