<header class="max-w-xl mx-auto text-center">
        
        <h1 class="text-4xl">
                <span class="text-blue-500">Menú Factures</span>
        </h1>
            
            <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
                <!--  Category -->
                {{-- <div class="relative lg:inline-flex bg-gray-100 rounded-xl">
                     De moment això fora , aqui no ho podem fer servir
                    <x-categoria-dropdown>

                    </x-categoria-dropdown>
                </div> --}}

                <!-- Search -->
                <div class="relative flex lg:inline-flex items-center ">
                    <span class="mr-5 text-xs font-bold uppercase">Cerca: </span>
                    <form method="GET" action="/factures" class="rounded-xl px-4 py-2 bg-gray-100 ">
                        <input type="text" name="cerca" placeholder="cerca factura"
                               class="bg-transparent placeholder-black font-semibold text-sm"
                               value="{{ request('cerca') }}">
                    </form>
                </div>
            </div>
    </header>
