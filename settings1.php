<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
if ($_SESSION['user']['SuperAdmin'] != 0) {
    $adminName = "Суперадміністратор";
} else {
    $adminName = "Адміністратор";
}

$connect = mysqli_connect('mksumdu.mysql.tools', 'mksumdu_student', '85~M2vSs~x', 'mksumdu_student');
$connect->query('SET NAMES "utf8"');
if (!$connect) {
    die('Error connect to DataBase');
}
if (!$connect->set_charset($charset)) {
    echo "Ошибка установки кодировки utf8";
}

if (isset($_GET["perem"])) {
    $kursePerem = $_GET["perem"];
    $KyrsePanel4 = $connect->query("SELECT * FROM `groups` WHERE `id_ group` =$kursePerem");
    while ($row = $KyrsePanel4->fetch_assoc()) {
        $nameGroup = $row["name"];
        $nameSpesh = $row["Identifier"];
    }
} else {
    //header('Location: index.php');
}
?>

<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Машинобудівний коледж СумДУ</title>


    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
    <link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="assets/vendor/morris/morris.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

    <!-- Head Libs -->
    <script src="assets/vendor/modernizr/modernizr.js"></script>

    <style>
        .ClassForm {

            font-size: 14px;
            font-weight: 400;
            color: white;
            text-align: center;
        }

        .ClassForm:hover {
            background-color: white;
            color: black;
        }

        .ButKurse {
            border: none;
            background: #0088cc;
            color: white;
            font-size: 18px;
            padding-top: 12px;
            padding-bottom: 16px;
            border-radius: 5px;
            margin-right: 10px;
            width: 260px;
        }

        @media screen and (max-width:550px) {
            .ButKurse {
                border: none;
                background: #0088cc;
                color: white;
                font-size: 8px;
                padding-top: 12px;
                padding-bottom: 16px;
                border-radius: 5px;

                width: 120px;
            }
        }

        .ButKurse1 {
            border: none;
            background: #0088cc;
            color: white;
            font-size: 18px;
            padding-top: 6px;
            padding-bottom: 6px;
            border-radius: 5px;
            margin-right: 10px;
            width: 120px;
        }

        @media screen and (max-width:550px) {
            .ButKurse1 {
                border: none;
                background: #0088cc;
                color: white;
                font-size: 8px;
                padding-top: 6px;
                padding-bottom: 6px;
                border-radius: 5px;

                width: 60px;
            }
        }
    </style>
</head>

