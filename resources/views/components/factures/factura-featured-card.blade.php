@props(['factura'])
<article
                class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                <div class="py-6 px-5 lg:flex">     
                    <div class="flex-1 lg:mr-8">
                        <img src="" alt="" class="rounded-xl">
                    </div>

                    <div class="flex-1 flex flex-col justify-between">
                        <header class="mt-8 lg:mt-0">
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
                            <div class="mt-4">
                               <h1 class="text-3xl">
                                    <a href="/factura/{{ $factura->id }}">{{ $factura->data_generacio }}</a> <span class="font-bold text-xl"> Total: {{ $factura->total_a_cobrar }} € </span>     
                                </h1>

                                {{-- <span class="mt-2 block text-s">
                                        Dentista: <span class="mt-2  text-gray-400 text-s"> {{ $albara->encarrec->dentista->nom }}  {{ $albara->encarrec->dentista->cognoms }}</span>
                                </span>
                                <span class="mt-2 block text-s">
                                        Pacient: <span class="mt-2  text-gray-400 text-s"> {{ $albara->encarrec->pacient->nom }}  {{ $albara->encarrec->pacient->cognoms }}</span>
                                </span> --}}
                            </div>
                        </header>

                        <footer class="flex justify-between items-center mt-8">
                            
                        </footer>
                    </div>
                </div>
            </article>