<?php

function nome_semana($data)
{
  switch (date('w', strtotime($data))) {
    case 0:
      return 'DOM';
      break;
    case 1:
      return 'SEG';
      break;
    case 2:
      return 'TERÇA';
      break;
    case 3:
      return 'QUARTA';
      break;
    case 4:
      return 'QUINTA';
      break;
    case 5:
      return 'SEXTA';
      break;
    case 6:
      return 'SAB';
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
    margin-bottom: 50px;
  }

  .imagem {
    width: 100%;
  }

  .left {
    width: 50%;
    float: left;
  }

  .right {
    width: 50%;
    float: right;
  }

  main {
    width: 100%;
  }

  .t1 {
    width: 100%;
    margin:0; word-spacing: 0;
   
  }

  .t4 {
    width: 100%;
    border-bottom: 1px solid black;
    margin-bottom: 0%;
    margin-top: 0%;
  }

  b {
    border-bottom: 0;
  }

  .content {
    width: 100%;
    border-bottom: 1px solid black;
  }

  table tr td {
    margin-top: 0;
    margin-bottom: 0;
  }
</style>

<body>
  <header class="row">
    <div class="imagem">
        <nav class="right">
        <img src="{{ asset('img/pnaf.png') }}" class="img-thumbnail border-0" width="150" />
      </nav>
    </div>
  </header>
    <main style="margin-top: 50px">
      <div class="titulo" style="margin-top:100px;">
       
          <p style="text-align:center;" > <b>Ficha de Adesão ao Cofre de    </b></p>
    
       
          <p  style="text-align:center">  <b>Poupança dos Taxistas </b></p>
       
          <p style="text-align:center">  <b>(CPT) </b> </p>
       
      </div>
      <nav>
        <h4 align-text="justify">1. Dados pessoais</h4>
        <hr style="background:red">
        <p class="t1" align-text="justify"><b>Nome:</b>{{ $cliente->nome }}</p>
        <p class="t1" align-text="justify"><b>Filiação: </b>{{ $cliente->pai }}<br>
          <b>E de: </b> {{ $cliente->mae }}
        </p>
        <p class="t1" align-text="justify"><b>Data de Nascimento:</b> {{ showDay($cliente->dataNasc) }}
          de {{nome_mes(showMes($cliente->dataNasc)) }}
          de <span class="texto">{{showAno($cliente->dataNasc) }}
        </p>
        <p class="t1" align-text="justify"><b>Naturalidade:</b> {{ $cliente->naturalidade }}</p>
        <p class="t1" align-text="justify">
          @if( $cliente->genero == 1)
                <b>Sexo:</b> Masculino
          @elseif( $cliente->genero == 2)
          <b>Sexo:</b> Femenino
          @endif
        </p>
        <p class="t1" align-text="justify">
          @if( $cliente->estadocivil == 1)
             <b>Estado civil:</b> Solteiro(a)
          @elseif( $cliente->estadocivil == 2)
            <b>Estado civil:</b> Casado(a)
          @elseif( $cliente->estadocivil == 3)
            <b>Estado civil:</b> Viúvo(a)
          
          @endif
        </p>
        <p class="t1" align-text="justify"><b>Nacionalidade:</b> Angolana</p>

        <p class="t1" align-text="justify"><b>B.I nº:</b> {{ $cliente->nBi }}</p>

        <p class="t1" align-text="justify"><b>Residência:</b><span class="texto">&nbsp;
          {{ $cliente->endereco }}
        </p>
      </nav>

      <br>
      <nav>
        <h4 align-text="justify"><b>2. Dados dos profissionais</h4>
        <hr style="background:red">
        <p class="t1" align-text="justify"><b>Função:</b> {{ $cliente->funcao }}<br>
          <b>Matricula do carro:</b>  {{ $cliente->matricula }}
        </p>
        <p class="t1" align-text="justify"><b>Associação:</b>  {{ $cliente->associacao }}<br>
          <b>Staff:</b>  {{ $cliente->staff }}<
        </p>
        <p class="t1" align-text="justify"><b>Nº de Dependentes:</b>  {{ $cliente->nDependente }}<br>
        
        </p>
      </nav>
      <p>
        <b>Membros da família a beneficiarem-se dos Serviços Clínicos</b><br>
        OBS: De lembrar que para estes serviços, o projecto só permite o taxista,
        a mulher e seus filhos até 5 pessoas.
      </p>

      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <p class="t2">
        <b>NOTA</b>: Para o taxista obter esta vida digna do seu trabalho deverá levar em conta que,
        poupar é acumular valores no presente para utilizá-los no futuro, o que geralmente envolve
        mudanças de hábitos, pois requer uma redução nos gastos pessoais e familiares e, fundamentalmente,
        os gastos desnecessários. Reduzir despesas pode significar desde simples cuidados para evitar o
        desperdício até o esforço, por vezes árduo, no sentido de conter gastos. Além disso, poupar
        exige a avaliação objectiva das despesas, a fixação de metas e, principalmente, muita persistência,
        a fim de manter-se economizando pelo tempo necessário
        até que sejam alcançados os objectivos que o motivaram a poupar.
      </p>

      <br>
      <ul>
        <p class="t2"><b>Condições contratuais sobre o taxista com o CPT</b></p>
        <li>
          <p><b>Primeira Condição:</b> O taxista deve ser associado a uma <b>Associação de Taxista </b> e deve estar no activo – nem o
            motorista e nem o cobrador podem depender da atribuição diária da viatura pelos colegas,
            vulgos falidas. E se o taxista perder a sua viatura ao longo do primeiro ano de pupança e
            ficar dependente de falidas, não poderá beneficiar-se do projecto até conseguir outra, ou seja,
            os seus benefícios estarão congelados; mas se a perder após o primeiro ano de poupança, poderá
            continuar a beneficiar-se, somente até ao segundo ano contratual, devendo ele, obrigatoriamente,
            conseguir uma outra viatura para manter-se estável no terceiro ano e, daí em diante;
          </p>
        </li>

        <li>
          <p>
            <b>Segunda Condição:</b> O taxista deve ter uma viatura em bom estado, capaz de trabalhar
            regularmente durante os anos em que estiver a poupar. E se uma avaria na referida viatura
            ao longo do processo comprometer alguns dias de pupança, o taxista deverá compensar a
            poupança deste período quando restabelecer as suas actividades profissionais;
          </p>
        </li>

        <li>
          <p>
            <b>Terceira Condição:</b> O taxista deve reunir os documentos legais para abertura da sua
            conta bancária
            apenas no <b>Banco</b> onde o <b>CPT</b> estiver implementado;
          </p>
        </li>

        <li>
          <p>
            <b>Quarta Condição:</b> O taxista só será desvinculado do <b>CPT</b> após a sua morte,
            pela eventualidade da vida que nos é passageira. Mas, caso isto aconteça, seus familiares
            poderão continuar a beneficiar-se dos serviços de saúde e serão,
            igualmente, beneficiados pelo <b>INSS</b>, nos termos da Lei vigente.
          </p>
        </li>
      </ul>

       <p>ACEITO:</b>_______________________________________________________________________</p> 
    </main>

</body>

</html>