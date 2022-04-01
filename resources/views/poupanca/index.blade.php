@extends('layouts.inicio')
@section('content1')
<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">      
                    <div class="card rounded-pill" style="box-sizing: border-box;">
                        <div class="list-group-item list-group-item-action active"
                            style="font-weight: bold; color: write; text-align: center">Relatório de pagamento de quotas</div>
                    </div>
                    <div class="card-body">
                        @if ($errors->all())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                        @endif
                        @if (session('error'))
                            <div style="height:40px;background:#eb1919"
                                class="alert icon-custom-alert  alert-outline-warning b-round fade show" role="alert">
                                <div style="color:#000" class="alert-text">
                                    {{ session('error') }}
                                </div>

                            </div>
                        @endif
                        <form method="get" action="{{url('printPoupanca')}}" target="_blank">
                            @csrf
                            <div class="form-row" style="margin-top:20px">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radio1" id="radio1" checked=""
                                        onclick="mudaestado(1)" value="1">
                                    <label class="form-check-label">Diário</label>
                                </div>
                                <div class="form-check" style="margin-left: 500px; margin-top: -50px">
                                    <input class="form-check-input" type="radio" name="radio1" id="radio2"
                                        onclick="mudaestado(2)" value="2">
                                    <label class="form-check-label"
                                        style="margin-top: 1.3em; padding-left: 10px">Mensal</label>
                                </div>

                                <div class="form-check" style="margin-left: 1000px; margin-top: -30px;">
                                    <input class="form-check-input" type="radio" name="radio1" id="radio3"
                                        onclick="mudaestado(3)" value="3">
                                    <label class="form-check-label"
                                        style="margin-top: 0.30em; padding-left: 10px">Anual</label>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top:20px">
                                <div class="col-md-6 mb-3">
                                    <label for="exampleInputEmail1">Nome</label>
                                    <select class="form-select" id="codigoCliente" name="codigoCliente" aria-label="Floating label select example">
                                        <option>Nenhum seleccionado</option>
                                        @foreach ($pessoa as $pessoas)
                                            <option value="{{ $pessoas->nBi }}"> {{ $pessoas->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-left: 5px;margin-right: 10px;">
                                <div class="col-5">
                                    <label for="data_ingresso" class="label mr-1">Data Inicio<span style="color:red">
                                            *</span></label>
                                    <input name="dataInicio" type="date" class="form-control"
                                        value="<?= date('Y') . '-' . date('m') . '-' . date('d') ?>" id="dataInicio"
                                      >
                                </div>


                                <div class="col-5">
                                    <label for="data_ingresso" class="label mr-1">Data
                                        Final<span style="color:red"> *</span></label>
                                    <input name="dataFinal" type="date" class="form-control"
                                        value="<?= date('Y') . '-' . date('m') . '-' . date('d') ?>" id="dataFinal"
                                        >
                                </div>
                            </div>
                            <div class="row mb-3" style="margin-top: 20px">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Print</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@stop
