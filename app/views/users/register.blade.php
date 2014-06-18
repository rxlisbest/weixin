@extends('layouts.login')

@section('content')
    <div id="signup-box" class="visible widget-box no-border">
        <div class="widget-body">
            <div class="widget-main">
                <h4 class="header green lighter bigger"><i class="icon-group blue"></i> New User Registration</h4>
                <div class="space-6"></div>
                <p>Enter your details to begin:</p>
                {{ Form::open(array('url'=>'users/register', 'class'=>'form-signin')) }}
                    <fieldset>
                        <label>
            		@if(Session::has('message'))
                    		{{ Session::get('message') }}
            		@endif
                            <font color="red">Email</font>
                            <span class="block input-icon input-icon-right">
                                <input type="email" class="span12" placeholder="Email" required/>
                                <i class="icon-envelope"></i>
                            </span>
                        </label>
                    <label>
                        <font color="red">Username</font>
                        <span class="block input-icon input-icon-right">
                            <input type="text" class="span12" placeholder="Username" required/>
                            <i class="icon-user"></i>
                        </span>
                    </label>
                    <label>
                        <font color="red">Password</font>
                        <span class="block input-icon input-icon-right">
                            <input type="password" class="span12" placeholder="Password" required/>
                            <i class="icon-lock"></i>
                        </span>
                    </label>
                    <label>
                        <font color="red">Repeat Password</font>
                        <span class="block input-icon input-icon-right">
                            <input type="password" class="span12" placeholder="Repeat password" required/>
                            <i class="icon-retweet"></i>
                        </span>
                    </label>

                    <label>
                        <input type="checkbox"><span class="lbl"> I accept the <a href="#">User Agreement</a></span>
                    </label>

                    <div class="space-24"></div>

                    <div class="row-fluid">
                        <button type="reset" class="span6 btn btn-small"><i class="icon-refresh"></i> Reset</button>
                        <button class="span6 btn btn-small btn-success">Register <i class="icon-arrow-right icon-on-right"></i></button>
                    </div>

                    </fieldset>
                {{ Form::close() }}
            </div>

            <div class="toolbar center">
                <a href="{{ URL::to('users/login'); }}" class="back-to-login-link"><i class="icon-arrow-left"></i> Back to login</a>
            </div>
        </div><!--/widget-body-->
    </div><!--/signup-box-->
@stop
