<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login Page - Ace Admin</title>
        <meta name="description" content="User login page" />
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
        <!--[if lt IE 9]>
          <link rel="stylesheet" href="/statics/css/ace-ie.min.css" />
        <![endif]-->
    </head>
    <body class="login-layout">
        <div class="container-fluid" id="main-container">
            <div id="main-content">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="login-container">
                            <div class="row-fluid">
                                <div class="center">
                                    <h1><i class="icon-leaf green"></i> <span class="red">Ace</span> <span class="white">Application</span></h1>
                                    <h4 class="blue">&copy; Company Name</h4>
                                </div>
                            </div>

                            <div class="space-6"></div>

                            <div class="row-fluid">
                                <div class="position-relative">
                                    @section('content')
                                    @show
                                </div><!--/position-relative-->
                            </div>
                        </div>
                    </div><!--/span-->
                </div><!--/row-->
            </div>
        </div><!--/.fluid-container-->

        <!-- basic scripts -->
        <script src="/statics/1.9.1/jquery.min.js"></script>
        <script src="/statics/js/bootstrap.min.js"></script>
        <script type="text/javascript">
        window.jQuery || document.write("<script src='/statics/js/jquery-1.9.1.min.js'>\x3C/script>");
        </script>
        <!-- page specific plugin scripts -->

        <!-- inline scripts related to this page -->

    </body>
</html>
