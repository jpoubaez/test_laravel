@props(['pacient'])

<a href="/encarrecs?pacient={{$pacient}}" 
        class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 uppercase font-semibold"
        style="font-size: 8px">Pacient: {{ $pacient->nom }} {{ $pacient->cognoms }}
</a>
