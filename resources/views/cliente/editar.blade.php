@extends('layouts.inicio')
@section('content1')
<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="container-fluid">
                @if ($errors->all())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
                @endif
                @if (session('sucesso'))
                    <div style="height:40px;background:#bdf7c9"
                        class="alert icon-custom-alert  alert-outline-success b-round fade show" role="alert">
                        <div style="color:#000" class="alert-text">
                            {{ session('sucesso') }}
                        </div>
                    </div>
                @endif
                @if (session('error'))
                    <div style="height:40px;background:#eb1919"
                        class="alert icon-custom-alert  alert-outline-warning b-round fade show" role="alert">
                        <div style="color:#000" class="alert-text">
                            {{ session('error') }}
                        </div>

                    </div>
                @endif
                <form method="post" action ="{{ url('atualizacaoPessoa') }}">
                    @csrf
                    <div class="col-lg-12" style="background-color:white;">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title" style="font-weight: bold">Atualizar Registo de Pessoal</h2>

                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home" type="button" style="font-weight: bold" role="tab" aria-controls="home"
                                            aria-selected="true">1. Dados
                                            Pessoais</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                            aria-selected="false" style="font-weight: bold">2. Dados profissionais</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                                            aria-selected="false" style="font-weight: bold">3. Dados do Proprietário da Viatura</button>
                                    </li>
                                </ul>
                                <!------------------------------------------- Dados Pessoais ---------------->
                                <div class="tab-content pt-2" id="myTabContent">

                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab" style="height: 400px;">
                                        <div class="row" style="margin-left: 5px;margin-right: 10px;">
                                            <div class="col-8">
                                                <label for="nome" class="label mr-1">Nome<span style="color:red"> *</span></label>
                                                <input name="nome" value="{{$pessoa->nome}}"  style="font-weight: bold" class="form-control" required="" id="nome">
                                                <input type="text" style="display: none;font-weight: bold;" value="{{ $pessoa->id }}"
                                                name="id" class="form-control" id="id">
                                            </div>

                                            <div class="col-4">
                                                <label for="genero">Genero</label>
                                                <select class="form-control" name="genero" id="genero">
                                                    <option value="1">Masculino</option>
                                                    <option value="2">Feminino</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row" style="margin-left: 5px;margin-right: 10px;">
                                            <div class="col-6">
                                                <label for="sector" class="label mr-1">Filiação (Pai)<span style="color:red"> *</span> </label>
                                                <input name="pai" value="{{$pessoa->pai}}" style="font-weight: bold" class="form-control" required="" id="pai">
                                            </div>
                                            <div class="col-6">
                                                <label class="label mr-1" for="mae"> e de (Mãe)<span style="color:red"> *</span></label>
                                                <input name="mae" value="{{$pessoa->mae}}"  style="font-weight: bold" class="form-control" required="" id="mae">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-left: 5px;margin-right: 10px;">

                                            <div class="col-4">
                                                <label for="nDependente">Nº de filhos</label>
                                                <select class="form-control" name="nDependente" id="nDependente">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>

                                            <div class="col-4">
                                                <label for="estadocivil">Estado Civil</label>
                                                <select class="form-control" name="estadocivil" id="estadocivil">
                                                    <option value="1">Casado(a)</option>
                                                    <option value="2">Solteiro(a)</option>
                                                </select>
                                            </div>

                                            <div class="col-4">
                                                <label class="label mr-1" for="dataNasc">Data de Nascimento<span style="color:red"> *</span></label>
                                                <input name="dataNasc" value="{{$pessoa->dataNasc}}"  type="date" class="form-control" id="dataNasc"
                                                    required="">
                                            </div>
                                        </div>

                                        <div class="row" style="margin-left: 5px;margin-right: 10px;">
                                            <div class="col-6">
                                                <label class="label mr-1" for="naturalidade">Naturalidade<span style="color:red"> *</span></label>
                                                <input name="naturalidade" value="{{$pessoa->naturalidade}}"  style="font-weight: bold" class="form-control" id="naturalidade"
                                                    required="">
                                            </div>
                                            <div class="col-6">
                                                <label for="nBi" class="label mr-1">Nº do
                                                    B.I./Cédula/Passaporte*</label>
                                                <input name="nBi" class="form-control" style="font-weight: bold;" value="{{$pessoa->nBi}}" id="nBi" required="">
                                            </div>
                                        </div>
                                        <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<label>Residência - constada no BI</label>
                                        <div class="row" style="margin-left: 5px;margin-right: 10px;">
                                            <div class="col-4">
                                                <label class="label mr-1" for="biprovincia">Província</label>
                                                <select class="custom-select form-control" name="biprovincia"
                                                    id="biprovincia" required="">
                                                    <option value="" disabled selected>Escolha uma província</option>
                                                    @foreach ($provincia as $provincias)
                                                        <option value="{{ $provincias->id }}">
                                                            {{ $provincias->designacao }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-5">
                                                <label class="label mr-1" for="municipio">Município<span style="color:red"> *</span></label>
                                                <select class="form-control" name="bimunicipio" id="bimunicipio"
                                                    required="">

                                                 </select>
                                            </div>
                                            <div class="col-3">
                                                <label class="label mr-1" for="municipio">Residência</label>
                                                <input name="biendereco" value="{{$pessoa->endereco}}" style="font-weight: bold" class="form-control" id="biendereco" required="">
                                            </div>
                                            <br>
                                        </div>

                                    </div>


                                    <!------------------------------- Dados Profissionais ----------------------->
                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                    aria-labelledby="profile-tab" style="
                                            height: 400px; margin-top:10px">
                                    <div class="row" style="margin-left: 5px;margin-right: 10px;">
                                        <div class="col-2">
                                            <label for="habilitacoes" class="label mr-1">Habilitações*</label>
                                            <select style="font-weight: bold;" class="form-select"
                                                name="habilitacoes" id="floatingSelect"
                                                aria-label="Floating label select example">
                                                <option value="1">Ensino base</option>
                                                <option value="2">Ensino secundário</option>
                                                <option value="3">Bacharel</option>
                                                <option value="4">Licenciado</option>
                                                <option value="5">Mestre</option>
                                                <option value="6">PhD / Doctorado</option>
                                            </select>
                                        </div>

                                        <div class="col-6">
                                            <label for="codigoFuncao">Função</label>
                                            <select style="font-weight: bold;" class="form-select"
                                                name="codigoFuncao" id="floatingSelect"
                                                aria-label="Floating label select example">
                                                <option value="" disabled selected>Escolha uma Função</option>
                                                @foreach ($funcao as $funcaos)
                                                    <option value="{{ $funcaos->id }}">
                                                        {{ $funcaos->designacao }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left: 5px;margin-right: 10px;">
                                        <div class="col-2">
                                            <label for="data_ingresso" class="label mr-1">Data de
                                                ingresso<span style="color:red"> *</span></label>
                                            <input style="font-weight: bold;" name="data_ingresso" type="date"
                                                class="form-control"
                                                value="<?= date('Y') . '-' . date('m') . '-' . date('d') ?>"
                                                id="data_ingresso" required="">
                                        </div>

                                        <div class="col-3">
                                            <label for="codigoAssociacao">Associação<span style="color:red"> *</span></label>

                                            <select style="font-weight: bold;" class="form-select"
                                                name="codigoAssociacao" id="codigoAssociacao"
                                                aria-label="Floating label select example">
                                                <option value="" disabled selected>Escolha uma Staff</option>
                                                @foreach ($staff as $staffs)
                                                    <option value="{{ $staffs->id }}">
                                                        {{ $staffs->designacao }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="codigoStaff">Staff<span style="color:red"> *</span></label>

                                            <select style="font-weight: bold;" class="form-select"
                                                name="codigoStaff" id="codigoStaff"
                                                aria-label="Floating label select example">
                                                <option value="" disabled selected>Escolha uma Staff</option>
                                              
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left: 5px;margin-right: 10px;">
                                        <div class="col-4">
                                            <label for="contacto" class="label mr-1">Contacto</label>
                                            <input name="contacto" class="form-control" id="contacto" >
                                        </div>
                                        <div class="col-4">
                                            <label for="email" class="label mr-1">Email</label>
                                            <input name="email" class="form-control" id="email">
                                        </div>
                                    </div>

                                </div>
                                    <!----------------------------------------- Staff ------------------------>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"
                                        style="height: 400px;  margin-top:10px">
                                        <div class="row" style="margin-left: 5px;margin-right: 10px;">
                                            <div class="col-4">
                                                <label for="matricula" class="label mr-1">Matricula<span style="color:red"> *</span></label>
                                                <input name="matricula" value="{{$pessoa->matricula}}"  style="font-weight: bold" type="text" class="form-control" id="matricula"
                                                    required="">
                                            </div>
                                            <div class="col-4">
                                                <label for="data_venc_seguro" class="label mr-1">Data de vencimento
                                                    da
                                                    seguro</label>
                                                <input name="data_venc_seguro" value="{{$pessoa->data_venc_seguro}}"   type="date" value="<?= date('Y') . '-' . date('m') . '-' . date('d') ?>" class="form-control"
                                                    id="data_venc_seguro">
                                            </div>
                                            <div class="col-4">
                                                <label for="data_venc_licenca" class="label mr-1">Data de vencimento
                                                    do
                                                    licença</label>
                                                <input name="data_venc_licenca"  value="{{$pessoa->data_venc_licenca}}"  type="date" value="<?= date('Y') . '-' . date('m') . '-' . date('d') ?>" class="form-control"
                                                    id="data_venc_licenca">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-left: 5px;margin-right: 10px;">
                                            <div class="col-8">
                                                <label for="nome_proprietario" class="label mr-1">Nome do
                                                    proprietario<span style="color:red"> *</span></label>
                                                <input name="nome_proprietario"  value="{{$pessoa->nome_proprietario}}"  style="font-weight: bold" class="form-control"
                                                    id="nome_proprietario" required="">
                                            </div>
                                        </div>

                                        <div class="row" style="margin-left: 5px;margin-right: 10px;">
                                            <div class="col-4">
                                                <label for="telefone_proprietario" class="label mr-1">Telefone<span style="color:red"> *</span></label>
                                                <input name="telefone_proprietario" value="{{$pessoa->telefone_proprietario}}"  class="form-control"
                                                    id="telefone_proprietario" required="">
                                            </div>
                                            <div class="col-4">
                                                <label for="telefone_proprietario_alt" class="label mr-1">Telefone
                                                    (Alternativo)</label>
                                                <input name="telefone_proprietario_alt" style="font-weight: bold" class="form-control"
                                                    id="telefone_proprietario_alt">
                                            </div>

                                            <div class="col-4">
                                                <label for="email_proprietario" class="label mr-1">Email</label>
                                                <input name="email_proprietario"  value="{{$pessoa->email_proprietario}}" class="form-control"
                                                    id="email_proprietario" style="font-weight: bold">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3" style="margin-left:  10px">
                                <div class="col-sm-10">
                                    <p >Todos os campos com <span style="color:red"> *</span> são obrigatório</p>
                                </div>
                            </div>
                            <div class="row mb-3" style="margin-left: 10px">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </div>
                            </div>
                        </div>         
                    </div>             
                </form>
            </div>
        </div>
    </section>
</main>
@stop
<script src="{{ url('js/jquery12.js') }}"></script>
<script>
    $(document).ready(function() {
        $('select[name="biprovincia"]').on('change', function() {
            var idEstado = $(this).val();
            console.log(idEstado);
            $.ajax({
                url: 'municipio/' + idEstado,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('select[name=bimunicipio]').empty();
                    for (var i = 0; data.length > i; i++) {
                        $('#bimunicipio').append('<option value="' + data[i].id + '"> ' +
                            data[i].designacao + '</option>');
                    }
                }
            });

        });
    });
    $(document).ready(function() {
        $('select[name="codigoAssociacao"]').on('change', function() {
            var idEstado = $(this).val();
            console.log(idEstado);
            $.ajax({
                url: 'associacao/' + idEstado,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('select[name=codigoStaff]').empty();
                    for (var i = 0; data.length > i; i++) {
                        $('#codigoStaff').append('<option value="' + data[i].id + '"> ' +
                            data[i].designacao + '</option>');
                    }
                }
            });

        });
    });
</script>
