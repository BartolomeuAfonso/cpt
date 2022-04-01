<!-- Left Sidenav -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="#">
                <i class="bi bi-grid"></i>
                <span>Módulo Colector</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-fat" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span> Operações CPT</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-fat" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ url('poupanca') }}"> <i
                            class="bi bi-circle"></i>Poupança Diaria</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('poupancaPadroes') }}"> <i
                            class="bi bi-circle"></i>Poupança Patrões</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('listapoupanca') }}"> <i
                            class="bi bi-circle"></i>Lista de Poupança Diaria</a></li>

            </ul>
        </li>
    </ul>
</aside>
<!-- end left-sidenav-->
