<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cofre de Poupança dos Táxista') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/datatables2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('material/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('material/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('material/boxicons/css/boxicons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('material/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('material/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('material/remixicon/remixicon.css') }} " rel="stylesheet" type="text/css" />
    <link href="{{ asset('material/simple-datatables/style.css') }} " rel="stylesheet" type="text/css" />
</head>

<body style="background:white">
    <main id="main" class="main" style="background:white">
        <section class="section">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Obtem o seu histórico aqui <strong
                                    style="font-weight: bold; font-size: 24px">Sr. Contribuiente</strong></h5>

                            <!-- Default Accordion -->
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Contrato
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="container-fluid">
                                                <form method="get" action="{{ url('imprimirContrato') }}"  >
                                                    @csrf
                                                    <div class="row" id="divNome"
                                                        style="margin-left: 5px;margin-right: 10px;">

                                                        <div class="col-6">
                                                            <label for="nome" class="label mr-1">B.I<span
                                                                    style="color:red">
                                                                    *</span></label>
                                                            <input name="nome" style="font-weight: bold"
                                                                class="form-control" required="" id="nome">
                                                        </div>
                                                        <div class="col-6" style="margin-top: 20px">
                                                            <div class="col-sm-12">
                                                                <button type="submit" id="botaoSalvar"
                                                                    class="btn btn-primary">Consultar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6" id="porNome"
                                                            style="margin-top: 20px; display: none;">
                                                            <input name="nomePesquisa" disabled style="font-weight: bold"
                                                                class="form-control"  id="nomePesquisa">
                                                            <input name="id" disabled style="font-weight: bold"
                                                                class="form-control" id="id">
                                                        </div>
                                                        <div class="col-6" id="baixar"
                                                            style="margin-top: 20px; display: none;">
                                                            <div class="col-sm-12">
                                                                <button type="submit" id="botaoDownload"
                                                                
                                                                    class="btn btn-primary" >Download</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                 </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Suas Poupanças
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form method="get" action="{{url('printPoupanca')}}" target="_blank">
                                            
                                            <div class="row" style="margin-left: 5px;margin-right: 10px;">
                                                <div class="col-4">
                                                 
                                                    <label for="nome" class="label mr-1">B.I<span style="color:red">
                                                            *</span></label>
                                                    <input  id="codigoCliente" name="codigoCliente" style="font-weight: bold" class="form-control">
                                                   
                                                </div>
                                                <div class="col-3">
                                                    <label for="dataInicio" class="label mr-1">Data Inicio<span
                                                            style="color:red">
                                                            *</span></label>
                                                    <input name="dataInicio" type="date" class="form-control"
                                                         value="<?= date('Y') . '-' . date('m') . '-' . date('d') ?>" id="dataInicio">
                                                </div>


                                                <div class="col-3">
                                                    <label for="dataFinal" class="label mr-1">Data
                                                        Final<span style="color:red"> *</span></label>
                                                    <input name="dataFinal" type="date" class="form-control"
                                                        value="<?= date('Y') . '-' . date('m') . '-' . date('d') ?>" id="dataFinal">
                                                </div>
                                                
                                                <div class="col-3" style="display:none">
                                                    <input name="radio1" type="text" class="form-control"
                                                        value="2" id="radio1" id="radio1">
                                                </div>
                                                <div class="col-2" style="margin-top: 20px">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-primary">Consultar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                         
                        </div><!-- End Default Accordion Example -->

                    </div>
                </div>

            </div>
            </div>
        </section>
    </main>
    <script src="{{ url('js/main.js') }}"></script>
    <script src="{{ url('material/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ url('material/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('material/quill/quill.min.js') }}"></script>
    <script src="{{ url('material/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ url('js/jquery12.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#botaoSalvar").click(function() {
                var idEstado = document.getElementById("nome").value;
                console.log(idEstado);
                $.ajax({
                    url: 'pesquisa/' + idEstado,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data.nome);
                        document.getElementById('divNome').style.display = "none";
                        document.getElementById('porNome').style.display = "inherit";
                        document.getElementById('baixar').style.display = "inherit";
                        document.getElementById('nomePesquisa').value = data.nome;
                        document.getElementById('id').style.display = "none";
                        document.getElementById('id').value = data.id;
                    }
                });

            });
        });
    </script>
</body>

</html>
