<header class="max-w-xl mx-auto text-center">
        
        <h1 class="text-4xl">
                <span class="text-blue-500">Menú Dentistes</span>
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
                    <form method="GET" action="/dentistes" class="rounded-xl px-4 py-2 bg-gray-100 ">
                       {{--  @if(request('clinica'))
                            <input type="hidden" name="clinica" value="{{ request('categoria') }}">
                        @endif --}}
                        <input type="text" name="cerca" placeholder="(nom,clinica,colegiat)"
                               class="bg-transparent placeholder-black font-semibold text-sm"
                               value="{{ request('cerca') }}">
                    </form>
                    <ul  style = "overflow: hidden; margin-left: 20px;" class="rounded-xl px-4 py-2 bg-blue-100 ">
                        <li style="float: left;"><a href="/dentistes/afegir" class=" text-xs font-bold uppercase">Afegir</a></li>
                        <li style="float: left;"><a href="/dentistes/editar" class="ml-6 text-xs font-bold uppercase"">Editar</a></li>
                        <li style="float: left;"><a href="/dentistes/esborrar" class="ml-6 text-xs font-bold uppercase">Esborrar</a></li>
                    </ul>

                </div>
            </div>
            <div class="md:flex md:justify-between md:items-center mt-5">
                
            </div>
    </header>
