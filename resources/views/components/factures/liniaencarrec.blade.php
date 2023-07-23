@props(['liniaencarrec'])
<x-panell class="bg-green-100">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            {{-- <img src="https://i.pravatar.cc/60?u={{ $comentari->id }}" alt="" width="60" height="60"> --}}
        </div>
        <div>
            <header class="mb-4 space-x-4">  
                <h3 class="font-bold text-lg"><a href="/encarrec/{{ $liniaencarrec->encarrec->id }}">	{{ $liniaencarrec->material->nom }}</a></h3>

               <span class="text-sm">Quantitat: 	{{ $liniaencarrec->quantitat_material }}</span>
               <span class="text-sm ">Preu unitari: 	{{ $liniaencarrec->material->preu_unitari }}</span>
               @php
                 $subtotal=$liniaencarrec->sub_total;
               @endphp
               <div>Subtotal: {{ $subtotal }} € </div>
            </header>          
        </div>
    </article>
</x-panell>