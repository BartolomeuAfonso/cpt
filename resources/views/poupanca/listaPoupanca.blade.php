@extends('layouts.inicioPrestador')
@section('content1')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card rounded-pill" style="box-sizing: border-box;">
                            <div class="list-group-item list-group-item-action active"
                                style="font-weight: bold; color: write; text-align: center">Listas de Poupanças</div>
                        </div>
                      
                        <form method="get" action="{{ url('porData') }}">
                            @csrf
                            <div class="row" style="margin-left: 10px;">
                                <div class="col-2">
                                    <input type="text" style="display: none;font-weight: bold;" value="1" name="id"
                                        class="form-control" id="id">
                                    <label for="sector" class="label mr-1">Data Inicial</label>
                                    <input name="dataInicio" value="{{ date('Y') . '-' . date('m') . '-' . date('d') }}"
                                        id="dataInicio" type="date" class="form-control">
                                </div>
                                <div class="col-2">
                                    <label class="label mr-1" for="ano">Data Final</label>
                                    <input name="dataFim" value="{{ date('Y') . '-' . date('m') . '-' . date('d') }}"
                                        id="dataFim" type="date" class="form-control">
                                </div>
                                <div class="col-2" style="margin-top: 27px;">
                                    <button type="submit" class="btn btn-primary mb-2"
                                        id="btnSubmeterFiltro">Buscar</button>
                                </div>
                            </div>
                        </form>
                        <div class="row" style="margin-left: 10px;">
                            <div class="card-body">
                                <table id="example" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nº Lançamento</th>
                                            <th>Nome</th>
                                            <th>Nº Bilhete de Identidade</th>
                                            <th>Montante</th>
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($quota) && $quota->count())
                                            @foreach ($quota as $quotas)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $quotas->id }}</td>
                                                    <td>{{ $quotas->nome }}</td>
                                                    <td>{{ $quotas->nBi }}</td>
                                                    <td>{{ $quotas->valorvalido }}</td>
                                                    <td>{{ $quotas->dataInserida }}</td>
                                                    <td><a type="button" class="btn btn-primary rounded-pill"
                                                            style="margin-right: 5px"
                                                            href="{{ url("ImprimirRecibo/$quotas->id/2") }}"
                                                            target="_blank">Imprimir</a></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="10">There are no data.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>

                                {!! $quota->appends(Request::all())->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@stop

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('.table').DataTable();
        new $.fn.dataTable.FixedHeader(table, {
            alwaysCloneTop: true
        });
    });
</script>
