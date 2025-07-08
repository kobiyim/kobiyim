    <header id="page-topbar">
        <div class="layout-width">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box horizontal-logo">
                        <a href="{{ url('/') }}" wire:navigate class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('images') }}/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('images') }}/logo-dark.png" alt="" height="17">
                            </span>
                        </a>
                        <a href="{{ url('/') }}" wire:navigate class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('images') }}/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('images') }}/logo-light.png" alt="" height="17">
                            </span>
                        </a>
                    </div>
                    <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger material-shadow-none" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                    </span>
                    </button>
                    <!-- SEARCH BOX -->
                </div>
                <div class="d-flex align-items-center">
                    <!-- DROPDOWN ITEMS -->
                    @include('components.partials.user')
                </div>
            </div>
        </div>
    </header>