    <form class="app-search d-none d-md-block">
        <div class="position-relative">
            <input type="text" class="form-control" placeholder="Search..." autocomplete="off" id="search-options" value="">
            <span class="mdi mdi-magnify search-widget-icon"></span>
            <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
        </div>
        <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
            <div data-simplebar style="max-height: 320px;">
                <!-- item-->
                <div class="dropdown-header">
                    <h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
                </div>
                <div class="dropdown-item bg-transparent text-wrap">
                    <a href="{{ url('/') }}" wire:navigate class="btn btn-soft-secondary btn-sm rounded-pill">how to setup <i class="mdi mdi-magnify ms-1"></i></a>
                    <a href="{{ url('/') }}" wire:navigate class="btn btn-soft-secondary btn-sm rounded-pill">buttons <i class="mdi mdi-magnify ms-1"></i></a>
                </div>
                <!-- item-->
                <div class="dropdown-header mt-2">
                    <h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
                </div>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                <span>Analytics Dashboard</span>
                </a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                <span>Help Center</span>
                </a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                <span>My account settings</span>
                </a>
                <!-- item-->
                <div class="dropdown-header mt-2">
                    <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                </div>
                <div class="notification-list">
                    <!-- item -->
                    <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                        <div class="d-flex">
                            <img src="{{ asset('images') }}/users/avatar-2.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                            <div class="flex-grow-1">
                                <h6 class="m-0">Angela Bernier</h6>
                                <span class="fs-11 mb-0 text-muted">Manager</span>
                            </div>
                        </div>
                    </a>
                    <!-- item -->
                    <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                        <div class="d-flex">
                            <img src="{{ asset('images') }}/users/avatar-3.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                            <div class="flex-grow-1">
                                <h6 class="m-0">David Grasso</h6>
                                <span class="fs-11 mb-0 text-muted">Web Designer</span>
                            </div>
                        </div>
                    </a>
                    <!-- item -->
                    <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                        <div class="d-flex">
                            <img src="{{ asset('images') }}/users/avatar-5.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                            <div class="flex-grow-1">
                                <h6 class="m-0">Mike Bunch</h6>
                                <span class="fs-11 mb-0 text-muted">React Developer</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="text-center pt-3 pb-1">
                <a href="pages-search-results.html" class="btn btn-primary btn-sm">View All Results <i class="ri-arrow-right-line ms-1"></i></a>
            </div>
        </div>
    </form>