
<x-layout>
	<section class="py-8 max-w-md mx-auto">
		<h1 class="text-lg font-bold mb-4">
			Esborrar un material
		</h1>
		<x-panell>
			

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700">
						Nom
					</label>
					<label class="border border-gray-400 p-2 w-full">{{ $material->nom }}</label> 
				</div>	

				<div class="lg:grid lg:grid-cols-4 gap-5 mb-6" >
				
					<div class="col-span-3">
						<label class="block mb-2 uppercase font-bold text-xs text-gray-700">
							Codi
						</label>
						<label class="border border-gray-400 p-2 w-full">{{ $material->codimaterial }}</label> 

					</div>	

					<div class="mb-6">
						<label class="block mb-2 uppercase font-bold text-xs text-gray-700">
							Preu unitari
						</label>
						<label class="border border-gray-400 p-2 w-full">{{ $material->preu_unitari }}</label> 

					</div>	
				</div>
 				<section class="col-span-8 col-start-5 mt-10 space-y-6">
                   	@foreach($material->materials_encarrecs as $encarrec)
                    	<x-encarrec :encarrec="$encarrec->encarrec" />
                    @endforeach

                </section>
					
				<x-materials.enrera-button :desti="$material->id">Torna Enrera </x-materials.enrera-button>
				<a href="/admin/material/eliminar/{{$material->id}}" 
       				class="px-4 py-2 border border-blue-300 rounded-full text-red-500 text-xs uppercase font-bold 
       				   border-opacity-4 hover:border-opacity-5 rounded-xl bg-red-90 hover:bg-red-800 ml-10"
        			style="font-size: 10px">Eliminar
				</a>			
		</x-panell>
	</section>
</x-layout>