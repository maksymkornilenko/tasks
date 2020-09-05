<!DOCTYPE html>
<html lang="ru" data-ng-app="cabinet">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $pageData['title']; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/css/admin/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/admin/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/css/admin/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Кабинет</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <?php if ($_SESSION['user']) { ?>
                        <li><a href="/index/logout"><i class="fa fa-sign-out fa-fw"></i> Выйти</a>
                        </li>
                    <?php } else { ?>
                        <li><a href="/cabinet"><i class="fa fa-sign-out fa-fw"></i> Войти</a>
                        </li>
                    <?php } ?>

                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->
    </nav>

    <div>
        <?php if ($_SESSION['user']) { ?>
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    </div>
                                    <div>Админ</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <!-- /.panel -->
                <div class="panel panel-default">
                    <div class="panel-heading" style="display: flex; justify-content: space-between">
                        <div>
                            <i class="fa fa-bar-chart-o fa-fw"></i> Задачи
                        </div>
                        <a class='btn btn-sm btn-primary btn-toolbar' style="text-align: right" href='/index/create'>Создать</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form method="get" action="/">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">

                                            <thead>
                                            <tr>
                                                <th>Номер</th>
                                                <th>Имя</th>
                                                <th>email</th>
                                                <th>Текст</th>
                                                <th>Статус</th>
                                                <th></th>
                                            </tr>

                                            <tr>

                                                <th></th>
                                                <th><input id="name" name="name" class="form-control" type="text"
                                                           placeholder="Имя" value="<?= $_GET['name'] ?>"></th>
                                                <th><input id="email" name="email" class="form-control" type="text"
                                                           placeholder="Email" value="<?= $_GET['email'] ?>"></th>
                                                <th></th>
                                                <th><select class="form-control" id="status" name="status"
                                                            ng-value="<?= $_GET['status'] ?>">
                                                        <option value="">Выберите статус</option>
                                                        <option <?= $_GET['status'] === "0" ? 'selected' : '' ?>
                                                                value="0">Не проверено
                                                        </option>
                                                        <option <?= $_GET['status'] === "1" ? 'selected' : '' ?>
                                                                value="1">Проверено
                                                        </option>
                                                    </select></th>
                                                <th><input type="submit" class="btn btn-lg btn-primary btn-block"
                                                           value="Поиск"/></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php if ($pageData['tasksOnPage']) {
                                                foreach ($pageData['tasksOnPage'] as $key => $value) {
                                                    echo "<tr>";
                                                    echo "<td>" . $value['id'] . "</td>";
                                                    echo "<td>" . $value['name'] . "</td>";
                                                    echo "<td>" . $value['email'] . "</td>";
                                                    echo "<td>" . $value['text'] . "</td>";
                                                    if ($value['status'] == 1) {
                                                        echo "<td>Проверено</td>";
                                                    } else {
                                                        echo "<td>Не проверено</td>";
                                                    }
                                                    if ($_SESSION['user']) {
                                                        echo "<td><a class='btn btn-sm btn-primary btn-block' href='/index/edit?id=" . $value['id'] . "'>Редактировать</a></td>";
                                                    } else {
                                                        echo "<td></td>";
                                                    }
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr>";
                                                echo "<td colspan='6'>Пусто</td>";
                                                echo "</tr>";
                                            } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <?= $pageData['pagination'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="/js/jquery.js"></script>

<!-- Angular -->
<script src="/js/admin/cabinet.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/js/admin/metisMenu.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/js/admin/sb-admin-2.js"></script>

</body>

</html>
