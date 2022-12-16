<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
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
    <link rel="stylesheet" href="{{ asset('css/QuanLy/listing.css') }}">
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
                    <h3><?= $title ?></h3>
                    <form class="filter-form" action="{{ route('listing.index', ['model'=>$modelName]) }}" method="POST">
                      @csrf
                        <fieldset>
                            <legend>Tìm kiếm:</legend>
                            <?php
                            foreach ($configs as $config) {
                                if (!empty($config['filter'])) {
                                    switch ($config['filter']) {
                                        case "equal":
                                            ?>
                                            <div class="filter-item">
                                                <label><?= $config['name'] ?>: </label>
                                                <input type="text" name="<?= $config['field'] ?>" value="<?= (!empty($config['filter_value'])) ? $config['filter_value'] : "" ?>" />
                                            </div>
                                            <?php
                                            break;
                                        case "like":
                                            ?>
                                            <div class="filter-item">
                                                <label><?= $config['name'] ?>: </label>
                                                <input type="text" name="<?= $config['field'] ?>" value="<?= (!empty($config['filter_value'])) ? $config['filter_value'] : "" ?>" />
                                            </div>
                                            <?php
                                            break;
                                        case "between":
                                            ?>
                                            <div class="filter-item">
                                                <label><?= $config['name'] ?> từ: </label>
                                                <input type="text" name="<?= $config['field'] ?>[from]" value="<?= (!empty($config['filter_from_value'])) ? $config['filter_from_value'] : "" ?>" />
                                                <label>Đến: </label>
                                                <input type="text" name="<?= $config['field'] ?>[to]" value="<?= (!empty($config['filter_to_value'])) ? $config['filter_to_value'] : "" ?>" />
                                            </div>
                                            <?php
                                            break;
                                    }
                                }
                            }
                            ?>
                            <button type="submit" class="btn btn-primary">Tìm</button>
                        </fieldset>
                    </form>
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
                                            <?php foreach ($configs as $config) { ?>
                                                <?php if (!empty($config['sort'])) { ?>
                                                    <?php if ($orderBy['field'] == $config['field']) { ?>
                                                        <?php if ($orderBy['sort'] == "desc") { ?>
                                                            <th><?= $config['name'] ?><a class="sort-icon" href="{{route('listing.index',['model'=>$modelName,'sort'=>$config['field'].'_asc'])}}"><i class="fa fa-sort-desc" aria-hidden="true"></i></a></th>
                                                        <?php } else { ?>
                                                            <th><?= $config['name'] ?><a class="sort-icon" href="{{route('listing.index',['model'=>$modelName,'sort'=>$config['field'].'_desc'])}}"><i class="fa fa-sort-asc" aria-hidden="true"></i></a></th>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <th><?= $config['name'] ?><a class="sort-icon" href="{{route('listing.index',['model'=>$modelName,'sort'=>$config['field'].'_desc'])}}"><i class="fa fa-sort" aria-hidden="true"></i></a></th>   
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <th><?= $config['name'] ?></th>       
                                                <?php } ?>
                                        <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php foreach ($records as $record) {
                                                ?>
                                            <tr>
                                                <?php foreach ($configs as $config) { ?>
                                                    <?php
                                                    switch ($config['type']) {
                                                        case "text":
                                                            ?>
                                                            <td><?= $record[$config['field']] ?></td>
                                                            <?php
                                                            break;
                                                        case "image":
                                                            ?>
                                                            <td><img height="75" onerror="this.src='/admin_images/no-avatar.png'" src="<?= $record[$config['field']] ?>" /></td>
                                                            <?php
                                                            break;
                                                        case "number":
                                                            ?>
                                                            <td><?= number_format($record[$config['field']], 0, ',', '.') ?></td>
                                                            <?php
                                                            break;
                                                         case "bit":
                                                            ?>
                                                            <td><?= $record[$config['field']] ?></td>
                                                            <?php
                                                            break;
                                                        case "copy":
                                                            ?>
                                                            <td><a href="#"><i class="fa fa-clone" aria-hidden="true"></i>&nbsp;Copy</a></td>
                                                            <?php
                                                            break;
                                                        case "edit":
                                                            ?>
                                                            <td><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Sửa</a></td>
                                                            <?php
                                                            break;
                                                        case "delete":
                                                            ?>
                                                            <td><a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Xóa</a></td>
                                                            <?php
                                                            break;
                                                    }
                                                    ?>
                <?php } ?>
                                            </tr>
                                <?php } ?>
                                    </tbody>
                                </table>
                                <?= $records->links('pagination::bootstrap-4') ?>
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
