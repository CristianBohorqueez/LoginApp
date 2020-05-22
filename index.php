<?php

session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
	$records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = null;

	if (count($results) > 0) {
		$user = $results;
	}
}

$records2 = $conn->prepare('SELECT * FROM `users`');
$records2->execute();
$results2 = $records2->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>
	<?php require 'partials/header.php' ?>

	<?php if (!empty($user)) : ?>
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
					<div style="text-align: center;">
						<h1>Bienvenido. <?= $user['email'] ?> </h1>
						<h1>Has Iniciado Sesion Correctamente</h1>
						<span style="text-align: center;" class="login100-form-title p-b-32">
							<a class="login100-form-btn" href="logout.php">Cerrar Sesion</a>
						</span>
					</div>
					<?php
					foreach ($results2 as $data) {
					?>
						<h3>
							<tr>
								<td><?php echo $data['email']?></td>
								<a href="delete.php">
									<i class="fa fa-trash fa-2x" aria-hidden="true" style="color: red; left: 20px"></i>
								</a>
							</tr>
						</h3>
					<?php
					}
					?>
				</div>
			</div>
		</div>

	<?php else : ?>
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
					<form class="login100-form validate-form flex-sb flex-w">
						<span style="text-align: center" class="login100-form-title p-b-32">

							Iniciar o Registrar
						</span>
						<span style="text-align: center" class="login100-form-title p-b-32">


							<div class="container-login100-form-btn">
								<a class="login100-form-btn" href="login.php">Iniciar</a>
								&nbsp; O &nbsp;
								<a class="login100-form-btn" href="singup.php">Registrar</a>
							</div>
						</span>


					</form>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>