@extends('layouts.homeClinica')
@section('content1')
<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-10" >
                <div class="card">
                    <div class="card rounded-pill" style="box-sizing: border-box;">
                        <div class="list-group-item list-group-item-action active"
                            style="font-weight: bold; color: write; text-align: center" >Exportar Resumo de Facturação</div>
                    </div>
                    <form  method="get" action="{{ url('resumoMensal') }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <label for="exampleFormControlSelect1">Prestador</label>
                                    <select class="form-select" name="plano" id="exampleFormControlSelect1">
                                        <option value="" disabled selected>Nada Selecionado...</option>
                                        @foreach ($prestador as $clinicas )
                                        <option value="{{$clinicas->id}}">{{$clinicas->nome}}</option>
                                        @endforeach
                                       
                                    </select>
                                </div>
                              
                                    <div class="col-3">
                                       <label for="data1">Data Inicial:</label>
                                       <input type="date"   value="<?= base64_encode(date('Y') . '-' . date('m') . '-' . date('d')) ?>" name="dataInicio" class="form-control">
                                      </div>
                                     <div class="col-3">
                                         <label for="data2">Data Final:</label>
                                         <input type="date"   value="<?= base64_encode(date('Y') . '-' . date('m') . '-' . date('d')) ?>"  name="dataFinal" class="form-control">
                                      </div>
                            </div>
                        </div>
                        <div class="card-footer" style="margin-top: 100px">
                            <button type="submit" class="btn btn-primary">Submeter</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </section>
</main>
@stop
