<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/admin.css">
    <link rel="stylesheet" href="/public/font-awesome/css/font-awesome.min.css">
    <script type='text/javascript' src='/public/scripts/jquery.min.js' ></script>
    <script type='text/javascript' src="/public/scripts/bootstrap.js" ></script>
    <script type='text/javascript' src="/public/scripts/popper.min.js" ></script>
    <script type='text/javascript' src='/public/scripts/form.js' ></script>   
    <title><?php echo $title;?></title>
</head>
<body class="fixed-nav <?php echo $this->route['action'] =='login'?'bg-dark':'bg-light';?>" >
<?php if($this->route['action'] != 'login'): ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark pos-fixed" id='mainNav'>
        <a class="navbar-brand" href='/admin/books'>Панель Администратора</a>
        <button aria-controls="navbarResponsive" data-target="#navbarResponsive" data-toggle="collapse" class="navbar-toggler navbar-toggler-right">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id='navbarResponsive' class="collapse navbar-collapse">
            
            <ul class="d-block navbar-nav sidenav bg-dark"  >
            <li class=" nav-item ml-1">                   
                    <a href="/" class="nav-link">
                       <i class='fa fa-fw fa-home'></i>
                       <span class="nav-link-text">Главная страница</span>  
                    </a>
                </li>
                <li class=" nav-item ml-1">                   
                    <a href="/admin/add" class="nav-link">
                       <i class='fa fa-fw fa-plus'></i>
                       <span class="nav-link-text">Добавить книгу</span>  
                    </a>
                </li>   
                <li class=" nav-item ml-1">                   
                    <a href="/admin/books" class="nav-link">
                       <i class='fa fa-fw fa-list'></i>
                       <span class="nav-link-text">Книги</span>  
                    </a>
                </li>            
                <li class=" nav-item ml-1">                   
                    <a href="/admin/logout" class="nav-link">
                       <i class='fa fa-fw fa-sign-out'></i>
                       <span class="nav-link-text">Выйти</span>  
                    </a>
                </li>           
            </ul>
        </div>
    </nav>   
<?php endif; echo $content; ?>
</body>
    <?php if($this->route['action'] != 'login'): ?>
        <footer class='container-footer'>
            <div class="container-fluid ">
                <div class="text-center text-muted mt-2">
                    <small>&copy 2019.Книжный магазин</small>
                </div>
            </div>
        </footer>
    <?php endif;?>
</html>
