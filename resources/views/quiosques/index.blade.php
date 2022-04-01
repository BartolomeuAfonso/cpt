@extends('layouts.inicio')
@section('content1')
<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container-fluid" >
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="{{ url('registarQuiosque') }}"><button
                                                    type="button" class="btn btn-primary rounded-pill" data-toggle="modal"
                                                    data-target=".bd-example-modal-lg"><i class="fas fa-plus-circle"></i>
                                                    Novo Quioques</button></a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card rounded-pill" style="box-sizing: border-box;">
                            <div class="list-group-item list-group-item-action active"
                                style="font-weight: bold; color: write">Listas de Quioques</div>
                        </div>
                        <table class="table datatable" id="example2">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome do Quiosques</th>
                                    <th scope="col">Provincia</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Nome da Paragem</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quiosque as $quiosques)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $quiosques->nome }}</td>
                                        <td>{{ $quiosques->provincia }}</td>
                                        <td>{{ $quiosques->cidade }}</td>
                                        <td>{{ $quiosques->paragem }}</td>
                                        <td><a type="button" class="btn btn-primary rounded-pill" style="margin-right: 5px"
                                            href='{{ url("editarQuioques/".base64_encode($quiosques->id)) }}'>Editar</a></td>
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
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": true,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>


