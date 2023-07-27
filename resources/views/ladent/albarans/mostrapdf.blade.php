
<x-layout2>
     
        <div class="w3-container w3-orange w3-margin-top w3-right-align" >          
            Data: {{ date('d-m-Y', strtotime($albara->data_entrega))  }}
        </div>
        <div class="w3-container w3-pink w3-margin-top w3-margin-bottom w3-cell-row" >          
             
            <div style="width:40%" class= "w3-cell  w3-border w3-border-black">          
                        {{ $encarrec->dentista->nom }} {{ $encarrec->dentista->cognoms }}
            </div> 
            <div style="width:50%"  class="w3-cell  w3-border w3-border-black">          
                        Clínica: {{ $encarrec->dentista->clinica }} 
            </div> 
            <div style="width:10%" class=" w3-cell w3-center w3-border w3-border-black">          
                 NIF: {{ $encarrec->dentista->NIF }}
            </div>   
        </div>
        <div class="w3-container w3-amber w3-margin-bottom" >          
            Descripció: {{ $encarrec->descripcio }}
        </div>   
        

        <div>
            <div class="w3-purple w3-border w3-border-yellow w3-cell-row ">
                    <div style="width:10%" class= "w3-cell w3-center w3-border w3-border-black">          
                        Codi
                    </div> 
                    <div style="width:60%"  class="w3-cell w3-center w3-border w3-border-black">          
                        Feina/material
                    </div> 
                    <div style="width:10%" class=" w3-cell w3-center w3-border w3-border-black">          
                         Preu unitari
                    </div> 
                    <div style="width:10%" class="w3-cell w3-center w3-border w3-border-black">          
                        Quantitat
                    </div> 
                    <div style="width:10%" class="w3-cell w3-center w3-border w3-border-black">          
                        Sub-total
                    </div>         
            </div> 
            @foreach ($feines as $feina)
               <div class="w3-border w3-border-red w3-cell-row ">
                    <div style="width:10%" class="w3-red w3-cell w3-center w3-border w3-border-black">          
                        {{ $feina->material->codimaterial }}
                    </div> 
                    <div style="width:60%" class="w3-red w3-cell w3-border w3-border-black">          
                        {{ $feina->material->nom }}
                    </div> 
                    <div style="width:10%" class="w3-red w3-cell w3-center w3-border w3-border-black">          
                         {{ $feina->material->preu_unitari }}
                    </div> 
                    <div style="width:10%" class="w3-red w3-cell w3-center w3-border w3-border-black">          
                        {{ $feina->quantitat_material }}
                    </div> 
                    <div style="width:10%" class="w3-red w3-cell w3-center w3-border w3-border-black">          
                        {{ $feina->sub_total }}
                    </div> 
                        
               </div> 
            @endforeach
            
        </div>

        <div class="w3-container w3-blue w3-right w3-margin-bottom" >          
            Total: {{ $albara->total }}
        </div> 

                     
     
</x-layout2>