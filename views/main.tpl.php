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
                <h1 class="text-center login-title">Вход</h1>
                <div class="account-wall">
                    <img class="profile-img" src="/images/user-login.png" alt="">
                    <form method="post" class="form-signin" id="form-signin" name="form-signin">
                        <input type="hidden" name="action" value="login">
                        <?php if (!empty($pageData['loginError'])) : ?>
                            <p><?php echo $pageData['loginError']; ?></p>
                        <?php endif; ?>
                        <input type="text" name="login" class="form-control" id="login" placeholder="Логин" required
                               autofocus>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Пароль"
                               required>
                        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Вход"/>
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
<script src="/js/script.js"></script>
</body>
</html>
