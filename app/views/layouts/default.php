<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/font-awesome/css/font-awesome.min.css">
    <script type='text/javascript' src='/public/scripts/jquery.min.js'></script>
    <script type='text/javascript' src="/public/scripts/bootstrap.js"></script>
    <script type='text/javascript' src="/public/scripts/popper.min.js"></script>
    <script type='text/javascript' src='/public/scripts/form.js'></script>
    <title><?= $title ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light pos-fixed" id='mainNav'>
        <a class="navbar-brand" href=''>BookAwesome</a>

        <button aria-controls="navbarResponsive" data-target="#navbarResponsive" data-toggle="collapse" class="navbar-toggler navbar-toggler-right">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id='navbarResponsive' class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class=" nav-item ml-1">
                    <a href="" class="nav-link">
                        <i class='fa fa-fw fa-book'></i>
                        <span class="nav-link-text">Книги</span>
                    </a>
                </li>
                <?php if (($_SESSION['admin'] ?? false)) : ?>
                    <li class=" nav-item navbar-right ml-1">
                        <a href="/admin/login" class="nav-link">
                            <i class='fa fa-fw fa-users'></i>
                            <span class="nav-link-text" href="">Панель администратора</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>


    </nav>
    <?= $content ?>
</body>

</html>