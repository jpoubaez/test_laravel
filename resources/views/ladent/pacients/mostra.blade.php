
<x-layout>
    @include ('ladent.dentistes._header')
    
	<section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-4 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="" alt="" class="rounded-xl">                    
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/pacients"
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

                            Torna a tots els pacients
                        </a>

                        <div class="space-x-2">
                            {{-- <x-clinica-button :clinica="$dentista->clinica" /> --}}
                        </div>
                    </div>
                    <div class="relative flex lg:inline-flex items-center ">
                        <ul  style = "overflow: hidden; margin-left: 20px;" class="rounded-xl px-4 py-2 bg-blue-100 ">
                            <li style="float: left;"><a href="/admin/pacient/editar/{{ $pacient->id }}" class=" text-xs font-bold uppercase hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5">Editar</a></li>
                            <li style="float: left;"><a href="/admin/pacient/esborrar/{{ $pacient->id }}" class="ml-6 text-xs font-bold uppercase hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5">Esborrar</a></li>
                            <li style="float: left;"><a href="/print/pacient/{{ $pacient->id }}" class="ml-6 text-xs font-bold uppercase hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5">Imprimir</a></li>
                        </ul>
                    </div>
                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $pacient->nom }} {!! $pacient->cognoms !!}
                    </h1>

                    <section class="col-span-8 col-start-5 mt-10 space-y-6">
                        @foreach($pacient->encarrecs as $encarrec)
                            <x-encarrec :encarrec="$encarrec" />
                        @endforeach

                    </section>
                </div>
            </article>
        </main>
    </section>
</x-layout>
