<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Олимпиада</title>

     <link href="/static/styles/bs513/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    </head>
    <body>

    <script src="/static/styles/bs513/js/bootstrap.bundle.min.js"></script>

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
                            <input type="text" id="name" name="members" placeholder="Введите имена участников через запятую""><br>
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

            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                var myModal = new bootstrap.Modal(document.getElementById('modal'), {
                    keyboard: false
                })
                myModal.show()
            </script>


        <?php endif; ?>

        <?php if( $_METHOD == 'POST'): ?>

        <div class="row justify-content-center">
            <div class="col-sm-6 text-center" style="background-color:#b1dfbb;">
                <div style="overflow-x:auto;">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Очки</th>
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

    </div>
</body>
</html>
