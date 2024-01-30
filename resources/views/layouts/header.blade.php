<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{ url('') }}"><img
                src="{{ asset('images/Logo.png') }}" style="height:61px;background-color: #fff;"></a>
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">

            <!-- User Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
                    aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <!-- <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li> -->
                    <li><a class="dropdown-item" href=""><i class="fa fa-user fa-lg"></i>
                            <?php if (Auth::check()) {
                                echo Auth::user()->name;
                            } ?></a></li>
                    <li><a class="dropdown-item" href="{{ route('changePasswordGet') }}"><i class="fa fa-key"
                                aria-hidden="true"></i>Change Password </a></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-lg"></i> Log Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}</form>
                    </li>

                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ asset('images/profile.jpg') }}"
                alt="User Image" style="width:40px;height:40px;">
            <div>
                <p class="app-sidebar__user-name"><?php echo Auth::user()->name; ?></p>
                <p class="app-sidebar__user-designation">
                    @if (Auth::user()->role == 1)
                        Administrator
                    @elseif (Auth::user()->role == 2)
                        IT
                    @elseif (Auth::user()->role == 3)
                        Employee
                    @elseif (Auth::user()->role == 4)
                        Support
                    @elseif (Auth::user()->role == 5)
                        HR
                    @endif
                </p>
            </div>
        </div>
        <ul class="app-menu">

            @if (Auth::user()->role != 2 &&Auth::user()->role != 5 && Auth::user()->role != 4)
                <li>
                    <a class="app-menu__item " href="{{ url('') }}/">
                        <i class="app-menu__icon fa fa-dashboard"></i>
                        <span class="app-menu__label">Dashboard</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role != 5 || Auth::user()->role != 2)
                <li>
                    <a class="app-menu__item" href="{{ url('support_view') }}">
                        <i class="app-menu__icon fa fa-support"></i>
                        <span class="app-menu__label">Support</span>
                    </a>
                </li>
            @endif
            {{-- Auth::user()->role != 2 &&  --}}
            @if (Auth::user()->role != 2 && Auth::user()->role != 3 && Auth::user()->role != 4 && Auth::user()->role != 5)
                <li>
                    <a class="app-menu__item" href="{{ url('support_emails') }}">
                        <i class="app-menu__icon fa fa-envelope"></i>
                        <span class="app-menu__label">Emails</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role != 2 && Auth::user()->role != 1 && Auth::user()->role != 4 && Auth::user()->role != 5)
                <li>
                    <a class="app-menu__item" href="{{ url('timesheets') }}">
                        <i class="app-menu__icon fa fa-clock-o"></i>
                        <span class="app-menu__label">Timesheets</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role != 2 && Auth::user()->role != 4 && Auth::user()->role != 5)
                <li>
                    <a class="app-menu__item" href="{{ url('timesheets_list') }}">
                        <i class="app-menu__icon fa fa-clock-o"></i>
                        <span class="app-menu__label">Timesheets List</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 1 && Auth::user()->role != 4)
                <li>
                    <a class="app-menu__item" href="{{ url('report') }}">
                        <i class="app-menu__icon fa fa-server"></i>
                        <span class="app-menu__label">Report</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 3 || Auth::user()->role == 5 || Auth::user()->role == 2)
                <li>
                    <a class="app-menu__item" href="{{ url('emp_edit', Auth::user()->id) }}">
                        <i class="app-menu__icon fa fa-users"></i>
                        <span class="app-menu__label">Employee Info</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role == 5 || Auth::user()->role == 1)
                <li>
                    <a class="app-menu__item" href="{{ url('users_list') }}">
                        <i class="app-menu__icon fa fa-users"></i>
                        <span class="app-menu__label">Employee details</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 5 || Auth::user()->role == 1 || Auth::user()->role == 3 || Auth::user()->role == 2)
                <li>
                    <a class="app-menu__item" href="{{ url('assets') }}">
                        <i class="app-menu__icon fa fa-server"></i>
                        <span class="app-menu__label">Assets</span>
                    </a>
                </li>
            @endif

        </ul>
    </aside>

    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.tableTools.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.editor.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.colReorder.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jszip.min.js') }}"></script>
    <script src="{{ asset('js/plugins/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dt/fnPagingInfo.js') }}?r=<?php echo time(); ?>"></script>
