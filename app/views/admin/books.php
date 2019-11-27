<div class="container-global">
    <div class="container-fluid bg-light pt-3 pb-3">
        <form action='/account/register' method='post'>
            <div class="card">
                <div class="card-header">
                    <h5><?= $title ?></h5>
                </div>
                <div class="row">
                    <?php if (empty($books)) : ?>
                        <div class="col-12 text-center">
                            <p>Список книг пуст</p>
                        </div>
                    <?php else : ?>
                        <div class="col-sm-12 col-lg-6">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th>Автор</th>
                                        <th>Удалить</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = count($books);
                                        for ($i = 0; $i < $count; $i++) : ?>
                                        <tr style="cursor:pointer;">
                                            <td class='data d-none'><?= $books[$i]['Id'] ?></td>
                                            <td class="data"><?= htmlspecialchars($books[$i]['BookName'], ENT_QUOTES) ?></td>
                                            <td class="data"><?= htmlspecialchars($books[$i]['Author'], ENT_QUOTES) ?></td>
                                            <td><a href="/admin/delete/<?= $books[$i]['Id'] ?>" class="btn btn-outline-danger">Удалить</a></td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="col text-center">
                            <div id='img-container'>
                                <img src="/public/images/noimage.png" style='max-width:270px;' id='book-image' class="m-2 card-img" alt="...">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- <div class="card-footer"></div> -->
            </div>
    </div>
    </form>
</div>
</div>
<script src="/public/scripts/selectBook.js"></script>