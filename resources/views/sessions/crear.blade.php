<x-layout>

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center front-bold text-xl">Entra</h1>
            <form method="POST" action="/sessions" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase front-bold text-xs text-gray-700" for="email">
                        correu electronic
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="email" name="email"
                           value="{{ old('email') }}" id="email" required>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase front-bold text-xs text-gray-700" for="password">
                        password
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="password" name="password"  id="password" required>

                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Entrar
                    </button>
                </div>
                @if ($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-red-500 text-xs">{{ $error }} </li>
                        @endforeach
                    </ul>
                @endif
            </form>

        </main>
    </section>
</x-layout>
