
<section class="px-6 py-8">
   kk     

        <main class="max-w-6xl mx-auto mt-4 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">


                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    hola
                    <img src="/var/www/html/test_laravel/storage/app/public/{{ $fotodentista }}" alt="" class="rounded-xl">

                    
                    
                </div>
    

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        
                        <div class="space-x-2">
                            <x-clinica-button :clinica="$clinica" />
                        </div>
                    </div>
                    <div class="relative flex lg:inline-flex items-center ">
                        
                    </div>
                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $nom }} {!! $cognoms !!}
                    </h1>

                    <section class="col-span-8 col-start-5 mt-10 space-y-6">
                        @foreach($encarrecs as $encarrec)
                            <x-encarrec :encarrec="$encarrec" />
                        @endforeach

                    </section>
                </div>
            </article>
        </main>
    </section>


<h1 class="font-bold text-3xl lg:text-4xl mb-10">
    {{ $nom }} {!! $cognoms !!}
</h1>
<div class="col-span-4 lg:text-center lg:pt-14 mb-10">
    despr
    <img src="/var/www/html/test_laravel/storage/app/public/{{ $fotodentista }}" alt="" class="rounded-xl">
                    
</div>



<section class="col-span-8 col-start-5 mt-10 space-y-6">
    @foreach($encarrecs as $encarrec)
        <x-encarrec :encarrec="$encarrec" />
    @endforeach

</section>
   