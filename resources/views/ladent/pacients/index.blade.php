<x-layout>

		@include ('ladent.pacients._header')

		<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        	@if ($pacients->count())
	            <x-pacients.pacients-grid :pacients="$pacients" />
                 {{ $pacients->links() }}

            @else
				<p text="center"> No hi ha cap pacient.</p>
            @endif

        </main> 
</x-layout>
