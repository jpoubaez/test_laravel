@props(['encarrec'])
<x-panell class="bg-gray-100">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            {{-- <img src="https://i.pravatar.cc/60?u={{ $comentari->id }}" alt="" width="60" height="60"> --}}
        </div>
        <div>
            <header class="mb-4">
                <h3 class="font-bold"><a href="encarrecs/{{ $encarrec->id }}">Feina: {{ $encarrec->descripcio }}</a></h3>
                <p class="text-xs">Nom pacient: {{ $encarrec->pacient->nom }} {{ $encarrec->pacient->cognoms }}</p>
                <p class="text-xs">Data creacio: <time>{{ $encarrec->created_at->diffForHumans() }}</time> </p>
                @if (is_null ($encarrec->data_entrega) )
                    <p class="text-xs">No hi ha Data entrega.</p>
                @else
                   <p class="text-xs">Data entrega: <time>{{ $encarrec->data_entrega }}</time> </p>
                @endif
            </header>
          
            <div class="text-sm mt-2 space-y-4"> {{-- Mostrar 5 últims encàrrecs --}}
                
                @foreach($encarrec->material_encarrec as $encarrec)
                    {{-- <x-miniencarrec-card :encarrec="$encarrec" />   --}}   
                    <p>
                        Feina/Material: {{ $encarrec->material->nom }}  Quantitat: {{ $encarrec->quantitat_material }}
                    </p>  
                @endforeach
            </div>
          
        </div>
    </article>
</x-panell>
