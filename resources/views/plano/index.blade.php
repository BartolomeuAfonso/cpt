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
                                    style="font-weight: bold; color: write; text-align: center">Listas de Plano</div>
                            </div>
                            <table class="table datatable" id="example1">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($plano) && $plano->count())
                                        @foreach ($plano as $planos)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $planos->designacao }}</td>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10">There are no data.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            {!! $plano->appends(Request::all())->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@stop
