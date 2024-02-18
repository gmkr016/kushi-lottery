<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href={{route('admin.home')}}>
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> --}}
        <div class="sidebar-brand-text mx-3"><i class="fas fa-smile" style="font-size:40px; vertical-align: middle"></i>
            Admin
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    {{--    <div class="sidebar-heading">--}}
    {{--        Category--}}
    {{--    </div>--}}

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGames" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Games</span>
        </a>
        <div id="collapseGames" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">category</h6> --}}
                <a class="collapse-item" href="{{route('admin.games.create')}}">Add</a>
                <a class="collapse-item" href="{{route('admin.games.index')}}">List</a>
            </div>
        </div>
    </li>
    {{--Agents--}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAgents" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Agents</span>
        </a>
        <div id="collapseAgents" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">category</h6> --}}
                <a class="collapse-item" href="#">Add</a>
                <a class="collapse-item" href="{{route('admin.agents.index')}}">View</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#results" aria-expanded="true"
           aria-controls="archivehistory">
            <i class="fas fa-chart-bar"></i>
            <span>Statistics</span>
        </a>
        <div id="results" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">All Results</h6>

                <a class="collapse-item" href="{{route("admin.statistics.listGames")}}">View Sales</a>
                <a class="collapse-item" href="">View Winners</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
