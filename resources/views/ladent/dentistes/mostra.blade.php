
<x-layout>
    @include ('ladent.dentistes._header')
    
	<section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-4 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="/storage/{{ $dentista->fotodentista }}" alt="" class="rounded-xl">

                    
                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">
                                {{-- <a href="/blog?autor={{ $dentista->autor->username }}">{{ $dentista->autor->name }}</a> --}}
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/dentistes"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Torna a tots els Dentistes
                        </a>

                        <div class="space-x-2">
                            <x-clinica-button :clinica="$dentista->clinica" />
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $dentista->nom }} {!! $dentista->cognoms !!}
                    </h1>

                    <section class="col-span-8 col-start-5 mt-10 space-y-6">
                        @foreach($dentista->encarrecs as $encarrec)
                            <x-encarrec :encarrec="$encarrec" />
                        @endforeach

                    </section>
                </div>
            </article>
        </main>
    </section>
</x-layout>
