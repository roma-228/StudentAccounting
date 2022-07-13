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
$id_group = $_GET["id_group"];
$id_Students = $_GET["id"];
$kursenum = $_GET["kursenum"];

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
			width: 100px;
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

			<section role="main" class="content-body kursePanel ">
				<header class="page-header re" style="text-align: center;">
					<script>
						<?php
						//Блок групи
						$qvery = $connect->query("SELECT * FROM `semestr` WHERE `id_kurse`=$kursenum ");
						$i = 1;
						while ($row = $qvery->fetch_assoc()) {

							$id_semestr[$i] = $row["id_semestr"];
							$name[$i] = $row["name"];

							$i++;
						}
						?>
					</script>
					<a href="/Диплом_Рома/semestr1.php?id_group=<?= $id_group ?>&id=<?= $id_Students ?>&kursenum=<?= $kursenum ?>"><button class="ButKurse"> <?= $name[1] ?></button></a>
					<a href="/Диплом_Рома/semestr2.php?id_group=<?= $id_group ?>&id=<?= $id_Students ?>&kursenum=<?= $kursenum ?>"><button class="ButKurse"> <?= $name[2] ?></button></a>
				</header>

				<script>
					<?php
					//Блок групи
					$KyrsePanel1 = $connect->query("SELECT COUNT(*) as COUNT FROM `subjects` WHERE `id_semestr`=$id_semestr[1] and `id_ group`=$id_group");
					while ($row = $KyrsePanel1->fetch_assoc()) {
						$num = $row["COUNT"];
					}
					$KyrsePanel1 = $connect->query("SELECT * FROM `subjects` WHERE `id_ group`=$id_group and `id_semestr`=$id_semestr[1] ORDER by `id_Subjects`");

					while ($row = $KyrsePanel1->fetch_assoc()) {

					?>
						for (let h = 0; h < 5; h++) {
							let elemp = document.querySelector(".kursePanel");
							let div = document.createElement('section');
							div.classList.add('panel');
							div.innerHTML = '<header class="panel-heading"><div class="panel-actions"><a  class="fa fa-caret-down"id="a"></a></div><h2 class="panel-title" id="id<?= $row["id_Subjects"] ?>"><?= $row["name"] ?></h2></header><div class="panel-body"><form class="form-horizontal form-bordered" method="get"><div class="form-group"><label class="col-md-3 control-label" for="inputDefault">Годин</label><div class="col-md-8"><input type="text" class="form-control" id="inputDefault" value="<?= $row["hour"] ?>" readonly></div></div><div class="form-group"><label class="col-md-3 control-label" for="inputDefault">Кредитів</label><div class="col-md-8"><input type="text" class="form-control" id="inputDefault" value="<?= $row["ESTS"] ?>"readonly></div></div>	<div class="form-group"><label class="col-md-3 control-label" for="inputDefault">Семестровий контроль</label><div class="col-md-8"><input type="text" class="form-control"  id="Rating<?= $row["id_Subjects"] ?>" ></div></div><div class="form-group"><label class="col-md-3 control-label" for="inputDefault">Дата складання</label><div class="col-md-8"><input type="data" class="form-control"  id="Datee<?= $row["id_Subjects"] ?>" ></div></div><div class="form-group"><label class="col-md-3 control-label" for="inputDefault">ПІБ викладача</label><div class="col-md-8"><input type="text" class="form-control" id="inputDefault" value="<?= $row["Teacher"] ?>" readonly></div></div><div style="text-align: right;"></div></form></div>';
							elemp.append(div);
							break;
						}
					<?php
					}

					?>
				</script>
				<!-- start: page -->
				<Div style="text-align: right;">
					<button class="ButKurse" onclick="but()"> Зберегти</button>
				</Div>
		</div>
		<script>
			

			function but() {

				<?php
				$KyrsePanel2 = $connect->query("SELECT * FROM `subjects` WHERE `id_semestr`=$id_semestr[1] and `id_ group`=$id_group");
				while ($row = $KyrsePanel2->fetch_assoc()) {
				?>

					var students = <?php echo $id_Students ?>;
					var id_Subjects = <?php echo $row["id_Subjects"] ?>;
					var semestr = <?php echo $id_semestr[1] ?>;

					for (let k = 0; k < 1; k++) {
						var Rating = document.getElementById("Rating<?= $row["id_Subjects"] ?>").value;
						var Datee = document.getElementById("Datee<?= $row["id_Subjects"] ?>").value;
						jQuery.ajax({
							url: "server.php",
							type: "POST",
							data: {
								id_Subjects: id_Subjects,
								Rating: Rating,
								Datee: Datee,
								students: students,
								semestr: semestr
							},
							success: function() {
								
							},
							error: function() {
								alert("Нет");
							}
						});
					}
				<?php
				}
				?>
				alert("Данні були успішно надісланні");
			}
		</script>

	</section>
	<script>
		window.onload = function() {
			<?php
			$KyrsePane = $connect->query("SELECT * FROM `evaluation` WHERE `id_Students`=$id_Students and `id_semestr`=$id_semestr[1] ORDER by `id_Subjects`");
			while ($rowe = $KyrsePane->fetch_assoc()) {
				
				if($rowe["Evaluation"] == null){$evalu = 'null';}else{$evalu = $rowe["Evaluation"];}
			?>
				var val = document.getElementById("Rating<?= $rowe["id_Subjects"] ?>");

				val.value = <?=$evalu?>;

				var rut = document.getElementById("Datee<?= $rowe["id_Subjects"] ?>");
				rut.value = "<?= $rowe["data"] ?>";

			<?php
			}
			?>
		}
	</script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
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