                @props(['albara'])
                <article
                    {{ $attributes->merge(['class'=>'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
                    <div class="py-6 px-5">
                        {{-- <div>
                            <img src="/storage/{{ $dentista->fotodentista }}" alt="Dentista foto logo" class="rounded-xl">
                        </div> --}}

                        <div class="mt-8 flex flex-col justify-between flex-1">
                            <header>
                                <div class="lg:grid lg:grid-cols-2">
                                    <div class="space-x-2 ">
                                        <x-albarans.dentista-button :dentista="$albara->encarrec->dentista" />
                                    </div>
                                    <div class="space-x-2">
                                        <x-albarans.pacient-button :pacient="$albara->encarrec->pacient" />
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <h1 class="text-xl">
                                        <a href="/albara/{{ $albara->id }}">{{ $albara->encarrec->descripcio }}</a>
                                    </h1>

                                    <span class="mt-2 block text-s">
                                        Dentista: <span class="mt-2  text-gray-400 text-s"> {{ $albara->encarrec->dentista->nom }}  {{ $albara->encarrec->dentista->cognoms }}</span>
                                    </span>
                                    <span class="mt-2 block text-s">
                                        Pacient: <span class="mt-2  text-gray-400 text-s"> {{ $albara->encarrec->pacient->nom }}  {{ $albara->encarrec->pacient->cognoms }}</span>
                                    </span>
                                     @if ($albara->factura) 
                                    <div class="mt-2 block"> <span class="font-bold"> Factura:</span>
                                        <a href="/factura/{{ $albara->factura->id }}" class="ml-6 text-s hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5">{{ $albara->factura->data_generacio }}</a><span class="font-bold"> Total: </span>{{ $albara->factura->total_a_cobrar }} €
                                    </div>
                                @endif
                                </div>
                            </header>

                            <footer class="flex justify-between items-center mt-8">
                                
                            </footer>
                        </div>
                    </div>
                </article>