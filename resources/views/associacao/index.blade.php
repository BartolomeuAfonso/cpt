@extends('layouts.inicio')
@section('content1')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item">
                                                <a href="{{ url('cadastroAssociacao') }}"><button
                                                        type="button" class="btn btn-primary rounded-pill"
                                                        data-toggle="modal" data-target=".bd-example-modal-lg"><i
                                                            class="fas fa-plus-circle"></i>
                                                        Registar</button></a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="card-body">
                            <div class="card rounded-pill" style="box-sizing: border-box;">
                                <div class="list-group-item list-group-item-action active"
                                    style="font-weight: bold; color: write">Listas de Associação</div>
                            </div>
                            <table class="table datatable" id="example2">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Contacto</th>
                                        <th scope="col">Endereço</th>
                                        <th scope="col">Responsável</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($associacao) && $associacao->count())
                                        @foreach ($associacao as $associa)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $associa->designacao }}</td>
                                                <td>{{ $associa->responsavel }}</td>
                                                <td>{{ $associa->endereco }}</td>
                                                <td>{{ $associa->telefone }}</td>
                                                <td><a type="button" class="btn btn-primary rounded-pill"
                                                        style="margin-right: 5px"
                                                        href='{{ url('editarAssociacao/' . base64_encode($associa->id)) }}'>Editar</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10">There are no data.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            {!! $associacao->appends(Request::all())->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
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
@stop
