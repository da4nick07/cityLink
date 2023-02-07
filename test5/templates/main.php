<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Олимпиада</title>
</head>
<body>
<h1 style="text-align: center">Олимпиада</h1>

<form action="/" method="post">
    <label for="name">Участники</label><br>
    <input type="text" id="name" name="members" placeholder="Введите имена участников через запятую"  size="100"><br>
    <br>
    <input type="submit" value="Добавить">
</form>

<?php if(!empty($_ERROR_)): ?>
    <div style="color: red;"><?= $_ERROR_ ?></div>
<?php endif; ?>

<?php if( $_METHOD == 'POST'): ?>
    <p>Тут будет табличка</p>
    <?php foreach ($_MEMBERS as $m): ?>
        <p><?= $m ?></p>
        <hr>
    <?php endforeach; ?>

<?php endif; ?>

</body>
</html>
