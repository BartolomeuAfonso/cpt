@extends('layouts.inicio')
@section('content1')
<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">

                    <div class="card-body">
                        <div class="card rounded-pill" style="box-sizing: border-box;">
                            <div class="list-group-item list-group-item-action active"
                                style="font-weight: bold; color: write">Registo de Quioques</div>
                        </div>
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
                        <form method="post" action="{{ url('salvarQuiosque') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nome do Quiosques <span style="color:red"> *</span></label>
                                    <input type="text" name="nome"  style="font-weight: bold;" class="form-control" id="nome"
                                       >
                                </div>
                                <div class="form-group">
                                    <label class="label mr-1" for="biprovincia">Província <span style="color:red"> *</span></label>
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
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Municipio (Cidade)<span style="color:red"> *</span></label>
                                    <select class="form-control" name="bimunicipio" id="bimunicipio"required="">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="telefone">Nome da Paragem <span style="color:red"> *</span> </label>
                                    <input type="text" name="paragem"  style="font-weight: bold;"  class="form-control" id="telefone"  >
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle"></i> Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</main >
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
</script>