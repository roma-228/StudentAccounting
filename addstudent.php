<?php
session_start();
if (!$_SESSION['user']) {
	header('Location: /');
} elseif ($_SESSION['user']['SuperAdmin'] === 0) {
	header('Location: profile.php');
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

$Perem = $_GET["perem"];





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
			width: 110px;
		}

		@media screen and (max-width:550px) {
			.ButKurse {
				border: none;
				background: #0088cc;
				color: white;
				font-size: 14px;
				padding-top: 12px;
				padding-bottom: 16px;
				border-radius: 5px;
				margin-right: 10px;
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
				<header class="page-header re" style="text-align: center;">


					
				</header>


				<section class="panel">
					<header class="panel-heading">
						<h2 class="panel-title"><?= $row["groups"] ?></h2>
					</header>
					<div class="panel-body">
						<div style="text-align: center;"><label style="font-size: 18px;font-weight: 600;padding-bottom: 2%;">Індивідуальний навчальний план студента</label><br> </div>

						<div class="form-group">
							<label class="col-md-3 control-label">ПІБ:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?= $fullname ?>" id="fullname">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Дата народження:</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</span>
									<input type="text" class="form-control" value="<?= $birthdata ?>" id="birthdata" >
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Місце народження:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?= $place_of_birth ?>" id="place_of_birth">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Адрес місця проживання:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?= $adress ?>" id="adress" placeholder="Поштовий індекс, область, район,назва населенного пункту,вулиця,№ будинку,№ квартири,номер телефону">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Зарахований(на) наказом від:</label>
							<div class="col-md-8">
								
									<input type="text" class="form-control" value="<?= $reckoned ?>" id="reckoned" placeholder='"____"_______" 20__ року №__ '>
								
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Група:</label>
							<div class="col-md-8">
							<select name="select" id="sel">
                                        <script>
                                            <?php

                                            $Student7 = $connect->query("SELECT * FROM `groups` WHERE  `id_ group`!=12 and `id_ group`!=13 ORDER by `name`");
                                            while ($row = $Student7->fetch_assoc()) {
                                            ?>
                                                for (let t = 0; t < 5; t++) {
                                                    let elemp = document.getElementById("sel");
                                                    let tr = document.createElement("Option");
                                                    tr.id = <?= $row["id_ group"] ?>;
                                                    tr.innerHTML = '<?= $row["name"] ?> (<?= $row["id_ group"] ?>)';
                                                    elemp.append(tr);
                                                    break;
                                                }
                                            <?php
                                            }
                                            ?>
                                        </script>
                                    </select>		
								<input type="hidden" class="idgruop" id="idsel">
								</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Початок навчання:</label>
							<div class="col-md-8">
								
									<input type="text" class="form-control" value="<?= $Start_learning ?>" id="Start_learning" placeholder='"____"_______" 20__ року №__ '>
								
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Закінчення навчання:</label>
							<div class="col-md-8">
								
									<input type="text" class="form-control" value="<?= $graduation ?>" id="graduation" placeholder='"____"_______" 20__ року №__ '>
								
							</div>
						</div>


						<div class="form-group">
							<label class="col-md-3 control-label">Форма навчання</label>
							<div class="col-md-8">
								<div class="input-group">

									<input type="text" class="form-control" value="<?= $Form_of_study ?>" id="Form_of_study">
								</div>
							</div>
						</div>



						<div style="text-align: center;"><label style="font-size: 18px;font-weight: 600;padding-bottom: 2%; padding-top: 2%;">Загальні дані</label><br> </div>
						<div class="form-group">
							<label class="col-md-3 control-label">Відділення:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?= $Department ?>" id="Department">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Освітньо-професійний ступінь:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?= $Degree ?>" id="Degree">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Найменування галузі знань:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?= $Branch_of_knowledge ?>" id="Branch_of_knowledge">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Спеціальність:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?= $Specialty ?>" id="Specialty">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Освітньо-професійна програма:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?= $program ?>" id="program">
							</div>
						</div>
						<div style="text-align: center;"><label style="font-size: 18px;font-weight: 600;padding-bottom: 2%; padding-top: 2%;">Підсумкові оцінки</label><br> </div>
						<div class="form-group">
							<label class="col-md-3 control-label">Усього:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="ratingall" value="<?= $progrratingallam ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Відмінно:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="RatingExcellent" value="<?= $RatingExcellent ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Добре:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="RatingGood" value="<?= $RatingGood ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Задовільно:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="RatingSatisfactory" value="<?= $RatingSatisfactory ?>">
							</div>
						</div>
						<div style="text-align: center;"><label style="font-size: 18px;font-weight: 600;padding-bottom: 2%; padding-top: 2%;">Дипломний проєкт</label><br> </div>
						<div class="form-group">
							<label class="col-md-3 control-label">Тема:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="DiplomTopic" value="<?= $DiplomTopic ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Оцінка:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="DiplomGrade" value="<?= $DiplomGrade ?>">
							</div>
						</div>
					</div>
				</section>




				


				


				
				<div style="text-align: end;  margin-top: 6px;">
					<button class="ButKurse" onclick="allbut()">Зберегти</button>
				</div>
				<!-- start: page -->

		</div>

		<script>

		</script>
	</section>

	<script>
		
		function allbut(){
			
			
			
			let fun = 11;
			
			let sel = document.getElementById("sel").value;
			let selid1 = sel.indexOf('(')+1;
			let selid2 = sel.indexOf(')');
			
			let selid3 = sel.substring(selid1,selid2);
			
			let sel1 = sel.substring(0,selid1-2);
			
			let fullname = document.getElementById("fullname").value;
			let birthdata = document.getElementById("birthdata").value;
			let place_of_birth = document.getElementById("place_of_birth").value;
			let adress = document.getElementById("adress").value;
			let reckoned = document.getElementById("reckoned").value;
			let Start_learning = document.getElementById("Start_learning").value;
			let graduation = document.getElementById("graduation").value;
			let Form_of_study = document.getElementById("Form_of_study").value;
			let Department = document.getElementById("Department").value;
			let Degree = document.getElementById("Degree").value;
			let Branch_of_knowledge = document.getElementById("Branch_of_knowledge").value;
			let Specialty = document.getElementById("Specialty").value;
			let program = document.getElementById("program").value;
			let ratingall = document.getElementById("ratingall").value;
			let RatingExcellent = document.getElementById("RatingExcellent").value;
			let RatingGood = document.getElementById("RatingGood").value;
			let RatingSatisfactory = document.getElementById("RatingSatisfactory").value;
			let DiplomTopic = document.getElementById("DiplomTopic").value;
			let DiplomGrade = document.getElementById("DiplomGrade").value;
			jQuery.ajax({
				url: "vendor/but.php",
				type: "POST",
				data: {
					fun: fun,
					fullname: fullname,
					birthdata: birthdata,
					place_of_birth: place_of_birth,
					adress: adress,
					reckoned: reckoned,
					sel1: sel1,
					selid3:selid3,
					Start_learning: Start_learning,
					graduation: graduation,
					Form_of_study: Form_of_study,
					Department: Department,
					Degree: Degree,
					Branch_of_knowledge: Branch_of_knowledge,
					Specialty: Specialty,
					program: program,
					ratingall: ratingall,
					RatingExcellent: RatingExcellent,
					RatingGood: RatingGood,
					RatingSatisfactory: RatingSatisfactory,
					DiplomTopic: DiplomTopic,
					DiplomGrade: DiplomGrade
				},
				success: function() {
					alert("Запис був успішно доданий");
				},
				error: function() {
					alert("Помилка");
				}
			});
			window.location.href ="groupstudent.php?perem="+selid3;
		}
	</script>
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