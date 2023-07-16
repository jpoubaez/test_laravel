                @props(['pacient'])
                <article
                    {{ $attributes->merge(['class'=>'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
                    <div class="py-6 px-5">
                        <div>
                            <img src="" alt="Dentista foto logo" class="rounded-xl">
                        </div>

                        <div class="mt-8 flex flex-col justify-between flex-1">
                            <header>
                                <div class="space-x-2">
                                    {{-- <x-clinica-button :clinica="$dentista->clinica" /> --}}
                                </div> 

                                <div class="mt-4">
                                    <h1 class="text-xl">
                                        <a href="/pacient/{{ $pacient->id }}">{{ $pacient->nom }} {{ $pacient->cognoms }}</a>
                                    </h1>

                                    {{-- <span class="mt-2 block text-xs">
                                        Dentista: <span class="mt-2  text-gray-400 text-s"> {{ $pacient->dentista }} </span>
                                    </span> --}}
                                </div>
                            </header>

                            <div class="text-sm mt-4 space-y-4"> {{-- Mostrar 5 últims encàrrecs --}}
                                @php($encarrecs = $pacient->encarrecs)
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