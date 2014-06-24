@section('page-content')
<div class="page-header position-relative">
    <h1>添加商品<small><i class="icon-double-angle-right"></i> add items</small></h1>
</div>

<div class="row-fluid">
    <div class="span12">
        <form action="{{ URL::to('item/add') }}" method="POST" class="form-horizontal">

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
                <label for="title" class="control-label">商品名称</label>
                <div class="controls">
                    <input type="text" name="title" id="title" placeholder="title" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="cate_id">所属分类</label>
                <div class="controls">
                    <select name="cate_id" id="cate_id">
            		@foreach($classes as $class)
                        <option value="{{$class->id}}">{{$class->name}}</option>
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
                <label for="intro" class="control-label">商品简介</label>
                <div class="controls">
                    <textarea name="intro" cols="80" rows="2"></textarea>
                </div>
            </div>

            <div class="control-group">
                <label for="price" class="control-label">商品价格</label>
                <div class="controls">
                    <input type="text" name="price" id="price" placeholder="￥0.00" value="">
                </div>
            </div>

            <div class="control-group">
                <label for="goods_stock" class="control-label">库存</label>
                <div class="controls">
                    <input type="text" name="goods_stock" id="goods_stock" placeholder="" value="">
                </div>
            </div>

            <div class="control-group">
                <label for="appsecret" class="control-label">审核状态</label>
                <div class="controls">
                    <label>
                        <input type="checkbox" name="news"><span class="lbl">新品</span>
                    </label>
                    <label>
                        <input type="checkbox" name="tuijian"><span class="lbl">推荐</span>
                    </label>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="free">运费</label>
                <div class="controls">
                    <select name="free" id="free">
                        <option value="1">卖家承担运费</option>
                        <option value="2">买家承担运费</option>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label for="info" class="control-label">商品详情</label>
                <div class="controls">
			         <textarea id="editor_id" name="info" style="width:700px;height:500px;"></textarea>
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
