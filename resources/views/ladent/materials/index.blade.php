<x-layout>

		@include ('ladent.materials._header')
		<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        	@if ($materials->count())
	            <x-materials.materials-grid :materials="$materials" />
                 {{ $materials->links() }}

            @else
				<p text="center"> No hi ha cap material.</p>
            @endif

        </main> 
</x-layout>
