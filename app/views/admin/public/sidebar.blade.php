@section('sidebar')
<div id="sidebar">
    <div id="sidebar-shortcuts">
        <div id="sidebar-shortcuts-large">
            <button class="btn btn-small btn-success"><i class="icon-signal"></i></button>
            <button class="btn btn-small btn-info"><i class="icon-pencil"></i></button>
            <button class="btn btn-small btn-warning"><i class="icon-group"></i></button>
            <button class="btn btn-small btn-danger"><i class="icon-cogs"></i></button>
        </div>
        <div id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>
            <span class="btn btn-info"></span>
            <span class="btn btn-warning"></span>
            <span class="btn btn-danger"></span>
        </div>
    </div><!-- #sidebar-shortcuts -->
	{{$sidebar}}
    <ul class="nav nav-list">
        <li>
            <a href="{{ URL::to('setting') }}">
                <i class="icon-dashboard"></i>
                <span>系统设置</span>
            </a>
        </li>
    </ul><!--/.nav-list-->

    <div id="sidebar-collapse"><i class="icon-double-angle-left"></i></div>
</div><!--/#sidebar-->
@stop
