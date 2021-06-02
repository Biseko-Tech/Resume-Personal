<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="{{ route('dashboard') }}">
                <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                        <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                </svg>
                <span class="brand-name">Resume Dashboard</span>
            </a>
        </div>

        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">

            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li  class="{{ request()->is('home/details', 'home/create', 'title/details', 'title/create', 'message/details') ? 'has-sub active expand' : '' }}" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Home</span> <b class="caret"></b>
                    </a>
                    <ul  class="{{ request()->is('home/details', 'home/create', 'title/details', 'title/create', 'message/details') ? 'collapse show' : 'collapse hide' }}"  id="dashboard" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li  class="{{ request()->is('home/details', 'home/create') ? 'active' : '' }}" >
                                <a class="sidenav-item-link" href="{{ route('home.index') }}">
                                    <span class="nav-text">Details</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('title/details', 'title/create') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('title.index') }}">
                                    <span class="nav-text">Titles</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('users') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('users.index') }}">
                                    <span class="nav-text">Users</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('message/details') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('message.index') }}">
                                    <span class="nav-text">Message</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>

                <li  class="{{ request()->is('about/details', 'about/create', 'education/details', 'education/create', 'experience/details', 'experience/create', 'service/details', 'service/create', 'portfolio/details', 'portfolio/create', 'review/details', 'review/create', 'contact/details', 'contact/create') ? 'has-sub active expand' : '' }}" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#contents" aria-expanded="false" aria-controls="contents">
                        <i class="mdi mdi-archive"></i>
                        <span class="nav-text">Contents</span> <b class="caret"></b>
                    </a>
                    <ul  class="{{ request()->is('about/details', 'about/create', 'education/details', 'education/create', 'experience/details', 'experience/create', 'service/details', 'service/create', 'portfolio/details', 'portfolio/create', 'review/details', 'review/create', 'contact/details', 'contact/create') ? 'collapse show' : 'collapse hide' }}"  id="contents" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li  class="{{ request()->is('about/details', 'about/create') ? 'active' : '' }}" >
                                <a class="sidenav-item-link" href="{{ route('about.index') }}">
                                    <span class="nav-text">About</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('education/details', 'education/create') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('education.index') }}">
                                    <span class="nav-text">Education</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('experience/details', 'experience/create') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('experience.index') }}">
                                    <span class="nav-text">Experience</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('service/details', 'service/create') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('service.index') }}">
                                    <span class="nav-text">Services</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('portfolio/details', 'portfolio/create') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('portfolio.index') }}">
                                    <span class="nav-text">Portfolio</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('review/details', 'review/create') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('review.index') }}">
                                    <span class="nav-text">Reviews</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('contact/details', 'contact/create') ? 'active' : '' }}">
                                <a class="sidenav-item-link" href="{{ route('contact.index') }}">
                                    <span class="nav-text">Contacts</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>

        <hr class="separator" />
    </div>
</aside>