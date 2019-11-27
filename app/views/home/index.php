<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= htmlspecialchars($title, ENT_QUOTES) ?></title>
</head>

<body>
    <div class="container mt-3 mb-3">
        <div class="row">
            <?php if (empty($books)) : ?>
                <div class="text-center">
                    <p>Здесь пока ничего нет!</p>
                </div>
                <?php else : $count = count($books);
                    for ($i = 0; $i < $count; $i++) : ?>
                    <div class="col-md-4 col-lg-3">
                        <div class="card mt-2" >
                            <div class="text-center m-1">
                                <img class="card-img-top"  src="/public/images/<?= $books[$i]['Id'] ?>.jpg" alt="<?= $books[$i]['Author'] ?>">

                            </div>
                            <div class="card-body">
                                <strong class="card-title"><?= htmlspecialchars($books[$i]['BookName'], ENT_QUOTES) ?></strong>
                                <p class="card-text"><?= htmlspecialchars($books[$i]['Author'], ENT_QUOTES) ?></p>
                                <a href="#" class="btn btn-outline-primary">Заказать</a>
                            </div>
                        </div>
                    </div>
            <?php endfor;
            endif; ?>
        </div>
    </div>
    <?= $pagination ?>

</body>

</html>