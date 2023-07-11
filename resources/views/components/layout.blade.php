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
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/dental-technology-gb61834956_322.jpg" alt="Imatge Dents" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                    <span class="text-xs font-bold uppercase">Benvingut/da, {{ auth()->user()->name }}!</span>
                    <form method="POST" action="/sortir" class="text-xs font-semibold text-blue-500 ml-6">
                        @csrf
                        <button type="submit"> Logout</button>
                    </form>

                @else
                    <a href="/registre" class="text-xs font-bold uppercase">Registrar</a>
                    <a href="/entrar" class="ml-6 text-xs font-bold uppercase">Entrar</a>
                @endauth


                <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscriu-te per estar al dia
                </a>
                <h1 class="text-4xl m-6 ">
                    Laboratori <span class="text-blue-500 ">Eulàlia Pou</span>
                </h1>
                <ul >
                    <li style="float: left;"><a href="/dentistes" class="text-xs font-bold uppercase hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">Dentistes</a></li>
                    <li style="float: left;"><a href="/encarrecs" class="ml-6 text-xs font-bold uppercase hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">Encarrecs</a></li>
                    <li style="float: left;"><a href="/factures" class="ml-6 text-xs font-bold uppercase hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">Factures</a></li>
                    <li style="float: left;"><a href="/materials" class="ml-6 text-xs font-bold uppercase hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">Materials</a></li>
                    <li style="float: left;"><a href="/pacients" class="ml-6 text-xs font-bold uppercase hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5">Pacients</a></li>
                    <li style="float: left;"><a href="/blog" class="ml-6 text-xs font-bold uppercase hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5">Posts</a></li>
                </ul>
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
