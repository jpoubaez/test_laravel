<x-layout>

		@include ('ladent.encarrecs._header')

		<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        	@if ($encarrecs->count())
	            <x-encarrecs.encarrec-grid :encarrecs="$encarrecs" />
                 {{ $encarrecs->links() }}

            @else
				<p text="center"> No hi ha cap encarrec.</p>
            @endif

        </main> 
</x-layout>
