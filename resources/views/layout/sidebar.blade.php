@include('layout.css')
@include('layout.script')
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link" href="/">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <a class="nav-link collapsed" href="/student">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Students

                </a>
                {{-- <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">Static Navigation</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                    </nav>
                </div> --}}
                <a class="nav-link collapsed" href="/attendance">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Attendance

                </a>
                <a class="nav-link collapsed" href="/show">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Show Attendance
                </a>
                {{-- <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a> --}}
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">&copy; 2024</div>
            karan
        </div>
    </nav>
</div>
