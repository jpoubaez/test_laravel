@props(['encarrec'])
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
                                    <x-encarrecs.dentista-button :dentista="$encarrec->dentista" />
                                </div>
                                <div class="space-x-2">
                                    <x-encarrecs.pacient-button :pacient="$encarrec->pacient" />
                                </div>
                            </div>    
                            <div class="mt-4">
                                <h1 class="text-3xl">
                                    <a href="/encarrec/{{ $encarrec->id }}">{{ $encarrec->descripcio }}</a>       
                                </h1>

                                <span class="mt-2 block text-s">
                                        Dentista: <span class="mt-2  text-gray-400 text-s"> {{ $encarrec->dentista->nom }}  {{ $encarrec->dentista->cognoms }}</span>
                                </span>
                                <span class="mt-2 block text-s">
                                        Pacient: <span class="mt-2  text-gray-400 text-s"> {{ $encarrec->pacient->nom }}  {{ $encarrec->pacient->cognoms }}</span>
                                </span>
                                    
                                @if ($encarrec->albara)
                                    <x-panell class="mt-4 bg-purple-100 text-2xs">
                                        <span class="font-bold"> Albarà: </span>   <a href="/albara/{{ $encarrec->albara->id }}">{{ $encarrec->albara->id }}</a>  
                                        <div> <span class="font-bold"> Total:</span>  {{ $encarrec->albara->total }} € </div>
                                    </x-panell>
                                @endif
                                    
                            </div>
                        </header>

                        <footer class="flex justify-between items-center mt-8">
                            
                        </footer>
                    </div>
                </div>
            </article>