<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ $encarrec->descripcio }}</title>
        <style>
            * {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            h1,h2,h3,h4,h5,h6,p,span,div { 
                font-family: DejaVu Sans; 
                font-size:10px;
                font-weight: normal;
            }

            th,td { 
                font-family: DejaVu Sans; 
                font-size:10px;
            }

            .descripcio {
               font-family: DejaVu Sans; 
                font-size:15px;
                font-weight: bold;
            }

            .panel {
                margin-bottom: 20px;
                background-color: #fff;
                border: 1px solid transparent;
                border-radius: 4px;
                -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
                box-shadow: 0 1px 1px rgba(0,0,0,.05);
            }

            .panel-default {
                border-color: #ddd;
            }

            .panel-body {
                padding: 15px;
            }

            table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 0px;
                border-spacing: 0;
                border-collapse: collapse;
                background-color: transparent;

            }

            thead  {
                text-align: left;
                display: table-header-group;
                vertical-align: middle;
            }

            th, td  {
                border: 1px solid #ddd;
                padding: 6px;
            }

            .well {
                min-height: 20px;
                padding: 19px;
                margin-bottom: 20px;
                background-color: #f5f5f5;
                border: 1px solid #e3e3e3;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
                box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
            }
        </style>
        
            <style>
                @page { margin-top: 140px;}
                header {
                    top: -100px;
                    position: fixed;
                }
            </style>
        
    </head>
    <body>
        <header>
            <div style="position:absolute; left:0pt; width:250pt;">
                <img class="img-rounded" width="160" height="105" src="images/dental-technology-gb61834956_322.jpg">
            </div>
            <div style="margin-left:300pt;">
                <b>Data: </b>{{ date('d-m-Y', strtotime($albara->data_entrega))  }}<br />
               {{--  @if ($invoice->due_date)
                    <b>Due date: </b>{{ $invoice->due_date->formatLocalized('%A %d %B %Y') }}<br />
                @endif --}}
                @if ($albara->id)
                    <b>Número albarà: </b> {{ $albara->id }}
                @endif
            </div>
            <br />
        </header>
        <main>
            <div style="clear:both; position:relative;">
                <div style="position:absolute; left:0pt; width:250pt;">
                    <h4>Dades identificatives:</h4>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            Laboratori Eulàlia Pou<br />
                            NIF 55554477<br />
                            Telef 972 20 45 71<br />
                            C/ Nou, 8, 13, 3a<br />
                            17001 Girona
                            Catalunya<br />
                        </div>
                    </div>
                </div>
                <div style="margin-left: 300pt;">
                    <h4>Client:</h4>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {{ $encarrec->dentista->nom }} {{ $encarrec->dentista->cognoms }}<br />
                            Num Col·legiat: {{ $encarrec->dentista->numcolegiat }}<br />
                            Clínica: {{ $encarrec->dentista->clinica }}<br />
                            NIF: {{ $encarrec->dentista->NIF }}<br />
                            {{ $encarrec->dentista->adresa }}<br />
                            {{ $encarrec->dentista->codipostal }} {{ $encarrec->dentista->ciutat }}<br />
                        </div>
                    </div>
                </div>
            </div>
            <span class="descripcio">{{ $encarrec->descripcio }} </span>
            <br />
            <h4>Articles/Tasques:</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Nom article/Tasca</th>
                        <th>Preu</th>
                        <th>Quantitat</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feines as $feina)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $feina->material->codimaterial }}</td>
                            <td>{{ $feina->material->nom }}</td>
                            <td>{{ $feina->material->preu_unitari }} € </td>
                            <td>{{ $feina->quantitat_material }}</td>
                            <td>{{ $feina->sub_total }} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="clear:both; position:relative;">
                
                    <div style="position:absolute; left:0pt; width:250pt;">
                        <h4>Notes:</h4>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                Pacient: {{ $encarrec->pacient->nom }} {{ $encarrec->pacient->cognoms }}
                            </div>
                        </div>
                    </div>
                
                <div style="margin-left: 300pt;">
                    <h4>Total:</h4>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><b>Subtotal</b></td>
                                <td>{{ $albara->total }} €</td>
                            </tr>
                            
                                <tr>
                                    <td>
                                        <b>
                                            IVA (21%)
                                        </b>
                                    </td>
                                    @php 
                                        $iva = ($albara->total*0.21);
                                    @endphp
                                    <td>{{ number_format($iva,2) }} €</td>
                                </tr>
                           
                            <tr>
                                <td><b>TOTAL</b></td>
                                @php 
                                    $totalambiva = $albara->total+$iva;
                                @endphp
                                <td><b>{{ number_format($totalambiva,2) }} €</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- @if ($invoice->footnote)
                <br /><br />
                <div class="well">
                    {{ $invoice->footnote }}
                </div>
            @endif --}}
        </main>

        <!-- Page count -->
        <script type="text/php">
            if (isset($pdf) && $GLOBALS['with_pagination'] && $PAGE_COUNT > 1) {
                $pageText = "{PAGE_NUM} of {PAGE_COUNT}";
                $pdf->page_text(($pdf->get_width()/2) - (strlen($pageText) / 2), $pdf->get_height()-20, $pageText, $fontMetrics->get_font("DejaVu Sans, Arial, Helvetica, sans-serif", "normal"), 7, array(0,0,0));
            }
        </script>
    </body>
</html>