<body>
    <section class="body">

        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a  class="logo">
                    <img src="assets/images/logo.png" height="35" />
                </a>
                <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <!-- start: search & user box -->
            <div class="header-right">

            <?php $Search = $_GET['q'];?>
                <form action="Search.php" method="GET" class="search nav-form">
                    <div class="input-group input-search">
                        <input type="text" class="form-control" name="q" id="q" placeholder="Пошук">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>





                <span class="separator"></span>

                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <figure class="profile-picture">
                            <img src="assets/images/!logged-user.jpg" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                        </figure>
                        <div class="profile-info">
                            <span class="name"><?= $_SESSION['user']['full_name'] ?></span>
                            <span class="role"><?= $adminName ?></span>
                        </div>

                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                            

                            <li>
                                <a role="menuitem" tabindex="-1" href="/Диплом_Рома/vendor/logout.php"><i class="fa fa-power-off"></i> Вийти</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>
        <!-- end: header -->

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            <aside id="sidebar-left" class="sidebar-left">

                <div class="sidebar-header">
                    <div class="sidebar-title">
                        Меню
                    </div>
                    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <div class="nano">
                    <div class="nano-content">
                    <nav id="menu" class="nav-main" role="navigation">
                            <ul class="nav nav-main">
                                <li class="nav-active">
                                    <a href="/Диплом_Рома/profileAdmin.php">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span>Головна сторінка</span>
                                    </a>
                                </li>
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-align-left" aria-hidden="true"></i>
                                        <span>Студенти</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li class="nav-parent">
                                            <a>1 Курс</a>
                                            <ul class="nav nav-children kurse1">
                                                <script>
                                                    <?php
                                                    //Четвертий курс
                                                    $Kyrse1 = $connect->query("SELECT * FROM `groups` WHERE `id_kurse` = 1");
                                                    while ($row = $Kyrse1->fetch_assoc()) {
                                                    ?>
                                                        for (let h = 0; h < 1; h++) {
                                                            let elemp = document.querySelector(".kurse1");
                                                            let li = document.createElement('li');
                                                            let form = document.createElement('form');
                                                            form.classList.add('ClassForm');
                                                            form.classList.add('ClassForm:hover');
                                                            form.innerHTML = "<button style='border:none; background: none; color: fff; width: 100%;'><p ><?= $row["name"] ?></p> <input type='hidden' name='perem' value='<?= $row["id_ group"] ?>'></button>";
                                                            form.setAttribute("method", "get");
                                                            form.setAttribute("action", "/Диплом_Рома/groupstudent.php");

                                                            li.append(form);
                                                            elemp.append(li);
                                                            break;
                                                        }
                                                    <?php
                                                    }
                                                    ?>
                                                </script>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-children">
                                        <li class="nav-parent">
                                            <a>2 Курс</a>
                                            <ul class="nav nav-children kurse2">
                                                <script>
                                                    <?php
                                                    //Четвертий курс
                                                    $Kyrse2 = $connect->query("SELECT * FROM `groups` WHERE `id_kurse` = 2");
                                                    while ($row = $Kyrse2->fetch_assoc()) {
                                                    ?>
                                                        for (let h = 0; h < 1; h++) {
                                                            let elemp = document.querySelector(".kurse2");
                                                            let li = document.createElement('li');
                                                            let form = document.createElement('form');
                                                            form.classList.add('ClassForm');
                                                            form.classList.add('ClassForm:hover');
                                                            form.innerHTML = "<button style='border:none; background: none; color: fff; width: 100%;'><p ><?= $row["name"] ?></p> <input type='hidden' name='perem' value='<?= $row["id_ group"] ?>'></button>";
                                                            form.setAttribute("method", "get");
                                                            form.setAttribute("action", "/Диплом_Рома/groupstudent.php");

                                                            li.append(form);
                                                            elemp.append(li);
                                                            break;
                                                        }
                                                    <?php
                                                    }
                                                    ?>
                                                </script>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-children">
                                        <li class="nav-parent">
                                            <a>3 Курс</a>
                                            <ul class="nav nav-children kurse3">
                                                <script>
                                                    <?php
                                                    //Четвертий курс
                                                    $Kyrse3 = $connect->query("SELECT * FROM `groups` WHERE `id_kurse` = 3");
                                                    while ($row = $Kyrse3->fetch_assoc()) {
                                                    ?>
                                                        for (let h = 0; h < 1; h++) {
                                                            let elemp = document.querySelector(".kurse3");
                                                            let li = document.createElement('li');
                                                            let form = document.createElement('form');
                                                            form.classList.add('ClassForm');
                                                            form.classList.add('ClassForm:hover');
                                                            form.innerHTML = "<button style='border:none; background: none; color: fff; width: 100%;'><p ><?= $row["name"] ?></p> <input type='hidden' name='perem' value='<?= $row["id_ group"] ?>'></button>";
                                                            form.setAttribute("method", "get");
                                                            form.setAttribute("action", "/Диплом_Рома/groupstudent.php");

                                                            li.append(form);
                                                            elemp.append(li);
                                                            break;
                                                        }
                                                    <?php
                                                    }
                                                    ?>
                                                </script>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-children">
                                        <li class="nav-parent">
                                            <a>4 Курс</a>
                                            <ul class="nav nav-children kurse4">
                                                <script>
                                                    <?php
                                                    //Четвертий курс
                                                    $Kyrse4 = $connect->query("SELECT * FROM `groups` WHERE `id_kurse` = 4");
                                                    while ($row = $Kyrse4->fetch_assoc()) {
                                                    ?>
                                                        for (let h = 0; h < 1; h++) {
                                                            let elemp = document.querySelector(".kurse4");
                                                            let li = document.createElement('li');
                                                            let form = document.createElement('form');
                                                            form.classList.add('ClassForm');
                                                            form.classList.add('ClassForm:hover');
                                                            form.innerHTML = "<button style='border:none; background: none; color: fff; width: 100%;'><p ><?= $row["name"] ?></p> <input type='hidden' name='perem' value='<?= $row["id_ group"] ?>'></button>";
                                                            form.setAttribute("method", "get");
                                                            form.setAttribute("action", "/Диплом_Рома/groupstudent.php");

                                                            li.append(form);
                                                            elemp.append(li);
                                                            break;
                                                        }
                                                    <?php
                                                    }
                                                    ?>
                                                </script>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="not_translated.php?perem=5">
                                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                                        <span>Не переведенні</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Graduates.php?perem=6">
                                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                                        <span>Випускники</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="settings.php">
                                        <i class="fa fa-cogs" aria-hidden="true"></i>
                                        <span>Налаштування</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                        <hr class="separator" />



                        <hr class="separator" />


                    </div>

                </div>

            </aside>
            <!-- end: sidebar -->

            <section role="main" class="content-body transition-fade" id="swup">
                <header class="page-header">
                    <a href="/Диплом_Рома/settings.php"><button class="ButKurse" id="but">Налаштування груп <i class="fa fa-cog fa-spin fa-1x fa-fw"></i></button></a>
                    <a href="/Диплом_Рома/settings.php"> <button class="ButKurse" id="but">Налаштування предметів<i class="fa fa-cog fa-spin fa-1x fa-fw"></i></button></a>


                </header>


                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Налаштування</h2>
                    </header>
                    <a href="/Диплом_Рома/settings1.php"> <button class="ButKurse1" id="but">1 курс<i class="fa fa-cog fa-spin fa-1x fa-fw"></i></button></a>
                    <a href="/Диплом_Рома/settings2.php"> <button class="ButKurse1" id="but">2 курс<i class="fa fa-cog fa-spin fa-1x fa-fw"></i></button></a>
                    <a href="/Диплом_Рома/settings3.php"> <button class="ButKurse1" id="but">3 курс<i class="fa fa-cog fa-spin fa-1x fa-fw"></i></button></a>
                    <a href="/Диплом_Рома/settings4.php"> <button class="ButKurse1" id="but">4 курс<i class="fa fa-cog fa-spin fa-1x fa-fw"></i></button></a>
                    <div class="panel-body">

                        <table class="table table-bordered table-striped mb-none">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">№</th>
                                    <th style="text-align: center;">Назва предмету</th>
                                    <th style="text-align: center; width: 10%;">Група</th>
                                    <th style="text-align: center; width: 10%;">Семестр</th>
                                    <th style="text-align: center; width: 10%;">Години</th>
                                    <th style="text-align: center; width: 10%;">Кредити</th>
                                    <th style="text-align: center;">Вчитель</th>
                                    <th style="text-align: center;">Дії</th>
                                </tr>
                            </thead>
                            <tbody id="Table">


                                <script>
                                    <?php
                                    $Student = $connect->query("SELECT t.`id_ group`, t.`name`,tn.`name` as 'nameSub',tn.`id_Subjects`,tn.`hour`,tn.`ESTS`,tn.`Teacher`,tn.`id_semestr` FROM `groups`t, `subjects`tn WHERE t.`id_kurse`=1 and t.`id_ group`=tn.`id_ group` ORDER BY `id_semestr`");
                                    $num = 1;
                                    while ($row = $Student->fetch_assoc()) {

                                    ?>
                                        for (let h = 0; h < 1; h++) {
                                            let elemp = document.getElementById("Table");
                                            let tr = document.createElement('tr');
                                            tr.innerHTML = '<td style="text-align: center; width: 5%;"> <?= $num ?><input type="hidden" id="idgroup<?= $row["id_Subjects"] ?>" value="<?= $row["id_ group"] ?>"></td><td ><input style="text-align: center;" class="form-control"  id="nameSub<?= $row["id_Subjects"] ?>" value="<?= $row["nameSub"] ?>" readonly> </td> <td ><input style="text-align: center;" class="form-control"  id="group<?= $row["id_Subjects"] ?>" value="<?= $row["name"] ?>" readonly> </td> <td ><input style="text-align: center;" class="form-control"  id="semestr<?= $row["id_Subjects"] ?>" value="<?= $row["id_semestr"] ?>" readonly> </td> <td ><input style="text-align: center;" class="form-control"  id="hour<?= $row["id_Subjects"] ?>" value="<?= $row["hour"] ?>" readonly> </td> <td ><input style="text-align: center;" class="form-control"  id="ESTS<?= $row["id_Subjects"] ?>" value="<?= $row["ESTS"] ?>" readonly> </td> <td ><input style="text-align: center;" class="form-control"  id="Teacher<?= $row["id_Subjects"] ?>" value="<?= $row["Teacher"] ?>" readonly> </td> <td class="actions" style="text-align: center;"><i style="cursor: pointer;" class="fa fa-pencil" onclick = "pencil(<?= $row["id_Subjects"] ?>)" id="pencil<?= $row["id_Subjects"] ?>"></i> <i style="cursor: pointer;" class="fa fa-trash-o" id="trash<?= $row["id_Subjects"] ?>" onclick = "trach(<?= $row["id_Subjects"] ?>)"></i> <i style="cursor: pointer;" class="fa fa-save" onclick="save(<?= $row["id_Subjects"] ?>)" id="save<?= $row["id_Subjects"] ?>">  </i></td> ';
                                            elemp.append(tr);
                                            break;
                                        }
                                    <?php
                                        $num++;
                                    }
                                    ?>
                                </script>
                            </tbody>
                        </table>

                    </div>
                </section>
                <button class="btn btn-primary " onclick="buton33()" id="buton33">Змінити <i class="fa fa-pencil"></i></button>

                <button class="btn btn-primary " onclick="buton11()" id="buton11">Додати <i class="fa fa-plus"></i></button>
                <!-- start: page -->

        </div>
        <script>
            window.onload = function() {
                document.getElementById("buton33").style.visibility = "hidden";
                <?php
                $Studentt1 = $connect->query("SELECT t.`id_ group`, t.`name`,tn.`name` as 'nameSub',tn.`id_Subjects`,tn.`hour`,tn.`ESTS`,tn.`Teacher`,tn.`id_semestr` FROM `groups`t, `subjects`tn WHERE t.`id_kurse`=1 and t.`id_ group`=tn.`id_ group` ORDER BY `id_semestr`");
                while ($row = $Studentt1->fetch_assoc()) {
                ?>
                    document.getElementById("save<?= $row["id_Subjects"] ?>").style.visibility = "hidden";
                <?php
                }
                ?>
            }

            function buton11() {
                document.getElementById("buton11").style.visibility = "hidden";
                document.getElementById("buton33").style.visibility = "visible";

                for (let h = 0; h < 1; h++) {
                    let elemp = document.getElementById("Table");

                    let tr = document.createElement('tr');
                    tr.innerHTML = '<td style="text-align: center; width: 5%;"> <?= $num ?></td><td ><input style="text-align: center;" class="form-control"  id="nameSub"  > </td> <td ><input style="text-align: center;" class="form-control"  id="group" > </td> <td ><input style="text-align: center;" class="form-control"  id="semestr"  > </td> <td ><input style="text-align: center;" class="form-control"  id="hour"  > </td> <td ><input style="text-align: center;" class="form-control"  id="ESTS"  > </td> <td ><input style="text-align: center;" class="form-control"  id="Teacher"  > </td> ';
                    elemp.append(tr);
                    break;
                }
            }

            function pencil(id) {
                document.getElementById("save" + id).style.visibility = "visible";
                document.getElementById("pencil" + id).style.visibility = "hidden";
                document.getElementById("trash" + id).style.visibility = "hidden";
                document.getElementById("nameSub" + id).readOnly = false;
                document.getElementById("group" + id).readOnly = false;
                document.getElementById("semestr" + id).readOnly = false;
                document.getElementById("hour" + id).readOnly = false;
                document.getElementById("ESTS" + id).readOnly = false;
                document.getElementById("Teacher" + id).readOnly = false;


            }

            function save(id) {
                var nameSub = document.getElementById("nameSub" + id).value;
                var nameSub = document.getElementById("nameSub" + id).value;
                var group = document.getElementById("group" + id).value;
                var semestr = document.getElementById("semestr" + id).value;
                var hour = document.getElementById("hour" + id).value;
                var ESTSr = document.getElementById("ESTS" + id).value;
                var Teacher = document.getElementById("Teacher" + id).value;

                var stu = id;
                var fun = 5;
                
                if (semestr == 1 || semestr == 2) {
                    if (confirm("Ви хочете змінити назву предмета ?") == true) {

                        jQuery.ajax({
                            url: "vendor/settingbut.php",
                            type: "POST",
                            data: {
                                stu: stu,
                                fun: fun,
                                nameSub: nameSub,
                                group: group,
                                semestr: semestr,
                                hour: hour,
                                ESTSr: ESTSr,
                                Teacher: Teacher
                            },
                            success: function() {
                                alert("Назву було успішно змінено");

                            },
                            error: function() {
                                alert("Помилка");
                            }
                        });
                        window.location.reload();
                    }
                } else {
                    alert("Семестр повинен бути або 1 або 2, відповідно до курсу");
                }
            }

            function trach(id) {
                var fun = 6;
                var stu = id;
                if (confirm("Ви хочете видалити групу?") == true) {
                    if (confirm("!!!!Ви точно хочете видалити групу?!!!!") == true) {
                        jQuery.ajax({
                            url: "vendor/settingbut.php",
                            type: "POST",
                            data: {
                                stu: stu,
                                fun: fun
                            },
                            success: function() {
                                alert("Групу було видалено");
                            },
                            error: function() {
                                alert("Помилка");
                            }
                        });
                        window.location.reload();
                    }
                }
            }

            function buton33() {
                var nameSub = document.getElementById("nameSub").value;
                var group = document.getElementById("group").value;
                var semestr = document.getElementById("semestr").value;
                var hour = document.getElementById("hour").value;
                var ESTSr = document.getElementById("ESTS").value;
                var Teacher = document.getElementById("Teacher").value;
                let fun = 7;
                if (semestr == 1 || semestr == 2) {
                    if (nameSub == "" && group == "" && semestr == "" && hour == "" && ESTSr == "" && Teacher == "") {
                        alert("Не все поля заповнено")
                    } else {
                        jQuery.ajax({
                            url: "vendor/settingbut.php",
                            type: "POST",
                            data: {

                                fun: fun,
                                nameSub: nameSub,
                                group: group,
                                semestr: semestr,
                                hour: hour,
                                ESTSr: ESTSr,
                                Teacher: Teacher

                            },
                            success: function() {
                                alert("Дані успішно записані");

                            },
                            error: function() {
                                alert("Нет");
                            }
                        });
                        document.getElementById("buton11").style.visibility = "visible";
                        document.getElementById("buton33").style.visibility = "hidden";
                        window.location.reload();
                    }
                } else {
                    alert("Семестр повинен бути або 1 або 2, відповідно до курсу");
                }
            }
        </script>

    </section>

    <!-- Vendor -->
    <script src="assets/vendor/jquery/jquery.js"></script>
    <script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

    <!-- Specific Page Vendor -->
    <script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
    <script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
    <script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
    <script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
    <script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
    <script src="assets/vendor/flot/jquery.flot.js"></script>
    <script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
    <script src="assets/vendor/flot/jquery.flot.pie.js"></script>
    <script src="assets/vendor/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendor/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
    <script src="assets/vendor/raphael/raphael.js"></script>
    <script src="assets/vendor/morris/morris.js"></script>
    <script src="assets/vendor/gauge/gauge.js"></script>
    <script src="assets/vendor/snap-svg/snap.svg.js"></script>
    <script src="assets/vendor/liquid-meter/liquid.meter.js"></script>
    <script src="assets/vendor/jqvmap/jquery.vmap.js"></script>
    <script src="assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
    <script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="assets/javascripts/theme.js"></script>

    <!-- Theme Custom -->
    <script src="assets/javascripts/theme.custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="assets/javascripts/theme.init.js"></script>


    <!-- Examples -->
    <script src="assets/javascripts/dashboard/examples.dashboard.js"></script>
</body>

</html>