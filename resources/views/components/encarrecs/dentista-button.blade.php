@props(['dentista'])

<a href="/encarrecs?dentista={{$dentista->id}}" 
        class="px-3 py-1 border border-green-300 rounded-full text-green-300  uppercase font-semibold"
        style="font-size: 8px">Dentista: {{ $dentista->nom }} {{ $dentista->cognoms }}
</a>
