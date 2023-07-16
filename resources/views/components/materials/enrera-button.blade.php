@props(['desti'])

{{-- <a href="/categories/{{ $categoria->slug }}" --}}
<a href="/material/{{$desti}}" 
        class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 ml-10">
       {{ $slot }}
</a>
