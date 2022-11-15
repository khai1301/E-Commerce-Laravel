<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm danh mục</title>
    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
        @include('admin.left_side_bar_menu')
        </div>

        <!-- top navigation -->
       @include('admin.top_nav')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
              <div class="page-title">
                <div class="title_left">
                  <h3>Tables <small>Some examples to get you started</small></h3>
                </div>
  
                <div class="title_right">
                  <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
  
              <div class="clearfix"></div>
  
              <div class="row" style="display: block;">
            
                <div class="col-md-12 col-sm-12  ">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Bordered table <small>Bordered table subtitle</small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Settings 1</a>
                              <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
  
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <?php foreach ($configs as $config ) { ?>
                              <th><?=$config['name']?></th>
                              <?php } ?>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($records as $record) {
                            ?>
                          <tr>
                            <?php foreach ($configs as $config ) { ?>
                              <?php switch($config['type']){
                                   case "text":?>
                                        <td><? =$record[$config['field']] ?></td>
                                      <?php
                                         break;
                                    case "number":?>
                                          <td><? =$record[$config['field']] ?></td>
                                          <?php
                                         break;

                                    case "image": ?>
                                          <td><? =$record[$config['field']] ?></td>
                                          <?php
                                         break;
                               } ?>
                            <?php } ?>

                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
  
                    </div>
                  </div>
                </div>
  
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        <!-- /page content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="/vendors/Flot/jquery.flot.js"></script>
    <script src="/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="/vendors/Flot/jquery.flot.time.js"></script>
    <script src="/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="/vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/vendors/moment/min/moment.min.js"></script>
    <script src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/admin.js') }}"></script>
  </body>
</html>