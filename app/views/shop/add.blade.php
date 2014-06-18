@section('page-content')
<div class="page-header position-relative">
    <h1>添加商品<small><i class="icon-double-angle-right"></i> add items</small></h1>
</div>

<div class="row-fluid">
    <div class="span12">
        <form action="{{ URL::to('shop/add') }}" method="POST" class="form-horizontal">

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
                <label for="name" class="control-label">商品名称</label>
                <div class="controls">
                    <input type="text" name="name" id="name" placeholder="name" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="class_path">所属分类</label>
                <div class="controls">
                    <select name="class_path" id="class_path">
            		@foreach($classes as $class)
                        <option value="{{$class->path}}">{{$class->name}}</option>
            		@endforeach
                        <!--<option value="Image">图片</option>-->
                        <!--<option value="Voice">语音</option>-->
                        <!--<option value="Video">视频</option>-->
                        <!--<option value="Music">音乐</option>-->
                        <!--<option value="News">图文</option>-->
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label for="standard_price" class="control-label">市场价</label>
                <div class="controls">
                    <input type="text" name="standard_price" id="standard_price" placeholder="￥0.00" value="">
                </div>
            </div>

            <div class="control-group">
                <label for="retail_price" class="control-label">折扣价</label>
                <div class="controls">
                    <input type="text" name="retail_price" id="retail_price" placeholder="￥0.00" value="">
                </div>
            </div>

            <div class="control-group">
                <label for="number" class="control-label">库存</label>
                <div class="controls">
                    <input type="text" name="number" id="number" placeholder="" value="">
                </div>
            </div>

            <div class="control-group">
                <label for="detail" class="control-label">商品详情</label>
                <div class="controls">
			<textarea id="editor_id" name="detail" style="width:700px;height:500px;"></textarea>
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
