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
                                style="font-weight: bold; color: write">Listas de Prestador</div>
                        </div>
                        <table class="table datatable" id="example2">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome da Clínica</th>
                                    <th scope="col">Endereço</th>
                                    <th scope="col">Contacto</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prestador as $clinica)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $clinica->nome }}</td>
                                        <td>{{ $clinica->endereco }}</td>
                                        <td>{{ $clinica->telefone }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@stop

