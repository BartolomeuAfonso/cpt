@extends('layouts.inicio')
@section('content1')
<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card rounded-pill" style="box-sizing: border-box;">
                            <div class="list-group-item list-group-item-action active"
                                style="font-weight: bold; color: write">Registo de Staff</div>
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
                        <form method="post" action="{{ url('salvarStaff') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nome:</label>
                                    <input type="text" name="nome"  style="font-weight: bold;" class="form-control" id="nome"
                                       >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Endereço:</label>
                                    <input type="text" name="endereco"  style="font-weight: bold;" class="form-control" id="Endereço"
                                      >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Responsável:</label>
                                    <input type="text" name="responsavel"   style="font-weight: bold;" class="form-control" id="responsavel"
                                       >
                                </div>
                                <div class="form-group">
                                    <label for="telefone">Contacto:</label>
                                    <input type="text" name="telefone"  style="font-weight: bold;"  class="form-control" id="telefone"
                                       >
                                </div>
                                <div class="form-group">
                                    <label for="codigoAssociacao">Associação<span style="color:red"> *</span></label>

                                    <select style="font-weight: bold;" class="form-select"
                                        name="codigoAssociacao" id="codigoAssociacao"
                                        aria-label="Floating label select example">
                                        <option value="" disabled selected>Escolha uma Associação</option>
                                        @foreach ($staff as $staffs)
                                            <option value="{{ $staffs->id }}">
                                                {{ $staffs->designacao }}
                                            </option>
                                        @endforeach
                                    </select>
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
</main>
@stop
