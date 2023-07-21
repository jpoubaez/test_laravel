<!doctype html>

<title>Laboratori Eulàlia Pou</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-4 py-8">
        <nav class="lg:flex  lg:items-center">
            <div>
                <img src="/images/dental-technology-gb61834956_322.jpg" alt="Imatge Dents" width="160" height="14">
            </div>

            <div class="flex items-center">
                @auth
                    <span class="text-xs font-bold uppercase">Benvingut/da, {{ auth()->user()->name }}!</span>
                    <form method="POST" action="/sortir" class="text-xs font-semibold text-blue-500 ml-6">
                        @csrf
                        <button type="submit"> Logout</button>
                    </form>

                @else
                    <a href="/registre" class="px-2 text-xs font-bold uppercase hover:bg-red-300 rounded-xl">Registrar</a>
                    <a href="/entrar" class="px-2 text-xs font-bold uppercase hover:bg-red-300 rounded-xl">Entrar</a>
                @endauth


                <a href="#newsletter" class="bg-blue-500 ml-2 rounded-full text-xs font-semibold text-white uppercase py-5 px-3">
                    Subscriu-te
                </a>
                <h1 class="text-2xl m-3 ">
                    Laboratori <span class="text-blue-500 ">Eulàlia Pou</span>
                </h1>
                
            </div>
            <div class=" flex items-center bg-yellow-200 rounded-xl py-6">
                <a href="/dentistes" class="px-5 text-xs font-bold uppercase hover:bg-red-300 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">Dentistes</a>
                <a href="/encarrecs" class="px-5 text-xs font-bold uppercase hover:bg-red-300 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">Encarrecs</a>
                <a href="/albarans" class="px-5 text-xs font-bold uppercase hover:bg-red-300 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">Albarans</a>
                <a href="/factures" class="px-5 text-xs font-bold uppercase hover:bg-red-300 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">Factures</a>
                <a href="/materials" class="px-5 text-xs font-bold uppercase hover:bg-red-300 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">Materials</a>
                <a href="/pacients" class="px-5 text-xs font-bold uppercase hover:bg-red-300 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">Pacients</a>
                <a href="/blog" class="px-5 text-xs font-bold uppercase hover:bg-red-300 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">Posts</a>
            </div>
        </nav>

        {{ $slot }}

        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/radar-dish-ge5b8903b5_320.jpg" alt="imatge satelit" class="mx-auto -mb-120" style="width: 145px;">
            <h5 class="text-3xl  mt-3">Aplicació de gestió del Laboratori Eulàlia Pou</h5>
            <p class="text-sm mt-3">Fet per en Joan Pou</p>

            {{-- <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <div>
                                <input id="email" name="email" type="text" placeholder="Your email address"
                                       class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                                @error('email')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscriu-te
                        </button>
                    </form>
                </div> 
            </div> --}}
        </footer>
    </section>

    <x-flash />

</body>
