
<x-layout>
    @include ('ladent.albarans._header')
    
	<section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-4 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="" alt="" class="rounded-xl">   
                </div> 

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/albarans"
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

                            Torna a tots els albarans
                        </a>
                    </div>
                    <div class="relative flex lg:inline-flex items-center ">
                        <ul  style = "overflow: hidden; margin-left: 20px;" class="rounded-xl px-4 py-2 bg-blue-100 ">
                            <li style="float: left;"><a href="/admin/albara/eliminar/{{ $albara->encarrec->id }}" class="text-xs font-bold uppercase hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5">Esborrar</a></li>
                            <li style="float: left;"><a href="/print/albara/{{ $albara->id }}" class="ml-6 text-xs font-bold uppercase hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5">Imprimir</a></li>
                            @if ( !($albara->factura))  
                                <li style="float: left;"><a href="/admin/factura/afegir/{{ $albara->id }}" class="ml-6 text-xs font-bold uppercase hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5">Fer Factura</a></li>
                                <li style="float: left;"><a href="/admin/factura/afegiralbara/{{ $albara->id }}" class="ml-6 text-xs font-bold uppercase hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5">Afegir a Factura</a></li>
                            @else
                                <li style="float: left;"><a href="/admin/factura/treurealbara/{{ $albara->id }}" class="ml-6 text-xs font-bold uppercase hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5">Treure de Factura</a></li>
                            @endif
                        </ul>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-4">
                        {{ $albara->encarrec->descripcio }}
                    </h1>

                    <div class="lg:grid lg:grid-cols-2">
                            <div class="space-x-2 ">
                                <x-albarans.dentista-button :dentista="$albara->encarrec->dentista" />
                            </div>
                            <div class="space-x-2">
                                <x-albarans.pacient-button :pacient="$albara->encarrec->pacient" />
                            </div>
                    </div>

                    <section class="col-span-8 col-start-5 mt-10 space-y-6">
                        @php
                            $totalencarrec = 0;
                        @endphp
                        @foreach($albara->encarrec->material_encarrec as $liniaencarrec)
                            @php
                                $totalencarrec+=$liniaencarrec->sub_total;
                            @endphp
                            <x-albarans.liniaencarrec :liniaencarrec="$liniaencarrec" />
                        @endforeach
                        <x-panell class="bg-purple-100 text-3xl">
                            <div> <span class="font-bold"> Total:</span>  {{ $totalencarrec }} € </div>
                        </x-panell>
                        @if ($albara->factura) 
                            <x-panell class="bg-pink-100 text-2xl">
                                <div> <span class="font-bold"> Factura:</span>
                                    <a href="/factura/{{ $albara->factura->id }}" class="ml-6 text-xl font-bold uppercase hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5">{{ $albara->factura->data_generacio }}</a>
                                </div>
                            </x-panell>
                        @endif
                        
                    </section>
                </div>
            </article>
        </main>
    </section>
</x-layout>
