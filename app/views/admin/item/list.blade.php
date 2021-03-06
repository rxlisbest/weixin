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
    <h1>商品管理<small><i class="icon-double-angle-right"></i> goods</small></h1>
</div>

<div class="row-fluid">
    <div class="span12">
		<table id="table_bug_report" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">
						<label><input type="checkbox" /><span class="lbl"></span></label>
					</th>
					<th>商品名称</th>
					<th>价格</th>
					<th class="hidden-480">库存数量</th>
					<th class="hidden-phone">己售数量</th>
					<th class="hidden-480">所属分类</th>
					<th></th>
				</tr>
			</thead>
									
			<tbody>
			
			@foreach($items as $item)
				<tr>
					<td class='center'>
						<label><input type='checkbox' /><span class="lbl"></span></label>
					</td>
					<td>{{$item->title}}</td>
					<td>￥{{$item->price}}</td>
					<td>{{$item->goods_stock}}</td>
					<td>{{$item->buy_num}}</td>
					<td>{{$item->itemclass->name}}</td>
					<td>
						<div class="inline position-relative">
							<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown"><i class="icon-cog icon-only"></i></button>
							<ul class="dropdown-menu dropdown-icon-only dropdown-light pull-right dropdown-caret dropdown-close">
								<li><a href="{{URL::to('item/edit')}}/{{$item->id}}" class="tooltip-success" data-rel="tooltip" title="Edit" data-placement="left"><span class="green"><i class="icon-edit"></i></span></a></li>
								<!--li><a href="#" class="tooltip-warning" data-rel="tooltip" title="Flag" data-placement="left"><span class="blue"><i class="icon-flag"></i></span> </a></li-->
								<li><a href="{{URL::to('item/del')}}/{{$item->id}}" class="tooltip-error" data-rel="tooltip" title="Delete" data-placement="left"><span class="red"><i class="icon-trash"></i></span> </a></li>
							</ul>
						</div>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
    </div>
	{{$pagination}}
</div>
@stop
