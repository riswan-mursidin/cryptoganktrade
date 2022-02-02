<?php  
require_once "apiclass.php";
require_once "function.php";
$alert = "";
if($_SESSION['status_login_member_bot'] == true){
	header('Location: home');
	exit();
}
$memberdb = new getAllMember();
$referral = $_GET['referral'];
if($referral != ""){
    $cekreferral = $memberdb->memberDb("referral",$referral);
    if($cekreferral['jum'] == 0){
        header('Location: registrasi');
        exit();
    }
}

require_once "auth.php";
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
        <link rel="import" href="component.html">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	</head>
	<body>
		<div class="container">
			<form action="" method="post" class="row justify-content-center" autocomplete="off">
				<div class="col-12 mb-5">
					<img src="img/logo.png" alt="" class="mx-auto d-block mt-5 logo-login" />
				</div>
				<div class="col-10">
                    <?php if($alert != ""){ ?>
                    <div class="alert alert-warning mb-2" role="alert">
                        <?= $alert ?>
                    </div>
                    <?php } ?>
					<div class="mb-3">
						<input autofocus type="text" style="text-transform: lowercase;" name="username" id="username" onkeyup="cekValidation(this.value)" class="form-control shadow-sm" placeholder="Username" value="<?= $_POST["username"] ?>" required/>
                        <span class="text-danger" style="font-size: 10px;" id="valid_username"></span>
					</div>
					<div class="mb-3">
						<input type="email" name="email" class="form-control shadow-sm" placeholder="example@gmail.com" value="<?= $_POST["email"] ?>"  required/>
					</div>
					<div class="mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">+62</span>
                            <input type="number" name="notelpn" class="form-control shadow-sm" placeholder="Nomor HP" value="<?= $_POST["notelpn"] ?>" required/>
                        </div>
					</div>
					<div class="mb-3">
						<input type="text" name="referral" class="form-control shadow-sm" value="<?= isset($_POST['referral']) ? $_POST['referral'] : $referral ?>" placeholder="Referral"/>
					</div>
					<div class="mb-3">
						<input type="password" id="pass" name="password" class="form-control shadow-sm" placeholder="Password" required/>
					</div>
					<div class="mb-4">
						<input type="password" id="passconf" class="form-control shadow-sm" placeholder="Confirm Password" required/>
					</div>
					<div class="d-grid gap-2 mb-3">
						<button class="btn btn-warning" name="aksi_registrasi" type="submit">Registrasi</button>
					</div>
					<div class="lupa-pass mb-5">Sudah punya Akun ? <a href="index">Login disini</a></div>
				</div>
			</form>
		</div>

		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<!-- Option 2: Separate Popper and Bootstrap JS -->
        <script src="js/validasiinput.js"></script>
	</body>
</html>
