<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="{{route("admin.dashboard")}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Anasayfa
                    </a>
                    <div class="sb-sidenav-menu-heading">Film</div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Film
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                        data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route("admin.film")}}">Film Listele</a>
                            <a class="nav-link" href="{{route("admin.film-add")}}">Film Ekle</a>
                        </nav>
                    </div>

                    <a class="nav-link" href="{{route("admin.category")}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                        Kategoriler
                    </a>


                    <a class="nav-link" href="{{route("admin.message")}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Mesajlar
                    </a>

                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">