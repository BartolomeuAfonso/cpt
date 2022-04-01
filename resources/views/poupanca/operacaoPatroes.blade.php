@extends('layouts.inicioPrestador')
@section('content1')
<main id="main" class="main">
<section class="section dashboard">
    <div class="row" >
        <div class="col-lg-8" style="align-items: center">
            <div class="card">
                <div class="card-body">
                    <div class="card rounded-pill" style="box-sizing: border-box;">
                        <div class="list-group-item list-group-item-action active"
                            style="font-weight: bold; color: write; text-align: center">Poupanças</div>
                    </div>
                    <div class="card-body">
                        <form method="post" id="formQuota" action="{{url('salvarpoupanca')}}" target="_blank">
                            @csrf
                             <div class="row" > 
                                <div class="col-3" >   
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio1" id="radio1" checked="" onclick="mudaestado(2)">
                                        <label class="form-check-label">Numerário</label>
                                    </div>
                                </div>
                                    <div class="col-3" >  
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio1" id="radio2" onclick="mudaestado(1)">
                                        <label class="form-check-label">Transferência</label>
                                    </div>  
                                </div>
                             </div>
                             <br>
                             <div class="row" >  
                                <div class="col-3">  
                                    <label for="exampleInputEmail1">Nº Bilhete de Identidade</label>
                                    <input type="text" class="form-control" name="id_contrato" id="id_contrato" required>
                                 
                                </div>
                                <div class="col-2"  style="display: none">     
                                    <label for="exampleInputEmail1">Pesquisar</label>
                                    <button type="submit" id="btnPesquisar" class="btn btn-primary">Consultar</button>
                                </div>
                                <div class="col-5">  
                                    <label for="exampleInputEmail1">Nome</label>
                                    <input type="text" class="form-control" name="nome" id="nome" disabled>
                                </div>
                            </div>
                            
                            <div class="row" > 

                                <div class="col-3">
                                    <label for="diaspago">Dias pagos</label>
                                    <input type="number" class="form-control" id="diaspago" name="diaspago" disabled="">
                                </div>
                                <div class="col-4">
                                    <label for="diasapagar">Dias a pagar</label>
                                    <input type="number" class="form-control" id="diasapagar"  name="diasapagar" disabled="">
                                </div>
                            </div>

                            <div class="row">  
                                <div class="col-3">
                                    <label for="numDias">Número de Dias</label>
                                    <input type="number" class="form-control" id="numDias" name="numDias"  required="" disabled>
                                </div>
                                <div class="col-4">
                                    <label for="valorvalido">Valor válidado</label>
                                    <input type="text" class="form-control" id="valorvalido" name="valorvalido" disabled="">
                                   
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-3">
                                        <label for="data">Data</label>
                                        <input type="Date" class="form-control" id="data" required="" name="data" value="<?=  date('Y').'-'.date('m').'-'.date('d');?>" disabled="">
                                </div> 
                                
                                <div class="col-4">
                                    <label for="valorrecebido">Valor introduzido</label>
                                    <input type="number" class="form-control"  id="valorrecebido" value="0" required="" name="valorrecebido" disabled="">
                                </div>
                                <div class="col-2" id="observacao" style="display:none">
                                    <label for="tipo">Número de Bordeuro</label>
                                    <input type="number" class="form-control" id="tipo" name="tipo">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    
                                </div>
                                <div class="col-3">
                                    <label id="info-alert-1" style="color:red;font-size:14px; display:none">Valor inválido: o valor apresentado ultrapassou a quantidade de valor a ser pago</label>
                                    <label id="info-alert-2" style="color:red;font-size:14px;display:none">Valor inválido: valor introduzido não é permitido.</label>
                                </div>
                            </div>          
                                
                            </div>        
                            <input type="submit" value="Salvar" class="btn btn-primary" id="btnSalvar" disabled=""> 
                            <a  class="btn btn-dark" id="btnPrint" style="width:100px;display:none;" onclick="hiperlink()" target="_blank">Imprimir</a>
                         </form>    
                                            
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
@stop
<script src="{{ url('js/jquery12.js') }}"></script>
<script>    
     var id_pessoa=0; var id_contrato=0; 
    var nome=''; var diaspago=0; 
    var diasapagar=0; var numDias=0;
    var tipo='Nenhum';
    var valorrecebido=0; var tipo=''; 

    $(document).ready(function() {
        $("#id_contrato").keyup(function() {
            var id_contrato = document.getElementById("id_contrato").value;
            console.log(id_contrato);
            $.ajax({
                url: 'pesquisa/' + id_contrato,
                type: 'GET',
                dataType: 'json',
                success: function(data) {

                    var resultado = data.split('*del*', 2);
                    diaspago =  resultado[1]/1000;
                    diasapagar = 26 - resultado[1]/1000;
                    document.getElementById('nome').value= resultado[0];
                    document.getElementById('diaspago').value= resultado[1]/1000;
                    document.getElementById('diasapagar').value= 26 - resultado[1]/1000;
                    document.getElementById('valorrecebido').disabled=false;   
                        
                }
            });

        });

            $("#valorrecebido").keyup(function(){
            var valor_recebido=$("#valorrecebido").val();
           if(valor_recebido % 1000 != 0){
                
                document.getElementById('valorrecebido').style.borderColor='red';
                document.getElementById('valorrecebido').style.backgroundColor='red';
                document.getElementById('valorrecebido').style.color='white';
                document.getElementById('valorvalido').value='0,00';
                document.getElementById('info-alert-1').style.display='none';
                document.getElementById('info-alert-2').style.display='block';
            }
            else if((valor_recebido / 1000) > diasapagar){
                document.getElementById('valorrecebido').style.borderColor='red';
                document.getElementById('valorrecebido').style.backgroundColor='red';
                document.getElementById('valorrecebido').style.color='white';
                document.getElementById('valorvalido').value='0,00';
                document.getElementById('info-alert-1').style.display='block';
                document.getElementById('info-alert-2').style.display='none';
               

            }
            else{
                numDias=parseInt(valor_recebido)/parseInt(1000);
                document.getElementById('numDias').value=numDias;
                document.getElementById('valorrecebido').style.borderColor='green';
                document.getElementById('valorrecebido').style.backgroundColor='';
                document.getElementById('valorrecebido').style.color='';
                valorvalido=numDias*1000;
                var valorformatado=valorvalido.toLocaleString('pt-BR',{
                    minimumFractionDigits:2});
                document.getElementById('valorvalido').value=valorformatado;
                document.getElementById('info-alert-1').style.display='none';
                document.getElementById('info-alert-2').style.display='none';
                
                //habilitando o botão
                document.getElementById('btnSalvar').disabled=false;
            }
        });
    });

    function mudaestado(estado){
       if(estado==1){
        document.getElementById("observacao").style.display = 'block'; 
       }else{
        document.getElementById("observacao").style.display = 'none'; 
       }
   }
    
    
</script>