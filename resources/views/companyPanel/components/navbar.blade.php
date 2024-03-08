<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{route('company.dashboard')}}">
                        <i data-feather="home"></i>
                        <span class="badge rounded-pill bg-success-subtle text-success float-end">9+</span>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li class="menu-title" data-key="t-apps">Apps</li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="message-square"></i>
                        <span data-key="t-chat">Jobs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('company.jobList')}}" data-key="t-inbox">All Jobs</a></li>
                        <li><a href="{{route('company.createJob')}}" data-key="t-inbox">Job Create</a></li>
                        <li><a href="{{route('company.jobApplication')}}" data-key="t-read-email">Job Applications</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="message-square"></i>
                        <span data-key="t-chat">Blogs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('blogList')}}" data-key="t-inbox">All Blogs</a></li>
                        <li><a href="{{route('blogCreate')}}" data-key="t-inbox">Blog Create</a></li>

                    </ul>
                </li>


                <li><a class="dropdown-item" href="{{route('company.profile')}}"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a></li>
                <li>
                    <div><form method="POST" action="{{ route('logout') }}">@csrf
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();" ><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                    </form></div>
                </li>

            </ul>


        </div>
        <!-- Sidebar -->
    </div>
</div>
