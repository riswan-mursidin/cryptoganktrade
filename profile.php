<?php  
require_once "apiclass.php";
require_once "function.php";
$alert = "";
if($_SESSION['status_login_member_bot'] != true){
	header('Location: index');
	exit();
}

require_once "auth.php";
require_once "configwallet.php";
$tokenMember = new viewMember();
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
		<link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
		<title>Profile</title>
	</head>
	<body>
		<div class="container">
			<div class="row d-flex justify-content-between">
				<div class="col-auto mt-3">
					<a href="home">
						<svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M9.47458 2.08963L5.31202 6.52241H20V9.47759H5.31202L9.47458 13.9104L7.51233 16L0 8L7.51233 0L9.47458 2.08963Z" fill="white" />
						</svg>
					</a>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col text-center mt-3">
					<img src="img/profile.png" class="mx-auto d-block img-fluid" width="50px" alt="" />
				</div>
			</div>
			<div class="row justify-content-center mt-3">
				<div class="col-10">
					<label for="basic-url" class="form-label text-white">Referral</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control form-control-sm" value="<?= $referral_member ?>" disabled>
						<input type="text" style="display: none;" value="<?= $referral_member ?>" id="referral">
						<button class="btn btn-warning bt" type="button" data-clipboard-action="copy" id="copyreferral">
							<img src="img/content_copy_black_24dp.svg" alt="">
						</button>
					</div>
				</div>
				<form action="" method="post" class="col-10">
					<?php if($alert != ""){ ?>
                    <div class="alert alert-warning mb-2" role="alert">
                        <?= $alert ?>
                    </div>
                    <?php } ?>
					<label for="basic-url" class="form-label text-white">Edit Profile</label>
					<div class="mb-3">
						<input required value="<?= $username_member ?>" style="text-transform: lowercase;" id="username" onkeyup="cekValidation(this.value)" type="text" class="form-control form-control-sm shadow-sm" placeholder="Username" disabled/>
						<span class="text-danger" style="font-size: 10px;" id="valid_username"></span>
					</div>
					<div class="mb-3">
						<input required value="<?= $email_member ?>" type="email" name="email" class="form-control form-control-sm shadow-sm" placeholder="No HP" />
					</div>
					<div class="mb-3">
						<input required value="<?= $telpn_member ?>" type="number" name="notelpn" class="form-control form-control-sm shadow-sm" placeholder="Email" />
					</div>

					<hr style="color: white" />	
					<label for="basic-url" class="form-label text-white">Edit Password</label>
					<div class="mb-3">
						<input required type="password" id="pass" name="password" class="form-control form-control-sm shadow-sm" placeholder="Password" />
					</div>
					<div class="mb-3">
						<input required type="password" id="passconf" class="form-control form-control-sm shadow-sm" placeholder="Password Repeat" />
					</div>
					<hr style="color: white" />
					<div class="d-flex justify-content-between align-items-center">
						<div><label for="basic-url" class="form-label text-white">Edit Alamat Wallet</label></div>
						<div>
							<button type="button" class="btn btn-xs" data-bs-toggle="modal" data-bs-target="#alamatwallet">
								<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M24.9284 12.3831C24.9284 11.7802 24.4397 11.2915 23.8369 11.2915H17.5853C16.9825 11.2915 16.4938 11.7802 16.4938 12.3831V15.6577C16.4938 16.2605 16.9825 16.7492 17.5853 16.7492H23.8369C24.4397 16.7492 24.9284 16.2605 24.9284 15.6577V12.3831ZM19.621 15.3071C18.9183 15.3071 18.3486 14.7374 18.3486 14.0347C18.3486 13.3319 18.9183 12.7622 19.621 12.7622C20.3238 12.7622 20.8935 13.3319 20.8935 14.0347C20.8935 14.7373 20.3238 15.3071 19.621 15.3071Z" fill="url(#paint0_linear_123_2)" />
									<path d="M15.0558 9.80308H23.1422V6.52846C23.1422 5.70772 22.5077 5.04 21.6868 5.04H4.32143C3.50069 5.04 2.79993 5.70772 2.79993 6.52846V21.6115C2.79993 22.4323 3.50069 23.1 4.32143 23.1H21.6868C22.5076 23.1 23.1422 22.4323 23.1422 21.6115V18.2377H15.0706L15.0558 9.80308Z" fill="url(#paint1_linear_123_2)" />
									<defs>
										<linearGradient id="paint0_linear_123_2" x1="20.7111" y1="11.2915" x2="20.7111" y2="16.7492" gradientUnits="userSpaceOnUse">
											<stop stop-color="#FFDB1C" />
											<stop offset="0.0001" stop-color="#FDD400" />
											<stop offset="0.46885" stop-color="#FFC93E" />
											<stop offset="1" stop-color="#FFDB1C" />
										</linearGradient>
										<linearGradient id="paint1_linear_123_2" x1="12.9711" y1="5.04" x2="12.9711" y2="23.1" gradientUnits="userSpaceOnUse">
											<stop stop-color="#FFDB1C" />
											<stop offset="0.0001" stop-color="#FDD400" />
											<stop offset="0.46885" stop-color="#FFC93E" />
											<stop offset="1" stop-color="#FFDB1C" />
										</linearGradient>
									</defs>
								</svg>
							</button>
						</div>
					</div>
					<hr style="color: white" />
					<div class="d-grid gap-2 mb-4 mt-3">
						<button class="btn btn-warning btn-sm text-white" type="submit" name="edit_profit">Simpan</button>
					</div>
					<div class="d-grid gap-2 mb-3">
						<a href="home" class="btn btn-secondary btn-sm text-white">Batal</a>
					</div>
				</form>
			</div>
		</div>

		<!-- Modal alamat wallet -->
		<div class="modal fade" id="alamatwallet" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<form method="post" action="" class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">INPUT ALAMAT WALLET</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<label for="basic-url" class="form-label">DOGE Wallet</label>
						<div class="mb-3">
							<input type="text" autocomplete="off" name="wallet[]" class="form-control shadow-sm" value="<?= $tokenMember->countCurrentBlance("wallet","DOGE",$_SESSION["member_username_bot"]) ?>" placeholder="Doge Address" />
						</div>
						<label for="basic-url" class="form-label">BTTC Wallet | TRC20 </label>
						<div class="mb-3">
							<input type="text" autocomplete="off" name="wallet[]" class="form-control shadow-sm" value="<?= $tokenMember->countCurrentBlance("wallet","BTT",$_SESSION["member_username_bot"]) ?>" placeholder="BTT Address" />
						</div>
						<label for="basic-url" class="form-label">TRON Wallet </label>
						<div class="mb-3">
							<input type="text" autocomplete="off" name="wallet[]" class="form-control shadow-sm" value="<?= $tokenMember->countCurrentBlance("wallet","TRON",$_SESSION["member_username_bot"]) ?>" placeholder="TRON Address" />
						</div>
						<label for="basic-url" class="form-label">SHIBA Wallet | ERC20</label>
						<div class="mb-3">
							<input type="text" autocomplete="off" name="wallet[]" class="form-control shadow-sm" value="<?= $tokenMember->countCurrentBlance("wallet","SHIBA",$_SESSION["member_username_bot"]) ?>" placeholder="SHIBA Address" />
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
						<button type="submit" name="edit_wallet" class="btn btn-success btn-sm">Save</button>
					</div>
				</form>
			</div>
		</div>
		<!-- akhir modal alamat wallet -->

		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<!-- Option 2: Separate Popper and Bootstrap JS -->
		<script src="js/validasiinput.js"></script>
		<script src="js/dist/clipboard.min.js"></script>
		<script>
			var btn = document.querySelector('.bt');

			btn.addEventListener('click', () => {
				var copyText = document.getElementById("referral");
				const textCopied = ClipboardJS.copy(copyText.value);
				alert('copied! '+ textCopied);
			})
		</script>
	</body>
</html>
