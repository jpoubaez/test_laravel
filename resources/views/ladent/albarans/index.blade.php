<x-layout>

		@include ('ladent.albarans._header')

		<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        	@if ($albarans->count())
	            <x-albarans.albara-grid :albarans="$albarans" />
                 {{ $albarans->links() }}
            @else
				<p text="center"> No hi ha cap albarà.</p>
            @endif

        </main> 
</x-layout>
