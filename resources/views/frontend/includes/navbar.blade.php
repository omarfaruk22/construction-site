<div class="nav-bar">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="{{route('landing')}}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                    <a href="{{route('aboutshow')}}" class="nav-item nav-link {{ Request::is('bg/about') ? 'active' : '' }}">About</a>
                    <a href="{{route('sershow')}}" class="nav-item nav-link {{ Request::is('bg/service-show') ? 'active' : '' }}">Service</a>
                    <a href="{{route('employeeshow')}}" class="nav-item nav-link {{ Request::is('bg/team-show') ? 'active' : '' }}">Team</a>
                    <a href="{{route('projectshow')}}" class="nav-item nav-link {{ Request::is('bg/project-show') ? 'active' : '' }}">Project</a>
                    <a href="{{route('blogshow')}}" class="nav-item nav-link {{ Request::is('all-show') ? 'active' : '' }}">Blog Page</a>
                    <a href="{{route('contactcreate')}}" class="nav-item nav-link {{ Request::is('create') ? 'active' : '' }}">Contact</a>
                </div>
                {{-- <div class="ml-auto">
                    <a class="btn" href="#">Login</a>
                </div> --}}
            </div>
        </nav>
    </div>
</div>