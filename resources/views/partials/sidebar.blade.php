<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                @if (Auth::user())
                    @if (auth()->user()->role_id == 1)
                        <li>
                            <a href="/dashboard">
                                <i data-feather="home"></i>
                                <span data-key="t-dashboard">Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="/books">
                                <i data-feather="grid"></i>
                                <span data-key="t-apps">Books</span>
                            </a>
                        </li>

                        <li>
                            <a href="/users">
                                <i data-feather="users"></i>
                                <span data-key="t-authentication">Users</span>
                            </a>
                        </li>

                        <li>
                            <a href="/categories">
                                <i data-feather="file-text"></i>
                                <span data-key="t-pages">Categories</span>
                            </a>

                        </li>

                        <li>
                            <a href="/rent-logs">
                                <i data-feather="layout"></i>
                                <span data-key="t-horizontal">Rent Logs</span>
                            </a>
                        </li>

                        <li>
                            <a href="/">
                                {{-- <i data-feather="layout"></i> --}}
                                <i class="bx bx-book-content"></i>
                                <span data-key="t-horizontal">Book List</span>
                            </a>
                        </li>
                    @else 
                        <li>
                            <a href="/dashboard-client">
                                <i data-feather="box"></i>
                                <span data-key="t-forms">Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="/">
                                <i data-feather="grid"></i>
                                <span data-key="t-apps">Books</span>
                            </a>
                        </li>

                    @endif
            @else
                <li>
                    <a href="/login">
                        <i data-feather="box"></i>
                        <span data-key="t-forms">Login</span>
                    </a>
                </li>
            @endif
                

            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>