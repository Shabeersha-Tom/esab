<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="iconsminds-shop-4"></i>
                        <span>Dashboards</span>
                    </a>
                </li>

                @if (auth()->user()->can('manage-pages'))
                    <li class="{{ request()->routeIs('pages*') ? 'active' : '' }}">
                        <a href="{{ route('pages.index') }}">
                            <i class="simple-icon-book-open"></i> Pages
                        </a>
                    </li>
                @endif

                @if (auth()->user()->can('manage-courses'))
                    <li class="{{ request()->routeIs('course*') ? 'active' : '' }}">
                        <a href="#courses">
                            <i class="simple-icon-graduation"></i> Courses
                        </a>
                    </li>
                @endif

                @if (auth()->user()->can('manage-openday'))
                    <li class="{{ request()->routeIs('openday*') ? 'active' : '' }}">
                        <a href="#openday">
                            <i class="simple-icon-graduation"></i> Open Day
                        </a>
                    </li>
                @endif

                @if (auth()->user()->can('manage-news'))
                    <li class="{{ request()->routeIs('news*') ? 'active' : '' }}">
                        <a href="#news">
                            <i class="iconsminds-newspaper"></i> News & events
                        </a>
                    </li>
                @endif

                @if (auth()->user()->can('manage-banner'))
                    <li class="{{ request()->routeIs('banner*') ? 'active' : '' }}">
                        <a href="#banner">
                            <i class="iconsminds-photo"></i> Home Banner
                        </a>
                    </li>
                @endif

                @if (auth()->user()->can('manage-gallery'))
                    <li class="{{ request()->routeIs('gallery*') ? 'active' : '' }}">
                        <a href="#gallery">
                            <i class="simple-icon-picture"></i>Gallery
                        </a>
                    </li>
                @endif

                @if (auth()->user()->can('manage-enquiries'))
                    <li class="{{ request()->routeIs('enquiries*') ? 'active' : '' }}">
                        <a href="#enquiries">
                            <i class="simple-icon-question"></i>Enquiries 
                        </a>
                    </li>
                @endif

                @if (auth()->user()->can('manage-users'))
                    <li class="{{ request()->routeIs('users*') ? 'active' : '' }}">
                        <a href="{{ route('users.index') }}">
                            <i class="simple-icon-user"></i> Users
                        </a>
                    </li>
                @endif
                @if (auth()->user()->can('manage-setting'))
                    <li class="{{ request()->routeIs('settings*') ? 'active' : '' }}">
                        <a href="#setting">
                            <i class="simple-icon-settings"></i> Settings
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </div>

    <div class="sub-menu">
        <div class="scroll">

            @if (auth()->user()->can('manage-news'))
                <ul class="list-unstyled" data-link="news" id="news">
                    <li>
                        <a href="{{ route('news.index') }}">
                            <i class="simple-icon-eye"></i>
                            <span class="d-inline-block">View All</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('news.create') }}">
                            <i class="simple-icon-plus"></i>
                            <span class="d-inline-block">Add New</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('newscategory.index') }}">
                            <i class="simple-icon-layers"></i>
                            <span class="d-inline-block">
                                Categories
                            </span>
                        </a>
                    </li>
                </ul>
            @endif

            @if (auth()->user()->can('manage-pages'))
                <ul class="list-unstyled" data-link="pages" id="pages">
                    <li>
                        <a href="{{ route('pages.index') }}">
                            <i class="simple-icon-eye"></i>
                            <span class="d-inline-block">View All</span>
                        </a>
                    </li>
                </ul>
            @endif

            @if (auth()->user()->can('manage-setting'))
                <ul class="list-unstyled" data-link="setting" id="setting">
                    <li>
                        <a href="{{ route('settings.index') }}">
                            <i class="simple-icon-eye"></i>
                            <span class="d-inline-block">Common Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('settings.seo') }}">
                            <i class="simple-icon-eye"></i>
                            <span class="d-inline-block">SEO Setting</span>
                        </a>
                    </li>
                </ul>
            @endif

            @if (auth()->user()->can('manage-gallery'))
                <ul class="list-unstyled" data-link="gallery" id="gallery">
                    <li>
                        <a href="{{ route('gallery.image') }}">
                            <i class="simple-icon-picture"></i>
                            <span class="d-inline-block">Image Gallery</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gallery.video') }}">
                            <i class="iconsminds-video"></i>
                            <span class="d-inline-block">Video Gallery</span>
                        </a>
                    </li>
                </ul>
            @endif

            @if (auth()->user()->can('manage-openday'))
                <ul class="list-unstyled" data-link="openday" id="openday">
                    <li>
                        <a href="{{ route('openday.index') }}">
                            <i class="simple-icon-eye"></i>
                            <span class="d-inline-block">View All</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('openday.create') }}">
                            <i class="simple-icon-plus"></i>
                            <span class="d-inline-block">Add New</span>
                        </a>
                    </li>
                </ul>
            @endif

            @if (auth()->user()->can('manage-banner'))
                <ul class="list-unstyled" data-link="banner" id="banner">
                    <li>
                        <a href="{{ route('banner.index') }}">
                            <i class="simple-icon-eye"></i>
                            <span class="d-inline-block">View All</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('banner.create') }}">
                            <i class="simple-icon-plus"></i>
                            <span class="d-inline-block">Add New</span>
                        </a>
                    </li>
                </ul>
            @endif

            @if (auth()->user()->can('manage-courses'))
                <ul class="list-unstyled" data-link="courses" id="courses">
                    <li>
                        <a href="{{ route('course.index') }}">
                            <i class="simple-icon-eye"></i>
                            <span class="d-inline-block">View All</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('course.create') }}">
                            <i class="simple-icon-plus"></i>
                            <span class="d-inline-block">Add New</span>
                        </a>
                    </li>
                </ul>
            @endif

            @if (auth()->user()->can('manage-enquiries'))
                <ul class="list-unstyled" data-link="enquiries" id="enquiries">
                    <li>
                        <a href="{{ route('enquiries.contact') }}">
                            <i class="simple-icon-eye"></i>
                            <span class="d-inline-block">Contact Page</span>
                        </a>
                    </li>
                </ul>
            @endif

            <ul class="list-unstyled" data-link="layouts" id="layouts">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseAuthorization" aria-expanded="true"
                        aria-controls="collapseAuthorization" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Authorization</span>
                    </a>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="Pages.Auth.Login.html">
                                    <i class="simple-icon-user-following"></i> <span class="d-inline-block">Login</span>
                                </a>
                            </li>
                            <li>
                                <a href="Pages.Auth.Register.html">
                                    <i class="simple-icon-user-follow"></i> <span class="d-inline-block">Register</span>
                                </a>
                            </li>
                            <li>
                                <a href="Pages.Auth.ForgotPassword.html">
                                    <i class="simple-icon-user-unfollow"></i> <span class="d-inline-block">Forgot
                                        Password</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
