
<x-layout>
    @include ('ladent.factures._header')
    
	<section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-4 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="" alt="" class="rounded-xl">   
                </div> 

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/factures"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Torna a totes les factures
                        </a>
                    </div>
                    <div class="relative flex lg:inline-flex items-center ">
                        <ul  style = "overflow: hidden; margin-left: 20px;" class="rounded-xl px-4 py-2 bg-blue-100 ">
                            <li style="float: left;"><a href="/admin/factura/eliminar/{{ $factura->id }}" class="text-xs font-bold uppercase hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5">Esborrar</a></li>
                            <li style="float: left;"><a href="/mostra/factura/{{ $factura->id }}" class="ml-6 text-xs font-bold uppercase hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5">Mostra</a></li>
                            <li style="float: left;"><a href="/print/factura/{{ $factura->id }}" class="ml-6 text-xs font-bold uppercase hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5">Imprimir</a></li>
                            <li style="float: left;"><a href="/admin/factura/buscaralbara/{{ $factura->id }}" class="ml-6 text-xs font-bold uppercase hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5">Afegir un albarà</a></li>
                        </ul>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-4">
                        {{ $factura->data_generacio }}
                    </h1>

                    <div class="lg:grid lg:grid-cols-3">
                        <div class="space-x-2 ">
                            <x-factures.dentista-button :dentista="$factura->albarans[0]->encarrec->dentista" />
                        </div>
                        @foreach($factura->albarans as $albara) 
                            <div class="space-x-2">
                                <x-factures.pacient-button :pacient="$albara->encarrec->pacient" />
                            </div>
                        @endforeach
                    </div> 

                    <section class="col-span-8 col-start-5 mt-10 space-y-6">
                        @foreach($factura->albarans as $albara)
                            <x-panell class="bg-pink-100 text-xl">
                                <div> <span class="font-bold"> Albarà:</span>
                                <a href="/albara/{{ $albara->id }}" class="ml-6 text-xxs  hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5"> {{ $albara->encarrec->descripcio }} </a>
                                 </div>
                                <div> <span class="font-bold"> Total:</span>  {{ $albara->total }} € </div>
                            </x-panell>  
                            {{-- @foreach($albara->encarrec->material_encarrec as $liniaencarrec)
                                <x-albarans.liniaencarrec :liniaencarrec="$liniaencarrec" />
                            @endforeach --}}
                            
                        @endforeach
                    </section>
                    <x-panell class="bg-purple-100 text-3xl mt-4">
                        <div> <span class="font-bold"> Total Factura :</span>  {{ $factura->total_a_cobrar }} € </div>
                    </x-panell>
                </div>
            </article>
        </main>
    </section>
</x-layout>
