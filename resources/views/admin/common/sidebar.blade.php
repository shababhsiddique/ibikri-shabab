<ul class="sidebar-menu" data-widget="tree">

    <li class="{{ Request::is('admin') ? 'active' : '' }}">
        <a href="{{url('admin')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="treeview {{ ( Request::is('admin/sample/*') ) ? 'active menu-open' : '' }}">
        <a href="#">
            <i class="fa fa-archive"></i> <span>Sample Pages</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">            
            <li class="{{ Request::is('admin/sample/table') ? 'active' : '' }}"><a href="{{url('admin/sample/table')}}"><i class="fa fa-wpforms"></i> List Products</a></li>
            <li class="{{ Request::is('admin/sample/form') ? 'active' : '' }}"><a href="{{url('admin/sample/form')}}"><i class="fa fa-archive"></i> Create Product</a></li>
        </ul>
    </li>
    
</ul>