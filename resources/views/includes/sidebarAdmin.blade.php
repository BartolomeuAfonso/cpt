
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="{{ url('entrar') }}">
                <i class="bi bi-grid"></i>
                <span>Módulo Administrativas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Operações Anata</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ url('associacao') }}"> <i
                    class="bi bi-circle"></i>Registo de Associação</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('staff') }}"> <i
                            class="bi bi-circle"></i>Registo de Staff</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('listaPessa') }}"> <i
                            class="bi bi-circle"></i>Gestão</a></li>


            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-fat" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span> Operações CPT</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-fat" class="nav-content collapse " data-bs-parent="#sidebar-nav">
               
                <li class="nav-item"><a class="nav-link" href="{{ url('listaQuioques') }}"> <i
                            class="bi bi-circle"></i>Quiosques</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('listaPlano') }}"> <i
                            class="bi bi-circle"></i>Planos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('listaFactura') }}"> <i
                            class="bi bi-circle"></i>Colectores</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('listaFactura') }}"> <i
                            class="bi bi-circle"></i>Poupança Diaria</a></li>

            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-fat11" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span> Operações Administrativas</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-fat11" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ url('listaServicos') }}"> <i
                            class="bi bi-circle"></i>Serviços</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('listaPrestador') }}"> <i
                            class="bi bi-circle"></i>Lista de Clínica Prestadoras</a></li>

            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-fat2" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span> Facturação</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-fat2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ url('fatura') }}"> <i
                            class="bi bi-circle"></i>Inserção</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('listaFactura') }}"> <i
                            class="bi bi-circle"></i>Lista</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('listaFactura') }}"> <i
                    class="bi bi-circle"></i>Movimento Mensal</a></li>

            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-fat3" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span> Relatórios</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-fat3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ url('fatura') }}"> <i
                            class="bi bi-circle"></i>Mensal de quotas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('listaFactura') }}"> <i
                            class="bi bi-circle"></i>Gráficos</a></li>

            </ul>
        </li>
    </ul>
</aside>
