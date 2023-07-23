<x-layout>

		@include ('ladent.factures._header')

		<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        	@if ($factures->count())
	            <x-factures.factura-grid :factures="$factures" />
                 {{ $factures->links() }}
            @else
				<p text="center"> No hi ha cap factura.</p>
            @endif

        </main> 
</x-layout>
