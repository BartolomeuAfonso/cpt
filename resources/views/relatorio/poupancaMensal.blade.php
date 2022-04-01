<?php

 $month ='';

function nome_semana($data) {
  
  switch(date('w', strtotime($data)))
   {
        case 0: return 'DOM'; break;
        case 1: return 'SEG'; break;
        case 2: return 'TERÇA'; break;
        case 3: return 'QUARTA'; break;
        case 4: return 'QUINTA'; break;
        case 5: return 'SEXTA'; break;
        case 6: return 'SAB'; break;
    }
  }

function nome_mes($mes) {
    switch($mes)
   {
      case 1: return 'Janeiro'; break;
      case 2: return 'Fevereiro';  break;
      case 3: return 'Março'; break;
      case 4: return 'Abril'; break;
      case 5: return 'Maio'; break;
      case 6: return 'Junho'; break;
      case 7: return 'Julho'; break;
      case 8: return 'Agosto'; break;
      case 9: return 'Setembro'; break;
      case 10: return 'Outubro'; break;
      case 11: return 'Novembro'; break;
      case 12: return 'Dezembro'; break;
    }
  
}
  function showDay($data){
    $dia=$data[8].''.$data[9];
    return $dia;
 }
 function showMes($data){
    $mes=$data[5].''.$data[6]; 
    return $mes;
 }
 function showAno($data){
    $ano=$data[0].''.$data[1].''.$data[2].''.$data[3];
    return $ano;
 }
function organizarData($data){
	return showDay($data).' de '.nome_mes(intval(showMes($data))).' de '.showAno($data);
}
?>

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
            <h6 class="font-weight-bolder">Relatório de Poupanças Mensal </h6>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-5 ml-auto small">
            Exmo.(a) Sr.(a)
            <div>{{$quotas[0]->nome}}</div>
            <div>Endereço:{{$quotas[0]->endereco}}</div>
            <div>
                NIF: {{ $quotas[0]->nBi }}</div>
             <div>
                Referente ao Mês: {{nome_mes(intval(showMes($quotas[0]->data)))}}</div>
            
        </div>
    </div>


    <div class="row mb-4" style="font-size: x-small">
        <div class="col-12">
            <table class="table table-sm small">
                <thead>
                    <tr class="m-0 p-0">
                        <th class="text-left m-0 p-0">Nº</th>
                        <th class="text-center m-0 p-0">Data</th>
                        <th class="text-center m-0 p-0">Valor</th>
                        <th class="m-0 p-0 text-center">Tipo Movimento</th>
                    </tr>
                </thead>
             
                <tbody>
                    @foreach ($quotas as $quota)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="m-0 p-0 text-center"> {{organizarData($quota->data)}}</td>
                            <td class="m-0 p-0 text-center"> {{$quota->valorvalido}}</td>
                             <td class="m-0 p-0 text-center"> {{$quota->tipo}}</td>
                         </tr>

                    @endforeach
                </tbody>
             
            </table>
        </div>
    </div>
     <div class="col-4 ml-auto">
        <table class="table table-sm">
            <tr class="smal m-0 p-0" style="font-size: 10px;">
            
                  <td>Total ilíquido</td>
                <td>
                 
                    {{ number_format($cont, 2, '.', ' ') }} ( AOA )
                </td>
          
           
                
            </tr>
        </table>
    </div>
 
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
