<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="{{ asset('css/facturaStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('material/common/bootstrap-4.4.0/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body style="font-family: sans-serif">
    <div class="row pb-1">
        <div class="col-7 mr-auto">
            <img src="{{ asset('img/pnaf.png') }}" class="img-thumbnail border-0" width="150" />
            <table class="table table-sm table-borderless m-0">
                <tr class="m-0 p-0">
                    <th class=" m-0 p-0 pb-1">{{ $dadosFactura[0]->nome }}</th>
                </tr>
                <tr class="m-0 p-0">
                    <td class="small m-0 p-0">{{ $dadosFactura[0]->web }} |
                        {{ $dadosFactura[0]->email }}
                    </td>
                </tr>
                <tr class="m-0 p-0">
                    <th class="small m-0 p-0">Tel.:{{ $dadosFactura[0]->contacto }}</th>
                </tr>
            </table>
        </div>
        <div class="col-5 ml-auto text-right">
            <h6 class="font-weight-bolder">Factura </h6>
            <p>{{ $versao }}</p>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-5 ml-auto small">
            Exmo.(a) Sr.(a)
            <div>{{ $cliente->nome }}</div>
            <div>Endereço:{{ $cliente->endereco }}</div>
            <div>
                NIF: {{ $cliente->nBi }}</div>
        </div>
    </div>
    <div class="row pl-1 pr-1" style="font-size: xx-small; margin-top: 55px">
        <div class="col-7 mr-auto">
            <p style="font-size:16px"><b></b></B>Assistido pela Clínica</b></p> 
            <table class="table table-sm">
                <thead>
                 
                    <tr class="m-0 p-0 small">
                        <th>Clínica</th>
                        <th >NIf</th>
                        <th >Endereço</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <td>Centro de Daignóstico Octávio</td>
                    <td>5000051454</td>
                    <td>Rua direita do Camama</td>
                   
                </tbody>
            </table>
        </div>
    </div>
   
    <div class="row mb-4" style="font-size: x-small; margin-top:10px">
        <div class="col-12">
            <table class="table table-sm small">
                <thead>
                    <tr class="m-0 p-0">
                        <th class="text-left m-0 p-0">Descricao</th>
                        <th class="text-center m-0 p-0">Qtd.</th>
                        <th class="text-center m-0 p-0">Un.</th>
                        <th class="m-0 p-0 text-center">Pr. Unitário</th>
                        <th class="m-0 p-0 text-center">Taxa %</th>
                        <th class="m-0 p-0 text-center">Código</th>
                        <th class="m-0 p-0 text-center">Total</th>
                    </tr>
                </thead>
                <tbody>
                <tbody>
                    @foreach ($factura as $fatura_itens)
                        <tr>
                            <td>{{ $fatura_itens->designacao }}</td>
                            <td class="m-0 p-0 text-center"> {{ $fatura_itens->quantidade}}</td>
                            <td class="m-0 p-0 text-center">un</td>
                            <td class="m-0 p-0 text-center">
                                {{ number_format($fatura_itens->preco, 2, '.', ' ') }}</td>
                            <td class="m-0 p-0 text-center">0.0</td>
                            <td class="m-0 p-0 text-center">Codigo</td>
                            <td class="m-0 p-0 text-center">
                                {{ number_format($fatura_itens->preco, 2, '.', ' ') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                </tbody>
            </table>
        </div>
    </div>
   
    <div class="col-4 ml-auto">
        <table class="table table-sm">
            <tr class="smal m-0 p-0" style="font-size: 10px;">
                <td>Total ilíquido</td>
                <td>
                    {{ number_format($factura[0]->grossTotal, 2, '.', ' ') }} ( AOA )
                </td>
            </tr>
            <tr class="smal m-0 p-0" style="font-size: 10px">
                <td>Total Imposto</td>

                <td>

                    {{ number_format($factura[0]->descontoIva, 2, '.', ' ') }} ( AOA )
                </td>
            </tr>
            <tr class="m-0 p-0" style="font-size: 10px">
                <th>TOTAL A PAGAR</th>
                <td>
                    {{ number_format($factura[0]->grossTotal, 2, '.', ' ') }} ( AOA )
                </td>
            </tr>
        </table>
    </div>

    <nav class="col-7 mr-auto">
        <p class="col-7 mr-auto" aria-setsize="10px" align-text="center"> (O) Assinatura</h5>
        <p align-text="center">________________________________</h5>
    </nav>


    <footer class="fixed-bottom p-2 small" style="height: 85px">
        <p class="" style="font-size: x-small">CPT, investir no presente para garantir a estabilidade do taxista de Angola</p>
        <div>
            <span class="text-size-8 ml-4"></span>
        </div>
        <hr class="border border-success">
        <div style="font-size: xx-small">
            <div>{{ $dadosFactura[0]->endereco }}</div>
            <div>{{ $dadosFactura[0]->cidade }} - {{ $dadosFactura[0]->pais }}</div>
            <div>Contribuinte Nº.: <span class="font-weight-bolder">{{ $dadosFactura[0]->nif }}</span>
            </div>
        </div>
        <div class="text-right" style="font-size: xx-small">Pág 1 de 1</div>
    </footer>
</body>

</html>
