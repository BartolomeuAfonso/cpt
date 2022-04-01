<!-- Left Sidenav -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="{{ url('entrar') }}">
                <i class="bi bi-grid"></i>
                <span>Módulo Prestador</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-fat2" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span> Facturação</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-fat2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ url('fatura') }}"> <i
                            class="bi bi-circle"></i>Inserção</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('listaFactura1') }}"> <i
                            class="bi bi-circle"></i>Lista</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('movimento1') }}"> <i
                    class="bi bi-circle"></i>Movimento Mensal</a></li>

            </ul>
        </li>
    </ul>
</aside>
<!-- end left-sidenav-->
