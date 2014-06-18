<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dashboard - Ace Admin</title>
        <meta name="description" content="overview & stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- basic styles -->
        <link href="/statics/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/statics/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/statics/css/font-awesome.min.css" />
        <!--[if IE 7]>
          <link rel="stylesheet" href="/statics/css/font-awesome-ie7.min.css" />
        <![endif]-->
        <!-- page specific plugin styles -->

        <!-- ace styles -->
        <link rel="stylesheet" href="/statics/css/ace.min.css" />
        <link rel="stylesheet" href="/statics/css/ace-responsive.min.css" />
        <link rel="stylesheet" href="/statics/css/ace-skins.min.css" />
        <!--[if lt IE 9]>
          <link rel="stylesheet" href="/statics/css/ace-ie.min.css" />
        <![endif]-->
    </head>
    <body>
        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
           <div class="container-fluid">
              <a class="brand" href="#"><small><i class="icon-leaf"></i> Ace Admin</small> </a>
              <ul class="nav ace-nav pull-right">
                    <li class="grey">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-tasks"></i>
                            <span class="badge">4</span>
                        </a>
                        <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
                            <li class="nav-header">
                                <i class="icon-ok"></i> 4 Tasks to complete
                            </li>

                            <li>
                                <a href="#">
                                    <div class="clearfix">
                                        <span class="pull-left">Software Update</span>
                                        <span class="pull-right">65%</span>
                                    </div>
                                    <div class="progress progress-mini"><div class="bar" style="width:65%"></div></div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="clearfix">
                                        <span class="pull-left">Hardware Upgrade</span>
                                        <span class="pull-right">35%</span>
                                    </div>
                                    <div class="progress progress-mini progress-danger"><div class="bar" style="width:35%"></div></div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="clearfix">
                                        <span class="pull-left">Unit Testing</span>
                                        <span class="pull-right">15%</span>
                                    </div>
                                    <div class="progress progress-mini progress-warning"><div class="bar" style="width:15%"></div></div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="clearfix">
                                        <span class="pull-left">Bug Fixes</span>
                                        <span class="pull-right">90%</span>
                                    </div>
                                    <div class="progress progress-mini progress-success progress-striped active"><div class="bar" style="width:90%"></div></div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    See tasks with details
                                    <i class="icon-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="purple">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-bell-alt icon-animated-bell icon-only"></i>
                            <span class="badge badge-important">8</span>
                        </a>
                        <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
                            <li class="nav-header">
                                <i class="icon-warning-sign"></i> 8 Notifications
                            </li>

                            <li>
                                <a href="#">
                                    <div class="clearfix">
                                        <span class="pull-left"><i class="icon-comment btn btn-mini btn-pink"></i> New comments</span>
                                        <span class="pull-right badge badge-info">+12</span>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="icon-user btn btn-mini btn-primary"></i> Bob just signed up as an editor ...
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="clearfix">
                                        <span class="pull-left"><i class="icon-shopping-cart btn btn-mini btn-success"></i> New orders</span>
                                        <span class="pull-right badge badge-success">+8</span>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="clearfix">
                                        <span class="pull-left"><i class="icon-twitter btn btn-mini btn-info"></i> Followers</span>
                                        <span class="pull-right badge badge-info">+4</span>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    See all notifications
                                    <i class="icon-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="green">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-envelope-alt icon-animated-vertical icon-only"></i>
                            <span class="badge badge-success">5</span>
                        </a>
                        <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
                            <li class="nav-header">
                                <i class="icon-envelope"></i> 5 Messages
                            </li>

                            <li>
                                <a href="#">
                                    <img alt="Alex's Avatar" class="msg-photo" src="avatars/avatar.png" />
                                    <span class="msg-body">
                                        <span class="msg-title">
                                            <span class="blue">Alex:</span>
                                            Ciao sociis natoque penatibus et auctor ...
                                        </span>
                                        <span class="msg-time">
                                            <i class="icon-time"></i> <span>a moment ago</span>
                                        </span>
                                    </span>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <img alt="Susan's Avatar" class="msg-photo" src="avatars/avatar3.png" />
                                    <span class="msg-body">
                                        <span class="msg-title">
                                            <span class="blue">Susan:</span>
                                            Vestibulum id ligula porta felis euismod ...
                                        </span>
                                        <span class="msg-time">
                                            <i class="icon-time"></i> <span>20 minutes ago</span>
                                        </span>
                                    </span>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <img alt="Bob's Avatar" class="msg-photo" src="avatars/avatar4.png" />
                                    <span class="msg-body">
                                        <span class="msg-title">
                                            <span class="blue">Bob:</span>
                                            Nullam quis risus eget urna mollis ornare ...
                                        </span>
                                        <span class="msg-time">
                                            <i class="icon-time"></i> <span>3:15 pm</span>
                                        </span>
                                    </span>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    See all messages
                                    <i class="icon-arrow-right"></i>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="light-blue user-profile">
                        <a class="user-menu dropdown-toggle" href="#" data-toggle="dropdown">
                            <img alt="Jason's Photo" src="avatars/user.jpg" class="nav-user-photo" />
                            <span id="user_info">
                                <small>Welcome,</small> {{ Auth::user()?Auth::user()->username:'' }}
                            </span>
                            <i class="icon-caret-down"></i>
                        </a>
                        <ul id="user_menu" class="pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
                            <li><a href="#"><i class="icon-cog"></i> Settings</a></li>
                            <li><a href="#"><i class="icon-user"></i> Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ URL::to('users/logout') }}"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
              </ul><!--/.ace-nav-->
           </div><!--/.container-fluid-->
          </div><!--/.navbar-inner-->
        </div><!--/.navbar-->
        <div class="container-fluid" id="main-container">
            <a href="#" id="menu-toggler"><span></span></a><!-- menu toggler -->

	@section('sidebar')
	@show

            <div id="main-content" class="clearfix">

                    <div id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li><i class="icon-home"></i> <a href="#">Home</a><span class="divider"><i class="icon-angle-right"></i></span></li>
                            <li class="active">Dashboard</li>
                        </ul><!--.breadcrumb-->

                        <div id="nav-search">
                            <form class="form-search">
                                    <span class="input-icon">
                                        <input autocomplete="off" id="nav-search-input" type="text" class="input-small search-query" placeholder="Search ..." />
                                        <i id="nav-search-icon" class="icon-search"></i>
                                    </span>
                            </form>
                        </div><!--#nav-search-->
                    </div><!--#breadcrumbs-->

                    <div id="page-content" class="clearfix">
                    @section('page-content')
                    @show
                    </div><!--/#page-content-->

                    <div id="ace-settings-container">
                        <div class="btn btn-app btn-mini btn-warning" id="ace-settings-btn">
                            <i class="icon-cog"></i>
                        </div>
                        <div id="ace-settings-box">
                            <div>
                                <div class="pull-left">
                                    <select id="skin-colorpicker" class="hidden">
                                        <option data-class="default" value="#438EB9">#438EB9</option>
                                        <option data-class="skin-1" value="#222A2D">#222A2D</option>
                                        <option data-class="skin-2" value="#C6487E">#C6487E</option>
                                        <option data-class="skin-3" value="#D0D0D0">#D0D0D0</option>
                                    </select>
                                </div>
                                <span>&nbsp; Choose Skin</span>
                            </div>
                            <div><input type="checkbox" class="ace-checkbox-2" id="ace-settings-header" /><label class="lbl" for="ace-settings-header"> Fixed Header</label></div>
                            <div><input type="checkbox" class="ace-checkbox-2" id="ace-settings-sidebar" /><label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label></div>
                        </div>
                    </div><!--/#ace-settings-container-->
            </div><!-- #main-content -->
        </div><!--/.fluid-container#main-container-->
        <a href="#" id="btn-scroll-up" class="btn btn-small btn-inverse">
            <i class="icon-double-angle-up icon-only"></i>
        </a>
        <!-- basic scripts -->
        <script src="/statics/1.9.1/jquery.min.js"></script>
        <script type="text/javascript">
        window.jQuery || document.write("<script src='/statics/js/jquery-1.9.1.min.js'>\x3C/script>");
        </script>

        <script src="/statics/js/bootstrap.min.js"></script>
        <!-- page specific plugin scripts -->

        <!--[if lt IE 9]>
        <script type="text/javascript" src="/statics/js/excanvas.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="/statics/js/jquery-ui-1.10.2.custom.min.js"></script>
        <script type="text/javascript" src="/statics/js/jquery.ui.touch-punch.min.js"></script>
        <script type="text/javascript" src="/statics/js/jquery.slimscroll.min.js"></script>
        <script type="text/javascript" src="/statics/js/jquery.easy-pie-chart.min.js"></script>
        <script type="text/javascript" src="/statics/js/jquery.sparkline.min.js"></script>
        <script type="text/javascript" src="/statics/js/jquery.flot.min.js"></script>
        <script type="text/javascript" src="/statics/js/jquery.flot.pie.min.js"></script>
        <script type="text/javascript" src="/statics/js/jquery.flot.resize.min.js"></script>
        <!-- ace scripts -->
        <script src="/statics/js/ace-elements.min.js"></script>
        <script src="/statics/js/ace.min.js"></script>
        <script charset="utf-8" src="/statics/kindeditor/kindeditor.js"></script>
        <script charset="utf-8" src="/statics/kindeditor/lang/zh_CN.js"></script>
	<link rel="stylesheet" href="/statics/kindeditor/themes/default/default.css" />
        <!-- inline scripts related to this page -->
	<script type="text/javascript">
		$(function() {
			var editor = KindEditor.create('textarea[name="detail"]',{
				afterBlur: function () { this.sync(); }
			});
		});
		KindEditor.ready(function(K){
			window.editor = K.create('#editor_id');
		});
	</script>

        <script type="text/javascript">

