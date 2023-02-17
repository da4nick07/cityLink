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
                        <input type="text" id="members" name="members" placeholder="Введите имена участников через запятую">
                    </div>
                </div>
<!--
                это если просто запретить ввод НЕ кирилицы
                <script>
                    document.querySelector('#members').addEventListener('input', function() {
                        this.value = this.value.replace(/[^А-Яа-яЁё,]/g, '');
                    })
                </script>
-->
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
                var input = document.getElementById('members');
                var members = input.value;

                var regexp = /[^А-Яа-яЁё,]/g;
                var q = true;

                if ( members === '' ) {
                    alert('Введите имена участников через запятую!');
                    q = false;
                }
                if ( regexp.test(members) ) {
                    alert('Доступны только кириллические буквы и запятая!');
                    q = false;
                }
                if (q) {
                    input.value = '';
                   $.ajax({
                        url: 'ajax/members.php',
                        method: 'post',
                        dataType: 'html',
                        data: {members: members},
                        success: function (data) {
                            $("#table").html(data);
                        }
                    });
                }
            }
        </script>
    </div>

</body>
</html>
