@props(['material'])
<article
                class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                <div class="py-6 px-5 lg:flex">
                    <div class="flex-1 lg:mr-8">
                        <img src="/storage/{{ $material->fotomaterial }}" alt="material foto logo" class="rounded-xl">
                    </div>

                    <div class="flex-1 flex flex-col justify-between">
                        <header class="mt-8 lg:mt-0">
                            <div class="space-x-2">
                                {{-- <x-clinica-button :clinica="$dentista->clinica" /> --}}
                            </div>

                            <div class="mt-4">
                                <h1 class="text-3xl">
                                    <a href="/material/{{ $material->id }}">{{ $material->nom }}</a>       
                                </h1>

                                <span class="mt-2 block text-s">
                                    Codi: <span class="mt-2  text-gray-400 text-s"> {{ $material->codimaterial }}</span>
                                    Preu unitari: <span class="mt-2  text-gray-400 text-s"> {{ $material->preu_unitari }} </span>
                                </span>
                            </div>
                        </header>

                        <div class="text-sm mt-2 space-y-4"> {{-- Mostrar 5 últims encàrrecs on es fa servir --}}
                                @php($encarrecs = $material->materials_encarrecs)
                                @php($j = count($encarrecs))
                                @if (count($encarrecs) > 5)
                                    @php($j = 5)
                                @endif
                                @for ($i=0;$i<$j;$i++)
                                    <x-materials.miniencarrec-card :quantitat="$encarrecs[$i]->quantitat_material" :encarrec="$encarrecs[$i]->encarrec" />
                                @endfor
                        </div>

                        <footer class="flex justify-between items-center mt-8">
                            

                            
                        </footer>
                    </div>
                </div>
            </article>