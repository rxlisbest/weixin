@section('page-content')
<div class="page-header position-relative">
    <h1>添加商品分类<small><i class="icon-double-angle-right"></i> add classification of goods</small></h1>
</div>

<div class="row-fluid">
    <div class="span12">
        <form action="{{ URL::to('shop/editclass') }}/{{$class->id}}" method="POST" class="form-horizontal">

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
                <label for="AppID" class="control-label">分类名称</label>
                <div class="controls">
                    <input type="text" name="name" id="name" placeholder="name" value="{{ $class->name}}">
                </div>
            </div>
            <div class="control-group">
                <label for="appsecret" class="control-label">分类排序</label>
                <div class="controls">
                    <input type="text" name="sort" id="sort" placeholder="sort" value="{{ $class->sort}}">
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
