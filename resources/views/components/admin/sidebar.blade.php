<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li class="{{ request()->routeIs('admin.dashboard*') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="iconsminds-shop-4"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.certificates*') ? 'active' : '' }}">
                    <a href="#layouts">
                        <i class="iconsminds-digital-drawing"></i>
                        Certificates
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.roles*') | request()->routeIs('admin.users*') ? 'active' : '' }}">
                    <a href="#ui">
                        <i class="iconsminds-air-balloon-1"></i> Admin
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sub-menu">
        <div class="scroll">
            <ul class="list-unstyled" data-link="layouts" id="layouts">
                <div id="collapseAuthorization" class="collapse show">
                    <ul class="list-unstyled inner-level-menu">
                        <li class="{{ request()->routeIs('admin.certificates.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.certificates.index') }}">
                                <i class="iconsminds-files"></i> <span class="d-inline-block">Certificates</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('admin.certificates.search') ? 'active' : '' }}">
                            <a href="{{ route('admin.certificates.search') }}">
                                <i class="simple-icon-magnifier"></i> <span class="d-inline-block">Search
                                    Certificate</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('admin.certificates.uploadauto') ? 'active' : '' }}">
                            <a href="{{ route('admin.certificates.uploadauto') }}">
                                <i class="iconsminds-qr-code"></i> <span class="d-inline-block ">Upload(QR Code
                                    Auto)</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('admin.certificates.uploadmanual') ? 'active' : '' }}">
                            <a href="{{ route('admin.certificates.uploadmanual') }}">
                                <i class="simple-icon-cloud-upload"></i> <span class="d-inline-block">Upload(QR Code
                                    Manual)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </ul>
            <ul class="list-unstyled" data-link="ui" id="ui">
                <div id="collapseAuthorization" class="collapse show">
                    <ul class="list-unstyled inner-level-menu">
                        <li class="{{ request()->routeIs('admin.roles*') ? 'active' : '' }}">
                            <a href="{{ route('admin.roles.index') }}">
                                <i class="simple-icon-doc"></i> <span class="d-inline-block">Admin Roles</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                            <a href="{{ route('admin.users.index') }}">
                                <i class="simple-icon-doc"></i> <span class="d-inline-block active">Admin Users</span>
                            </a>
                        </li>
                    </ul>
                </div>
                </li>
            </ul>
        </div>
    </div>
</div>