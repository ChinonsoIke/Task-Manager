<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <h3 class="brand-text font-weight-light">Task Manager</h3>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">

                <a href="{{route('tasks.index')}}" class="{{ Request::is('tasks', 'tasks/create') ? 'nav-link active' :  'nav-link' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                    Tasks
                    <i class="fas fa-angle-right right"></i>
                    </p>
                </a>

                <li class="nav-item has-treeview">
                    <a href="{{route('projects.index')}}" class="{{ Request::is('projects', 'projects/create') ? 'nav-link active' :  'nav-link' }}" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Projects
                        <i class="fas fa-angle-right right"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @foreach ($projs as $proj)
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{$proj->name}}</p>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
            
            </li>
        </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>