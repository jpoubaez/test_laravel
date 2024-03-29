<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{  date('d-m-Y', strtotime($factura->data_generacio))  }}</title>
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
                <b>Data: </b>{{ date('d-m-Y', strtotime($factura->data_generacio))  }}<br />
               {{--  @if ($invoice->due_date)
                    <b>Due date: </b>{{ $invoice->due_date->formatLocalized('%A %d %B %Y') }}<br />
                @endif --}}
                @if ($factura->id)
                    <b>Número factura: </b> {{ $factura->id }}
                @endif
                <br />
            </div>
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
                        @php
                          $dentista=$albarans[0]->encarrec->dentista;
                        @endphp
                        <div class="panel-body">
                            {{ $dentista->nom }} {{ $dentista->cognoms }}<br />
                            Num Col·legiat: {{ $dentista->numcolegiat }}<br />
                            Clínica: {{ $dentista->clinica }}<br />
                            NIF: {{ $dentista->NIF }}<br />
                            {{ $dentista->adresa }}<br />
                            {{ $dentista->codipostal }} {{ $dentista->ciutat }}<br />
                        </div>
                    </div>
                </div>
            </div>
            {{-- <span class="descripcio">{{ date('d-m-Y', strtotime($factura->data_generacio)) }} </span><br /> --}}
            <span class="descripcio">Factura (mes-any): {{ date('m',strtotime($factura->data_generacio)).'-'.date('y',strtotime($factura->data_generacio)) }} </span><br />
            <h4>Albarans:</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Num Albarà</th>
                        <th>Encàrrec</th>
                        <th>Preu</th>
                        <th>Data entrega</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($albarans as $albara)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $albara->id }}</td>
                            <td>{{ $albara->encarrec->descripcio }}</td>
                            <td>{{ $albara->total }} €</td>
                            <td>{{ date('d-m-Y', strtotime($albara->data_entrega)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="clear:both; position:relative;">
                
                    <div style="position:absolute; left:0pt; width:250pt;">
                        <h4>Notes:</h4>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                {{-- Pacient: {{ $encarrec->pacient->nom }} {{ $encarrec->pacient->cognoms }} --}}
                            </div>
                        </div>
                    </div>
                
                <div style="margin-left: 300pt;">
                    <h4>Total:</h4>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><b>Subtotal</b></td>
                                <td>{{ $factura->total_a_cobrar }} €</td>
                            </tr>
                            
                                <tr>
                                    <td>
                                        <b>
                                            IVA (21%)
                                        </b>
                                    </td>
                                    @php 
                                        $iva = ($factura->total_a_cobrar*0.21);
                                    @endphp
                                    <td>{{ number_format($iva,2) }} €</td>
                                </tr>
                           
                            <tr>
                                <td><b>TOTAL</b></td>
                                @php 
                                    $totalambiva = $factura->total_a_cobrar+$iva;
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
