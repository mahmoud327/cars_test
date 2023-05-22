<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">

            <img width="100" src="{{asset('logo/4.png')}}" alt="">


        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons ti ti-dashboard"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->
        <!-- <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                            <div data-i18n="Layouts">Layouts</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="layouts-collapsed-menu.html" class="menu-link">
                                    <div data-i18n="Collapsed menu">Collapsed menu</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-content-navbar.html" class="menu-link">
                                    <div data-i18n="Content navbar">Content navbar</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                                    <div data-i18n="Content nav + Sidebar">Content nav + Sidebar</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../horizontal-menu-template" class="menu-link" target="_blank">
                                    <div data-i18n="Horizontal">Horizontal</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-without-menu.html" class="menu-link">
                                    <div data-i18n="Without menu">Without menu</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-without-navbar.html" class="menu-link">
                                    <div data-i18n="Without navbar">Without navbar</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-fluid.html" class="menu-link">
                                    <div data-i18n="Fluid">Fluid</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-container.html" class="menu-link">
                                    <div data-i18n="Container">Container</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="layouts-blank.html" class="menu-link">
                                    <div data-i18n="Blank">Blank</div>
                                </a>
                            </li>
                        </ul>
                    </li> -->

        <!-- Apps & Pages -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">User &amp; Companies</span>
        </li>
        <li class="menu-item">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div>Users</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('companies.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div>Companies</div>
            </a>
        </li>
        {{-- categories makes models --}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Categories &amp; Makes</span>
        </li>
        <li class="menu-item">
            <a href="{{ route('categories.index',['type'=>'car']) }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div>Categories</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('categories.index',['type'=>'make']) }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div>Makes</div>
            </a>
        </li>
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Features &amp; Tags</span>
        </li>
        <li class="menu-item">
            <a href="{{ route('features.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div>Features</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('tags.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div>Tags</div>
            </a>
        </li>




        {{-- <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Payment &amp; Plan</span>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-map"></i>
                <div data-i18n="Payment &amp; Plan">Payment &amp; Plan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-plus"></i>
                        <div>Add Payment Plan</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-wallet"></i>
                        <div>Payment Plan</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-cash"></i>
                        <div>Payment History</div>
                    </a>
                </li>
            </ul>
        </li> --}}

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages &amp; Contents</span>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-map"></i>
                <div data-i18n="Pages &amp; Contents">Pages &amp; Contents</div>
            </a>
            <ul class="menu-sub">
            <li class="menu-item">
            <a href="{{route('pages.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-album"></i>
                <div>Pages</div>
            </a>
        </li>

            </ul>
        </li>

        <li class="menu-item">
            <a href="{{ route('admin.logout') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-logout"></i>
                <div>logout</div>
            </a>
        </li>



        <!-- Forms -->


    </ul>
</aside>
