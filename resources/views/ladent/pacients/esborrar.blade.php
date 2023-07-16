
<x-layout>
	<section class="py-8 max-w-md mx-auto">
		<h1 class="text-lg font-bold mb-4">
			Esborrar un pacient
		</h1>
		<x-panell>
			

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700">
						Nom
					</label>
					<label class="border border-gray-400 p-2 w-full">{{ $pacient->nom }}</label> 
				</div>	

				<div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700">
						Cognoms
					</label>
					<label class="border border-gray-400 p-2 w-full">{{ $pacient->cognoms }}</label> 

				</div>	

				<section class="col-span-8 col-start-5 mt-10 space-y-6">
                        @foreach($pacient->encarrecs as $encarrec)
                            <x-encarrec :encarrec="$encarrec" />
                        @endforeach

                    </section>

					
				<x-pacients.enrera-button :desti="$pacient->id">Torna Enrera </x-enrera-button>
				<a href="/admin/pacient/eliminar/{{$pacient->id}}" 
       				class="px-4 py-2 border border-blue-300 rounded-full text-red-500 text-xs uppercase font-bold 
       				   border-opacity-4 hover:border-opacity-5 rounded-xl bg-red-90 hover:bg-red-800 ml-10"
        			style="font-size: 10px">Eliminar
				</a>			
		</x-panell>
	</section>
</x-layout>