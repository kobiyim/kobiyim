    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <!-- Dark Logo-->
            <a href="{{ url('/') }}" wire:navigate class="logo logo-dark">
            <span class="logo-sm">
            <img src="{{ asset('images') }}/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
            <img src="{{ asset('images') }}/logo-dark.png" alt="" height="17">
            </span>
            </a>
            <!-- Light Logo-->
            <a href="{{ url('/') }}" wire:navigate class="logo logo-light">
            <span class="logo-sm">
            <img src="{{ asset('images') }}/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
            <img src="{{ asset('images') }}/logo-light.png" alt="" height="17">
            </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
            </button>
        </div>
        <div class="dropdown sidebar-user m-1 rounded">
            <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center gap-2">
            <img class="rounded header-profile-user" src="{{ asset('images') }}/users/avatar-1.jpg" alt="Header Avatar">
            <span class="text-start">
            <span class="d-block fw-medium sidebar-user-name-text">Anna Adame</span>
            <span class="d-block fs-14 sidebar-user-name-sub-text"><i class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span class="align-middle">Online</span></span>
            </span>
            </span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <h6 class="dropdown-header">Welcome Anna!</h6>
                <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                <a class="dropdown-item" href="apps-chat.html"><i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Messages</span></a>
                <a class="dropdown-item" href="apps-tasks-kanban.html"><i class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Taskboard</span></a>
                <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Balance : <b>$5971.67</b></span></a>
                <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-success-subtle text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
                <a class="dropdown-item" href="auth-lockscreen-basic.html"><i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>
                <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
            </div>
        </div>
        <div id="scrollbar">
            <div class="container-fluid">
                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#anaKayitlar" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="anaKayitlar">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Ana Kayıtlar</span>
                        </a>
                        <div class="collapse menu-dropdown" id="anaKayitlar">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('cards') }}" class="nav-link" wire:navigate> Cariler </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('items') }}" class="nav-link" wire:navigate> Malzemeler </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('banks') }}" class="nav-link" wire:navigate> Bankalar </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('unit') }}-sets" class="nav-link" wire:navigate> Birim Setleri </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('vaults') }}" class="nav-link" wire:navigate> Kasalar </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#faturalar" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="faturalar">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Faturalar</span>
                        </a>
                        <div class="collapse menu-dropdown" id="faturalar">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('invoice/sales') }}" class="nav-link" wire:navigate> Satış Faturaları </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('invoice/purchase') }}" class="nav-link" wire:navigate> Satınalma Faturaları </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#banka" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="banka">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Banka</span>
                        </a>
                        <div class="collapse menu-dropdown" id="banka">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('bank/fiches') }}" class="nav-link" wire:navigate> Banka Fişleri </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('bank/movements') }}" class="nav-link" wire:navigate> Banka Hareketleri </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#cariHesap" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="cariHesap">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Cari Hesap</span>
                        </a>
                        <div class="collapse menu-dropdown" id="cariHesap">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('card/transaction-fiches') }}" class="nav-link" wire:navigate> Cari Hesap Fişleri </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#kasa" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="kasa">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Kasa</span>
                        </a>
                        <div class="collapse menu-dropdown" id="kasa">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('vault/fiches') }}" class="nav-link" wire:navigate> Kasa Fişleri </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('vault/movements') }}" class="nav-link" wire:navigate> Kasa Hareketleri </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#cekVeSenet" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="cekVeSenet">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Çek ve Senet</span>
                        </a>
                        <div class="collapse menu-dropdown" id="cekVeSenet">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('cash-items') }}" class="nav-link" wire:navigate> Çek ve Senetler </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('payrolls') }}" class="nav-link" wire:navigate> Bordrolar </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sistem" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sistem">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Sistem</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sistem">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('system/activities') }}" class="nav-link" wire:navigate> Aktiviteler </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('system/query-logs') }}" class="nav-link" wire:navigate> Sorgu Takibi </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('system/users') }}" class="nav-link" wire:navigate> Kullanıcılar </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('system/roles') }}" class="nav-link" wire:navigate> Roller </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('system/permissions') }}" class="nav-link" wire:navigate> İzinler </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('system/backups') }}" class="nav-link" wire:navigate> Yedeklemeler </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- end Dashboard Menu -->
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
        <div class="sidebar-background"></div>
    </div>