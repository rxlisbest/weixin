@section('page-content')
<div class="page-header position-relative">
    <h1>商品分类管理<small><i class="icon-double-angle-right"></i> classification of goods</small></h1>
</div>

<div class="row-fluid">
    <div class="span12">
		<table id="table_bug_report" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">
						<label><input type="checkbox" /><span class="lbl"></span></label>
					</th>
					<th>分类名称</th>
					<th>分类排序</th>
					<th></th>
				</tr>
			</thead>
									
			<tbody>
			
            			@foreach($items as $item)
				<tr>
					<td class='center'>
						<label><input type='checkbox' /><span class="lbl"></span></label>
					</td>
					<td>{{$item->name}}</td>
					<td>{{$item->sort}}</td>
					<td>
						<div class="inline position-relative">
							<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown"><i class="icon-cog icon-only"></i></button>
							<ul class="dropdown-menu dropdown-icon-only dropdown-light pull-right dropdown-caret dropdown-close">
								<li><a href="{{URL::to('shop/editclass')}}/{{$item->id}}" class="tooltip-success" data-rel="tooltip" title="Edit" data-placement="left"><span class="green"><i class="icon-edit"></i></span></a></li>
								<li><a href="#" class="tooltip-warning" data-rel="tooltip" title="Flag" data-placement="left"><span class="blue"><i class="icon-flag"></i></span> </a></li>
								<li><a href="{{URL::to('shop/delclass')}}/{{$item->id}}" class="tooltip-error" data-rel="tooltip" title="Delete" data-placement="left"><span class="red"><i class="icon-trash"></i></span> </a></li>
							</ul>
						</div>
					</td>
				</tr>
            			@endforeach
			</tbody>
		</table>
    </div>
</div>
@stop
