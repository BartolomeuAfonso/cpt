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
                                    style="font-weight: bold; color: write">Listas de Serviços</div>
                            </div>
                            <table class="table datatable" id="example2">
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th >Designacao</th>
                                        <th >Preço</th>
                                        <th >Categoria</th>
                                        <th ></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @if (!empty($servico) && $servico->count())
                                    @foreach ($servico as $servicos)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $servicos->designacao }}</td>
                                            <td>{{ $servicos->preco }}</td>
                                            <td>{{ $servicos->categoria }}</td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="10">There are no data.</td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>
                            {!! $servico->appends(Request::all())->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="{{asset('datatables/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('datatables/js/jquery-3.5.1.js')}}"></script>
    <script src="{{asset('datatables/js/jquery.dataTables.min.js')}}"></script>
    <script>
      $(document).ready(function () {
        $('#example2').DataTable();
      });
    </script>
@stop