$(function() {
    $('.dialogs,.comments').slimScroll({
        height: '300px'
    });

    $('#tasks').sortable();
    $('#tasks').disableSelection();
    $('#tasks input:checkbox').removeAttr('checked').on('click', function(){
        if(this.checked) $(this).closest('li').addClass('selected');
        else $(this).closest('li').removeClass('selected');
    });
    var oldie = $.browser.msie && $.browser.version < 9;
    $('.easy-pie-chart.percentage').each(function(){
        var $box = $(this).closest('.infobox');
        var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
        var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
        var size = parseInt($(this).data('size')) || 50;
        $(this).easyPieChart({
            barColor: barColor,
            trackColor: trackColor,
            scaleColor: false,
            lineCap: 'butt',
            lineWidth: parseInt(size/10),
            animate: oldie ? false : 1000,
            size: size
        });
    })
    $('.sparkline').each(function(){
        var $box = $(this).closest('.infobox');
        var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
        $(this).sparkline('html', {tagValuesAttribute:'data-values', type: 'bar', barColor: barColor , chartRangeMin:$(this).data('min') || 0} );
    });


  var data = [
    { label: "social networks",  data: 38.7, color: "#68BC31"},
    { label: "search engines",  data: 24.5, color: "#2091CF"},
    { label: "ad campaings",  data: 8.2, color: "#AF4E96"},
    { label: "direct traffic",  data: 18.6, color: "#DA5430"},
    { label: "other",  data: 10, color: "#FEE074"}
  ];
 var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
 $.plot(placeholder, data, {

    series: {
        pie: {
            show: true,
            tilt:0.8,
            highlight: {
                opacity: 0.25
            },
            stroke: {
                color: '#fff',
                width: 2
            },
            startAngle: 2

        }
    },
    legend: {
        show: true,
        position: "ne",
        labelBoxBorderColor: null,
        margin:[-30,15]
    }
    ,
    grid: {
        hoverable: true,
        clickable: true
    },
    tooltip: true, //activate tooltip
    tooltipOpts: {
        content: "%s : %y.1",
        shifts: {
            x: -30,
            y: -50
        }
    }

 });

  var $tooltip = $("<div class='tooltip top in' style='display:none;'><div class='tooltip-inner'></div></div>").appendTo('body');
  placeholder.data('tooltip', $tooltip);
  var previousPoint = null;
  placeholder.on('plothover', function (event, pos, item) {
    if(item) {
        if (previousPoint != item.seriesIndex) {
            previousPoint = item.seriesIndex;
            var tip = item.series['label'] + " : " + item.series['percent']+'%';
            $(this).data('tooltip').show().children(0).text(tip);
        }
        $(this).data('tooltip').css({top:pos.pageY + 10, left:pos.pageX + 10});
    } else {
        $(this).data('tooltip').hide();
        previousPoint = null;
    }

 });
        var d1 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.5) {
            d1.push([i, Math.sin(i)]);
        }
        var d2 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.5) {
            d2.push([i, Math.cos(i)]);
        }
        var d3 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.2) {
            d3.push([i, Math.tan(i)]);
        }

        var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
        $.plot("#sales-charts", [
            { label: "Domains", data: d1 },
            { label: "Hosting", data: d2 },
            { label: "Services", data: d3 }
        ], {
            hoverable: true,
            shadowSize: 0,
            series: {
                lines: { show: true },
                points: { show: true }
            },
            xaxis: {
                tickLength: 0
            },
            yaxis: {
                ticks: 10,
                min: -2,
                max: 2,
                tickDecimals: 3
            },
            grid: {
                backgroundColor: { colors: [ "#fff", "#fff" ] },
                borderWidth: 1,
                borderColor:'#555'
            }
        });
        $('[data-rel="tooltip"]').tooltip();
})
        </script>
    </body>
</html>
