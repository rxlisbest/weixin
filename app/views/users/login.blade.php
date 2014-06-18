@extends('layouts.login')

@section('content')
    <div id="login-box" class="visible widget-box no-border">
        <div class="widget-body">
            <div class="widget-main">
            <h4 class="header lighter bigger"><i class="icon-coffee green"></i> Please Enter Your Information</h4>

            @if(Session::has('message'))
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="icon-remove"></i>
                    </button>
                    {{ Session::get('message') }}
                </div>
            @endif

            <div class="space-6"></div>
                {{ Form::open(array('url'=>'users/login', 'class'=>'form-signin')) }}
                    <fieldset>
                        <label>
                            <span class="block input-icon input-icon-right">
                                {{ Form::text('username', null, array('class'=>'span12', 'placeholder'=>'Username')) }}
                                <i class="icon-user"></i>
                            </span>
                        </label>
                        <label>
                            <span class="block input-icon input-icon-right">
                                {{ Form::password('password', array('class'=>'span12', 'placeholder'=>'Password')) }}
                                <i class="icon-lock"></i>
                            </span>
                        </label>
                        <div class="space"></div>
                        <div class="row-fluid">
                            <label class="span8">
                                <input type="checkbox"><span class="lbl"> Remember Me</span>
                            </label>
                            <button class="span4 btn btn-small btn-primary"><i class="icon-key"></i> Login</button>
                        </div>
                    </fieldset>
                {{ Form::close() }}
            </div><!--/widget-main-->

            <div class="toolbar clearfix">
                <div>
                    <a href="#" class="forgot-password-link"><i class="icon-arrow-left"></i> I forgot my password</a>
                </div>
                <div>
                    <a href="{{ URL::to('users/register') }}" class="user-signup-link">I want to register <i class="icon-arrow-right"></i></a>
                </div>
            </div>
        </div><!--/widget-body-->
    </div><!--/login-box-->
@stop
