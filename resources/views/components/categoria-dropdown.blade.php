<x-dropdown>
    <x-slot name="trigger"> {{--  aixo esta definit com $slot trigger al component --}}
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left lg:inline-flex">
            {{ isset($categoriaActual) ? ucwords($categoriaActual->nom) : 'Categories'}}
            <x-icones  name="fletxa-avall" class="absolute pointer-events-none"  style="right: 12px;" />
        </button>
    </x-slot>

    {{--  aixo esta definit com $slot al fitxer del component --}}

    <x-dropdown-item href="/blog?{{ http_build_query(request()->except('categoria','page')) }}">Totes</x-dropdown-item>

    @foreach ($categories as $categoria)

        {{-- <x-dropdown-item href="/categories/{{$categoria->slug}}"  --}}
        <x-dropdown-item
            href="/blog?categoria={{$categoria->slug}}&{{ http_build_query(request()->except('categoria','page')) }}"
            :active="isset($categoriaActual) && $categoriaActual->is($categoria)"
        >{{ucwords($categoria->nom)}} </x-dropdown-item>

    @endforeach
</x-dropdown>
