<?php  
require_once "apiclass.php";
require_once "authadmin.php";
if($_SESSION['login_admin_bot'] == true){
	header('Location: home');
	exit();
}
$alert = "";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
		<link rel="stylesheet" href="style.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<title>BOT TRADE - ADMIN</title>
	</head>
	<body>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 mb-5">
					<img src="img/logo.png" alt="" class="mx-auto d-block mt-5 logo-login" />
				</div>
				<form action="" method="post" class="col-10">
					<p class="text-white text-center">WELCOME TO PANEL ADMIN BOT</p>
					<?php if($alert != ""){ ?>
                    <div class="alert alert-danger mb-2" role="alert">
                        <?= $alert ?>
                    </div>
                    <?php } ?>
					<div class="mb-3">
						<input type="text" name="username" id="username" style="text-transform: lowercase;" class="form-control shadow-sm" placeholder="Username" required/>
					</div>
					<div class="mb-4">
						<input type="password" name="password" class="form-control shadow-sm" placeholder="Password" required/>
					</div>
					<div class="d-grid gap-2 mb-3">
						<button name="login_admin" class="btn btn-warning text-white" type="submit">Masuk Admin</button>
					</div>
				</form>
			</div>
		</div>

		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script src="js/loginadmin.js"></script>
	</body>
</html>
