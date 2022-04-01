@extends('layouts.app')
@section('content')

 <!-- TopBar-->
 @include('includes.topbar')

<div class="page-wrapper">
    <!-- SIDE MENU BAR-->
    @include('includes.sidebarClinica')

    <!-- Page Content-->
    <div class="page-content">
        <!-- Inicio da Content depois de logado -->
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
            @yield('content1')
        <!-- Fim da Content depois de logado -->

        <!-- TopBar-->
  
    </div>
    <!-- end page content -->
</div>
@stop