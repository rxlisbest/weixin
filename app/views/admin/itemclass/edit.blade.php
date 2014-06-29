
@extends('admin.public.base')
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
@section('page-content')
<div class="page-header position-relative">
    <h1>添加商品分类<small><i class="icon-double-angle-right"></i> add classification of goods</small></h1>
</div>

<div class="row-fluid">
    <div class="span12">
        <form action="{{ URL::to('itemclass/edit') }}/{{$class->id}}" method="POST" class="form-horizontal">

            {{ Session::get('message') }}

            @foreach($errors->all() as $error)
            <div class="alert alert-error">
                <button class="close" type="button" data-dismiss="alert">
                    <i class="icon-remove"></i>
                </button>
                <i class="icon-remove"></i>
                {{ $error }}
            </div>
            @endforeach

            <div class="control-group">
                <label for="name" class="control-label">分类名称</label>
                <div class="controls">
                    <input type="text" name="name" id="name" placeholder="name" value="{{ $class->name}}">
                </div>
            </div>
            
            <div class="control-group">
                <label for="is_index" class="control-label">首页显示</label>
                <div class="controls">
                    <label>
                        <input type="radio" name="is_index" value="0" 
                        @if($class->is_index == 0)
                            checked    
                        @endif
                        ><span class="lbl">不显示</span>
                    </label>
                    <label>
                        <input type="radio" name="is_index" value="1"
                        @if($class->is_index == 1)
                            checked    
                        @endif
                        ><span class="lbl">显示</span>
                    </label>
                </div>
            </div>

            <div class="control-group">
                <label for="status" class="control-label">审核状态</label>
                <div class="controls">
                    <label>
                        <input type="radio" name="status" value="0" 
                        @if($class->status == 0)
                            checked    
                        @endif
                        ><span class="lbl">未审核</span>
                    </label>
                    <label>
                        <input type="radio" name="status" value="1"
                        @if($class->status == 1)
                            checked    
                        @endif
                        ><span class="lbl">己审核</span>
                    </label>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-info">
                    <i class="icon-ok bigger-110"></i>
                    提交
                </button>
                <button class="btn" type="reset">
                    <i class="icon-undo bigger-110"></i>
                    Reset
                </button>
            </div>
        </form>
    </div>
</div>
@stop
