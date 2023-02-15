<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Олимпиада</title>

     <link href="/static/front/styles/bs513/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    </head>
    <body>

    <script src="/static/front/styles/bs513/js/bootstrap.bundle.min.js"></script>

    <div class="container-fluid">

        <h1 style="text-align: center">Олимпиада</h1>

        <div class="row justify-content-center">
            <div class="col-sm-6 text-center" style="background-color:#b1dfbb;">
                <form action="/" method="post">
                    <div class="row justify-content-center">
                        <div class="col text-center">
                            <label for="name">Участники</label>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-6 text-center">
                            <input type="text" id="name" name="members"
                                <?php if(!empty($_NEW)): ?>
                                   value="<?= $_NEW ?>"
                                <?php else: ?>
                                   placeholder="Введите имена участников через запятую"
                                <?php endif; ?>
                            ><br>
                        </div>
                    </div>

                    <br>
                    <div class="row justify-content-center">
                        <div class="col text-center">
                            <input type="submit" value="Добавить">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php if(!empty($_ERROR)): ?>
            <div class="row justify-content-center">
                <div class="col-sm-6 text-center" style="background-color:lightcoral;">
                    <?= $_ERROR ?>
                </div>
            </div>

            <div class="modal fade" id="inputError" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ошибка!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                            <?= $_ERROR ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                var myModal = new bootstrap.Modal(document.getElementById('inputError'), {
                    keyboard: false
                })
                myModal.show()
            </script>

        <?php endif; ?>

        <?php if( isset($_MEMBERS)): ?>

        <div class="row justify-content-center">
            <div class="col-sm-6 text-center" style="background-color:#b1dfbb;">
                <div style="overflow-x:auto;">
                    <table class="table table-hover">
                        <thead>
                        <tr>
<!--
                            <th scope="col">№</th>
-->
                            <th scope="col"  style="background-color: red">
                                <div class="d-grid gap-2">

                                    <?php if(!isset($_DESC0)): ?>
                                        <button class="btn btn-primary" type="button" onClick="document.location = '/?sortby=0&desc0=-1'">№</button>
                                    <?php endif; ?>
                                    <?php if($_DESC0 == -1): ?>
                                        <button class="btn btn-primary" type="button" onClick="document.location = '/?sortby=0&desc0=1'">№
                                            <img src="static/front/images/sortl.png" alt="Сортировка"></button>
                                    <?php endif; ?>
                                    <?php if($_DESC0 == 1): ?>
                                        <button class="btn btn-primary" type="button" onClick="document.location = '/?sortby=0&desc0=-1'">№
                                            <img src="static/front/images/sortb.png" alt="Сортировка"></button>
                                    <?php endif; ?>

                                </div>
                            </th>
                            <th scope="col"  style="background-color: red">
                                <div class="d-grid gap-2">

                                    <?php if(!isset($_DESC1)): ?>
                                        <button class="btn btn-primary" type="button" onClick="document.location = '/?sortby=1&desc1=-1'">Имя</button>
                                    <?php endif; ?>
                                    <?php if($_DESC1 == -1): ?>
                                        <button class="btn btn-primary" type="button" onClick="document.location = '/?sortby=1&desc1=1'">Имя
                                            <img src="static/front/images/sortl.png" alt="Сортировка"></button>
                                    <?php endif; ?>
                                    <?php if($_DESC1 == 1): ?>
                                        <button class="btn btn-primary" type="button" onClick="document.location = '/?sortby=1&desc1=-1'">Имя
                                            <img src="static/front/images/sortb.png" alt="Сортировка"></button>
                                    <?php endif; ?>

                                </div>
                            </th>
                            <th scope="col"  style="background-color: red">
                                <div class="d-grid gap-2">

                                    <?php if(!isset($_DESC2)): ?>
                                        <button class="btn btn-primary" type="button" onClick="document.location = '/?sortby=2&desc2=-1'">Очки</button>
                                    <?php endif; ?>
                                    <?php if($_DESC2 == -1): ?>
                                        <button class="btn btn-primary" type="button" onClick="document.location = '/?sortby=2&desc2=1'">Очки
                                            <img src="static/front/images/sortl.png" alt="Сортировка"></button>
                                    <?php endif; ?>
                                    <?php if($_DESC2 == 1): ?>
                                        <button class="btn btn-primary" type="button" onClick="document.location = '/?sortby=2&desc2=-1'">Очки
                                            <img src="static/front/images/sortb.png" alt="Сортировка"></button>
                                    <?php endif; ?>

                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($_MEMBERS as $m): ?>
                            <tr>
                                <td><p><?= $m['n'] ?></p></td>
                                <td><p><?= $m['name'] ?></p></td>
                                <td><p><?= $m['rate'] ?></p></td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php endif; ?>


        <p>
            <?php if( isset($_DESC1)): ?>
                <?php echo 'DESC1! = ' . $_DESC1; ?>
            <?php endif; ?>
        </p>

    </div>
</body>
</html>
