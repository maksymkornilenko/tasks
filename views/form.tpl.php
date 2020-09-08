<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $pageData['title']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<header>
</header>

<div id="content">
    <div class="container-fluid table-block">
        <div class="row table-cell-block">
            <div class="col-sm-3 col-md-3">
            </div>
            <div class="col-sm-6 col-md-6">
                <h1 class="text-center login-title"><?php echo $pageData['title']; ?></h1>
                <div class="account-wall">
                    <form method="post" class="form-signin form-tasks" action="<?= $pageData['action'] ?>">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Имя пользователя"
                               value="<?= $pageData['task']['name'] ?>" required autofocus>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                               value="<?= $pageData['task']['email'] ?>">
                        <?php if ($_SESSION['user']) { ?>
                            <input type="checkbox" name="status" class="form-control" id="status" <?= $pageData['task']['status']==1 ? 'checked' : '' ?>>
                        <?php } ?>
                        <textarea name="text" class="form-control" id="text" placeholder="Задача"
                                  required><?= $pageData['task']['text'] ?></textarea>
                        <input type="submit" class="btn btn-lg btn-primary btn-block buttonSubmit" value="Сохранить"/>
                    </form>
                </div>
            </div>
            <div class="col-sm-3 col-md-3">
            </div>
        </div>
    </div>
</div>

<footer>
</footer>
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/sweetalert.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>
