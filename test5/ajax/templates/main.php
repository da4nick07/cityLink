<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Олимпиада</title>

    <link href="/static/front/styles/bs513/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="/static/front/js/jquery-3.6.3.min.js"></script>

</head>
<body>

    <script src="/static/front/styles/bs513/js/bootstrap.bundle.min.js"></script>

    <div class="container-fluid">

        <h1 style="text-align: center">Олимпиада</h1>

        <div class="row justify-content-center">
            <div class="col-sm-6 text-center" style="background-color:#b1dfbb;">
                <div class="row justify-content-center">
                    <div class="col text-center">
                        <label for="members">Участники</label>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-6 text-center">
                        <input type="text" id="members" name="members" placeholder="Введите имена участников через запятую"
                    </div>
                </div>

                <br>
                <div class="row justify-content-center">
                    <div class="col text-center">
                        <input type="submit" value="Добавить"  onClick = "gettable()">
                    </div>
                </div>
            </div>
        </div>

        <div id="table"></div>

        <script>
            function gettable(){
                const input = document.getElementById('members'); // Извлекаем элемент input
                const members = input.value;
                $.ajax({
                    url: 'members.php',
                    method: 'post',
                    dataType: 'html',
                    data: {members:members},
                    success: function(result){
                        $("#table").html( " Members: "+result );
                    }
                });
            }
        </script>
    </div>

</body>
</html>
