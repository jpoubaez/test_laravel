@props(['dentista'])
<article
                class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                <div class="py-6 px-5 lg:flex">
                    <div class="flex-1 lg:mr-8">
                        {{-- Pendent!!! --}}
                        <img src="/storage/{{ $dentista->clinica }}" alt="Dentista foto logo" class="rounded-xl">
                    </div>

                    <div class="flex-1 flex flex-col justify-between">
                        <header class="mt-8 lg:mt-0">
                            <div class="space-x-2">
                                <a href="/dentistes?clinica={{$dentista->clinica}}"
                                   class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                   style="font-size: 10px">{{ $dentista->clinica }}</a>
                            </div>

                            <div class="mt-4">
                                <h1 class="text-3xl">
                                    <a href="/dentista/{{ $dentista->numcolegiat }}">{{ $dentista->nom }} {{ $dentista->cognoms }}</a>       
                                </h1>

                                <span class="mt-2 block text-s">
                                        Clínica: <span class="mt-2  text-gray-400 text-s"> {{ $dentista->clinica }} </span>
                                </span>
                            </div>
                        </header>

                        <div class="text-sm mt-2 space-y-4"> {{-- Mostrar 5 últims encàrrecs --}}
                                @php($encarrecs = $dentista->encarrecs)
                                @php($j = count($encarrecs))
                                @if (count($encarrecs) > 5)
                                    @php($j = 5)
                                @endif
                                @for ($i=0;$i<$j;$i++)
                                    <x-miniencarrec-card :encarrec="$encarrecs[$i]" />
                                @endfor
                        </div>

                        <footer class="flex justify-between items-center mt-8">
                            

                            
                        </footer>
                    </div>
                </div>
            </article>