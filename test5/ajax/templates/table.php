<div class="row justify-content-center">
    <div class="col-sm-6 text-center" style="background-color:#b1dfbb;">
        <div style="overflow-x:auto;">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col"  style="background-color: red">
                        <div class="d-grid gap-2">

                            <?php if(!isset($_DESC0)): ?>
                                <button class="btn btn-primary" type="button" onClick = "sortTable(0, -1)">№</button>
                            <?php endif; ?>
                            <?php if(isset($_DESC0)): ?>
                                <?php if($_DESC0 == -1): ?>
                                    <button class="btn btn-primary" type="button" onClick = "sortTable(0, 1)">№
                                        <img src="static/front/images/sortl.png" alt="Сортировка"></button>
                                <?php endif; ?>
                                <?php if($_DESC0 == 1): ?>
                                    <button class="btn btn-primary" type="button" onClick = "sortTable(0, -1)">№
                                        <img src="static/front/images/sortb.png" alt="Сортировка"></button>
                                <?php endif; ?>
                            <?php endif; ?>

                        </div>
                    </th>
                    <th scope="col"  style="background-color: red">
                        <div class="d-grid gap-2">

                            <?php if(!isset($_DESC1)): ?>
                                <button class="btn btn-primary" type="button" onClick="sortTable(1, -1)">Имя</button>
                            <?php endif; ?>
                            <?php if(isset($_DESC1)): ?>
                                <?php if($_DESC1 == -1): ?>
                                    <button class="btn btn-primary" type="button" onClick="sortTable(1, 1)">Имя
                                        <img src="static/front/images/sortl.png" alt="Сортировка"></button>
                                <?php endif; ?>
                                <?php if($_DESC1 == 1): ?>
                                    <button class="btn btn-primary" type="button" onClick="sortTable(1, -1)">Имя
                                        <img src="static/front/images/sortb.png" alt="Сортировка"></button>
                                <?php endif; ?>
                            <?php endif; ?>

                        </div>
                    </th>
                    <th scope="col"  style="background-color: red">
                        <div class="d-grid gap-2">

                            <?php if(!isset($_DESC2)): ?>
                                <button class="btn btn-primary" type="button" onClick="sortTable(2, -1)">Очки</button>
                            <?php endif; ?>
                            <?php if(isset($_DESC2)): ?>
                                <?php if($_DESC2 == -1): ?>
                                    <button class="btn btn-primary" type="button" onClick="sortTable(2, 1)">Очки
                                        <img src="static/front/images/sortl.png" alt="Сортировка"></button>
                                <?php endif; ?>
                                <?php if($_DESC2 == 1): ?>
                                    <button class="btn btn-primary" type="button" onClick="sortTable(2, -1)">Очки
                                        <img src="static/front/images/sortb.png" alt="Сортировка"></button>
                                <?php endif; ?>
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
            <script>
                function sortTable( sortby, desc){
                    $.ajax({
                        url: 'ajax/members.php',
                        method: 'post',
                        dataType: 'html',
                        data: {sortby: sortby, desc:desc},
                        success: function (data) {
                            $("#table").html(data);
                        }
                    });
                }
            </script>
        </div>
    </div>
</div>


