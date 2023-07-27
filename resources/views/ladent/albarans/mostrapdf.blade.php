
<x-layout2>
     
        <div>          
            Descripció: {{ $encarrec->descripcio }}
        </div>

        <div>
            @foreach ($feines as $feina)
               <div> 
                    {{ $feina->material->codimaterial }}  {{ $feina->material->nom }} {{ $feina->material->preu_unitari }} {{ $feina->quantitat_material }} {{ $feina->sub_total }}
               </div> 
            @endforeach
            
        </div>

        <div>          
            Total: {{ $albara->total }}
        </div> 

         <div>          
            Data: {{ $albara->data_entrega }}
        </div>                
     
</x-layout2>