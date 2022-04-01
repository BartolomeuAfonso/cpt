<?php

function nome_semana($data)
{
  switch (date('w', strtotime($data))) {
    case 0:
      return 'Dom';
      break;
    case 1:
      return 'Seg';
      break;
    case 2:
      return 'Ter';
      break;
    case 3:
      return 'Quar';
      break;
    case 4:
      return 'Quin';
      break;
    case 5:
      return 'Sex';
      break;
    case 6:
      return 'Sab';
      break;
  }
}

function nome_mes($mes)
{
  switch ($mes) {
    case 1:
      $month = 'Janeiro';
      break;
    case 2:
      $month = 'Fevereiro';
      break;
    case 3:
      $month = 'Março';
      break;
    case 4:
      $month = 'Abril';
      break;
    case 5:
      $month = 'Maio';
      break;
    case 6:
      $month = 'Junho';
      break;
    case 7:
      $month = 'Julho';
      break;
    case 8:
      $month = 'Agosto';
      break;
    case 9:
      $month = 'Setembro';
      break;
    case 10:
      $month = 'Outubro';
      break;
    case 11:
      $month = 'Novembro';
      break;
    case 12:
      $month = 'Dezembro';
      break;
  }
  return $month;
}
function showDay($data)
{
  $dia = $data[8] . '' . $data[9];
  return $dia;
}
function showMes($data)
{
  $mes = $data[5] . '' . $data[6];
  return $mes;
}
function showAno($data)
{
  $ano = $data[0] . '' . $data[1] . '' . $data[2] . '' . $data[3];
  return $ano;
}
function organizarData($data)
{
  return showDay($data) . ' de ' . nome_mes(intval(showMes($data))) . ' de ' . showAno($data);
}
?>

<!doctype html>
<html lang="pt-pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ANATA</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<style>
  * {
    font-family: 'Times New Romam', sans-serif;
    text-align: justify;
  }

  header {
    width: 100%;
  }

  .left {
    position: relative;
    width: 80%;
    left: 0;
  }

  .right {
    position: absolute;
    width: 20%;
    left: 80%;
    top: 0%;
  }

  .content {
    width: 100%;
    position: absolute;
    left: 0;
  }

  .txt {
    text-align: justify;
    margin-top: 0;
    font-size: .8em;
  }

  .txt1 {
    font-size: .8em;
    margin: 0;
    margin-top: 0;
  }

  .txt2 {
    font-size: .7em;
    margin: 0;
    word-spacing: 0;
    margin-top: 0;
  }

  .txt1-h {
    font-size: 1em;
    margin: 0;
    word-spacing: 0;
  }

  b {
    border-bottom: 0px solid black;
  }

</style>

<body>
  <header class="row">
    <div class="imagem">
        <nav class="left">
        <img src="{{ asset('img/pnaf.png') }}" class="img-thumbnail border-0" width="50" />
      </nav>
    </div>
  <header>
    <nav class="left" style="margin-top: 50px">
      <p class="txt1">CPT-Caixa de poupança dos Taxistas</p>
      <p class="txt1">NIF:5000475319</p>
      <h4 class="txt1-h">Comprovativo de pagamento</h4>
    </nav>
  </header>
    <main class="content" style="margin-top:150px">
      <p class="txt"><b>Conta Débito</b></p>
      <p class="txt"><b>Data da operação:</b>{{organizarData($quotas->dataInserida)}}
      <p class="txt"><b>Nº de Adesão:</b> {{$quotas->nBi}}</p>
      <p class="txt"><b>Nome:</b> {{$quotas->nome}}</p>
      <p class="txt"><b>Montante:</b> {{$quotas->valorvalido}} Akz</p>
      <p class="txt"><b>Entidade:</b> Caixa de Poupança dos Táxista</p>
      <hr>
      <p class="txt txt1-h"><b>Estado da conta débito</p>
      <p class="txt txt1"><b>Dias pagos: {{$poupanca/1000}}
        <br><b>Dias por pagar: {{(26 - $poupanca/1000)}}
      </p>
    </main>
    <div  style="background-color: white;  flex-shrink: 0; margin-top:-46%; margin-left: 80%">
      <p class="txt"><b>{{$versao}}</b></p>
    </div>
</body>
</html>