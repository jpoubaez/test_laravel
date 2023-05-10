@auth()
    <x-panell>
        <form method="POST" action="/posts/{{ $posts_din->slug }}/comentaris" >
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ $posts_din->id }}" alt="" width="40" height="40" class="rounded-full">
                <h2 class="ml-4">Vols participar?</h2>
            </header>

            <div class="mt-6">
                <textarea required name="cos"
                    class="w-full text-sm focus:outline-none focus:ring"
                    rows="5"
                    placeholder="Posa alguna cosa...">
                </textarea>
                @error('cos')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-submit-button>Publica</x-submit-button>
            </div>

        </form>
    </x-panell>
@else
    <p class="font-semibold  border border-gray-200 p-6 rounded-xl bg-gray-200">
        <a href="/registre" class="hover:underline"> Registra t </a> o
        <a href="/entrar" class="hover:underline"> Entra  </a> per a deixar un comentari
    </p>
@endauth
