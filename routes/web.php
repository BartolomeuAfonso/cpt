<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

/* ------------------------ Operação Staff -----------------*/
Route::get('staff', 'StaffController@index');
Route::get('cadastroStaff', 'StaffController@getFormulario');
Route::post('salvarStaff', 'StaffController@registarStaff');
Route::get('editarStaff/{id_staff}', 'StaffController@obterDadosStaff');
Route::post('atualizarStaff', 'StaffController@editar');
Route::get('associacao', 'AassociacaoController@index');
Route::get('cadastroAssociacao', 'AassociacaoController@create');
Route::post('salvarAssociacao', 'AassociacaoController@registarAssociacao');
Route::get('editarAssociacao/{id}', 'AassociacaoController@obterDadosAssociacao');
Route::post('atualizarAssociacao', 'AassociacaoController@editar');


/*------------------------ Operação Pessoal -----------------------*/
Route::get('listaPessa', 'ClienteController@listaCliente');
Route::get('resgistoPessoa', 'ClienteController@resgistoPessoa');
Route::post('salvarPessoa', 'ClienteController@salvaPessoal');
Route::get('editarPessoa/{id}', 'ClienteController@getObterDados');
Route::post('atualizacaoPessoa', 'ClienteController@atualizacao');
Route::get('contrato', 'ClienteController@baixarContrato');
Route::get('pesquisa/{idEstado}', 'ClienteController@pesquisaporBi');
Route::get('imprimirContrato', 'ClienteController@ImprimirContrato');
Route::get('imprimirContrato/{id}', 'ClienteController@ImprimirContratoporParametro');
Route::get('pesquisaPor/{nBi}', 'ClienteController@getBuscaQuota');



/* ------------------- Operação Municipios ----------------------*/

Route::get('municipio/{idEstado}', 'MunicipioController@getMunicipio');
Route::get('associacao/{idEstado}', 'MunicipioController@getAssociacao');
Route::get('editarPessoa/municipio/{idEstado}', 'MunicipioController@getMunicipio');
Route::get('editarPessoa/associacao/{idEstado}', 'MunicipioController@getAssociacao');
Route::get('editarQuioques/municipio/{idEstado}', 'MunicipioController@getMunicipio');

/* ------------------- Quioques ------------------------ */
Route::get('listaQuioques', 'QuioquesController@lista');
Route::get('registarQuiosque', 'QuioquesController@index');
Route::post('salvarQuiosque', 'QuioquesController@registarQuiosque');
Route::get('editarQuioques/{id}', 'QuioquesController@getObterDados');

Route::post('editarQuiosque', 'QuioquesController@editarQuiosque');

/*---------------------- Plano ------------------------------ */
Route::get('listaPlano', 'PlanoController@index');

/* ----------------------- Lista de Serviços  ----------------------------- */
Route::get('listaServicos', 'ServicoController@index');


/* -------------------------- Lista de Prestador ---------------------- */
Route::get('listaPrestador', 'PrestadorController@index');

/*---------------------------- Lista de Poupança --------------------- */
Route::get('listaPoupanca', 'PoupancaController@index');
Route::get('poupanca', 'PoupancaController@getPoupanca');
Route::get('poupancaPadroes', 'PoupancaController@getPoupancaPadroes');
Route::post('salvarpoupanca', 'PoupancaController@getSalvarPoupanca');
Route::get('listapoupanca', 'PoupancaController@getListaPoupanca');
Route::get('ImprimirRecibo/{id}/{codigo}', 'PoupancaController@ImprimirRecibo');
Route::get('printPoupanca', 'PoupancaController@getRelatorio');

/*--------------------- Faturação0 ------------------------------ */
Route::get('listaFactura', 'FaturaController@listaFactura');
Route::get('listaFactura1', 'FaturaController@listaFactura1');
Route::get('movimento1', 'FaturaController@getMovimento1');
Route::get('movimento', 'FaturaController@getMovimento');
Route::get('fatura', 'FaturaController@index');
Route::post('salvarFatura', 'FaturaController@salvarFatura');
Route::get('Imprimir/{id}/{codigo}', 'FaturaController@ImprimirFatura');
Route::get('porData', 'FaturaController@getBuscaporData');
Route::get('resumoMensal', 'FaturaController@resumoMensal');


Route::get('sair', function () {
    if (Auth::logout() == null) {
        return redirect()->intended('/');
    }
});

Route::get('entrar', function () {
    return view('layouts.login');
});


Route::get('login', function () {
    return view('layouts.inicio');
});

Route::post('auntenticao', 'Auth\LoginController@authenticate');



//Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
