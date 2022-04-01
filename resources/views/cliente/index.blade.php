@extends('layouts.inicio')
@section('content1')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="{{ url('resgistoPessoa') }}"><button
                                                        type="button" class="btn btn-primary rounded-pill"
                                                        data-toggle="modal" data-target=".bd-example-modal-lg"><i
                                                            class="fas fa-plus-circle"></i>
                                                        Novo Registo</button></a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card rounded-pill" style="box-sizing: border-box;">
                                <div class="list-group-item list-group-item-action active"
                                    style="font-weight: bold; color: write">Listas de Táxista</div>
                            </div>
                            <table id="example2" class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Staff</th>
                                        <th scope="col">Contacto</th>
                                        <th scope="col">Endereço</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($pessoa) && $pessoa->count())
                                        @foreach ($pessoa as $pessoas)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pessoas->nome }}</td>
                                                <td>{{ $pessoas->staff }}</td>
                                                <td>{{ $pessoas->telefone }}</td>
                                                <td>{{ $pessoas->distrito }}</td>
                                                <td><a type="button" class="btn btn-primary rounded-pill"
                                                        style="margin-right: 5px"
                                                        href='{{ url("editarPessoa/".base64_encode($pessoas->id)) }}'>Editar</a>
                                                        <a type="button" class="btn btn-success  rounded-pill"
                                                        href="{{ url('imprimirContrato/'.$pessoas->nBi) }}" target="_blank">Contrato</a>
                                                     
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
                            {!! $pessoa->appends(Request::all())->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


@stop
<script>
    $(function() {
        $('#example2').DataTable({
            "responsive": true,
            "autoWidth": true,
        });
        $('.datatable').DataTable({
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
