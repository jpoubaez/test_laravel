<x-layout>

		@include ('ladent.dentistes._header')

		<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        	@if ($dentistes->count())
	            <x-dentistes.dentistes-grid :dentistes="$dentistes" />
                 {{ $dentistes->links() }}

            @else
				<p text="center"> No hi ha cap dentista.</p>
            @endif

        </main> 
</x-layout>
