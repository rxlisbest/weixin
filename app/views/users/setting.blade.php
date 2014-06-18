@section('page-content')
<div class="page-header position-relative">
    <h1>系统配置<small><i class="icon-double-angle-right"></i> setting</small></h1>
</div>

<div class="row-fluid">
    <div class="span12">
        <form action="{{ URL::to('setting') }}" method="POST" class="form-horizontal">

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
                <label for="AppID" class="control-label">AppID</label>
                <div class="controls">
                    <input type="text" name="AppID" id="AppID" placeholder="appID" value="{{ $user->appID }}">
                </div>
            </div>
            <div class="control-group">
                <label for="appsecret" class="control-label">AppSecret</label>
                <div class="controls">
                    <input type="text" name="AppSecret" id="AppSecret" placeholder="AppSecret" value="{{ $user->appsecret }}">
                </div>
            </div>
            <div class="control-group">
                <label for="Token" class="control-label">Token</label>
                <div class="controls">
                    <input type="text" name="Token" id="Token" placeholder="Token" value="{{ $user->token }}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="MsgType">自动回复格式</label>
                <div class="controls">
                    <select name="MsgType" id="MsgType">
                        <option value="Text">文本</option>
                        <!--<option value="Image">图片</option>-->
                        <!--<option value="Voice">语音</option>-->
                        <!--<option value="Video">视频</option>-->
                        <!--<option value="Music">音乐</option>-->
                        <!--<option value="News">图文</option>-->
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label for="Text" class="control-label">自动回复内容</label>
                <div class="controls">
                    <input type="text" name="Text" id="Text" placeholder="Hellow,World">
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
