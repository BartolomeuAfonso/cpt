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
                                style="font-weight: bold; color: write">Atualizar Staff</div>
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
                        <form method="post" action="{{ url('atualizarStaff') }}">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Nome:</label>
                                    <input type="text" style="font-weight: bold;" value="{{ $staff->designacao }}"
                                        name="nome" class="form-control" id="nome">
                                    <input type="text" style="display: none;font-weight: bold;" value="{{ $staff->id }}"
                                        name="id" class="form-control" id="id">
                                </div>
                                <div class="form-group">
                                    <label>Endereço:</label>
                                    <input type="text" style="font-weight: bold;" value="{{ $staff->endereco }}"
                                        name="endereco" class="form-control" id="Endereço">
                                </div>
                                <div class="form-group">
                                    <label>Responsável:</label>
                                    <input type="text" style="font-weight: bold;" value="{{ $staff->responsavel }}"
                                        name="responsavel" class="form-control" id="responsavel">
                                </div>
                                <div class="form-group">
                                    <label>Contacto:</label>
                                    <input type="text" style="font-weight: bold;" value="{{ $staff->telefone }}"
                                        name="telefone" class="form-control" id="telefone">
                                </div>
                                <div class="form-group">
                                    <label for="codigoAssociacao">Associação<span style="color:red"> *</span></label>

                                    <select style="font-weight: bold;" class="form-select"
                                        name="codigoAssociacao" id="codigoAssociacao"
                                        aria-label="Floating label select example">
                                        <option value="" disabled selected>Escolha uma Associação</option>
                                        @foreach ($associacao as $associacaos)
                                            <option value="{{ $associacaos->id }}">
                                                {{ $associacaos->designacao }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</main>
@stop
