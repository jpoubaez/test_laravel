<x-layout2>
     @foreach ($dentistes as $dentista)
          <div>          
          {{ $dentista->cognoms }}  {{ $dentista->nom }}
          @foreach ($dentista->encarrecs as $encarrec)
               <div> 
                    {{ $encarrec->descripcio }} 
               </div> 
          @endforeach
          </div>          
     @endforeach
</x-layout2>