@props(['encarrec','quantitat'])
<x-panell class="bg-gray-100">
    <article class="flex space-x-4">
        
        <div>
            <header>
                <h3 class="font-bold"><a href="encarrec/{{ $encarrec->id }}">Feina id: {{ $encarrec->descripcio }}</a></h3>
                <p class="text-xs">Quantitat: {{ $quantitat }}</p>
                <p class="text-xs">Pacient: {{ $encarrec->pacient->nom }} {{ $encarrec->pacient->cognoms }}</p>
                <p class="text-xs">Dentista: {{ $encarrec->dentista->nom }} {{ $encarrec->dentista->cognoms }}</p>
                {{-- <p class="text-xs">Data creacio: <time>{{ $encarrec->created_at->diffForHumans() }}</time> </p>
                @if (is_null ($encarrec->data_entrega) )
                    <p class="text-xs">No hi ha Data entrega.</p>
                @else
                   <p class="text-xs">Data entrega: <time>{{ $encarrec->data_entrega }}</time> </p>
                @endif --}}
            </header>
        </div>
    </article>
</x-panell>