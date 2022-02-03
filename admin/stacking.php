<?php  
require_once "apiclass.php";
require_once "../function.php";
if($_SESSION['login_admin_bot'] != true){
	header('Location: index');
	exit();
}
$alert = "";
require_once "stackingaction.php";
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
		<title>BOT TRADE - ADMIN</title>
	</head>
	<body>
		<form method="post" action="" class="container">
			<div class="row">
					<?php if($alert != ""){ ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Mohon Maaf!</strong> Anda sudah melakukan stacking Hari ini.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
                    <?php } ?>
				<h5 class="text-center text-white mt-5 mb-3" style="font-size: smaller">STACKING PROFIT</h5>
				<div class="mb-3">
					<label class="form-label text-white">Profit / Harian</label>
					<input name="persen" step="0.001" required type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
				</div>
			</div>
			<div class="row mb-3">
				<div id="passwordHelpBlock" class="form-text text-warning mb-2">Masukkan volume market disetiap masing masing Coin Market yang berlaku setiap hari</div>
				<div class="col-6"><label class="form-label text-white">Market DOGE</label> <input name="val[]" step="0.001" required type="number" class="form-control mb-2" id="exampleInputEmail1" aria-describedby="emailHelp" /></div>
				<div class="col-6"><label class="form-label text-white">Market BTT</label> <input name="val[]" step="0.001" required type="number" class="form-control mb-2" id="exampleInputEmail1" aria-describedby="emailHelp" /></div>
				<div class="col-6"><label class="form-label text-white">Market TRON</label> <input name="val[]" step="0.001" required type="number" class="form-control mb-2" id="exampleInputEmail1" aria-describedby="emailHelp" /></div>
				<div class="col-6"><label class="form-label text-white">Market SHIBA</label> <input name="val[]" step="0.001" required type="number" class="form-control mb-2" id="exampleInputEmail1" aria-describedby="emailHelp" /></div>
			</div>

			<div class="row">
				<div id="passwordHelpBlock" class="form-text text-warning mb-2">Pilih jenis Order dan Validation</div>
				<div class="col-6">
					<select name="order" required class="form-select" aria-label="Default select example">
						<option value="" >Order</option>
						<option value="Sell">Sell</option>
						<option value="Buy">Buy</option>
					</select>
				</div>
				<div class="col-6">
					<select name="confirm" required class="form-select" aria-label="Default select example">
						<option value="" >Validation</option>
						<option value="Accepted">Accepted</option>
						<option value="Rejected">Rejected</option>
					</select>
				</div>
			</div>
			<div class="d-grid gap-2 mt-5">
				<button class="btn btn-warning" type="submit" name="stacking" style="font-weight: bolder">SUBMIT</button>
			</div>
		</form>

		<section id="footer" class="fixed-bottom">
			<div class="container">
				<div class="d-flex justify-content-between">
					<div class="setting">
						<a href="setting"
							><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M26.625 12L24.25 11.25L25.375 8.99997C25.625 8.49997 25.5 7.87497 25.125 7.49997L22.5 4.87497C22.125 4.49997 21.5 4.37497 21 4.62497L18.75 5.74997L18 3.37497C17.875 2.87497 17.375 2.49997 16.875 2.49997H13.125C12.625 2.49997 12.125 2.87497 12 3.37497L11.125 5.74997L8.875 4.62497C8.5 4.37497 7.875 4.49997 7.5 4.87497L4.875 7.49997C4.5 7.87497 4.375 8.49997 4.625 8.87497L5.75 11.125L3.375 12C2.875 12.125 2.5 12.625 2.5 13.125V16.875C2.5 17.375 2.875 17.875 3.375 18L5.75 18.75L4.625 21C4.375 21.5 4.5 22.125 4.875 22.5L7.5 25.125C7.875 25.5 8.5 25.625 9 25.375L11.25 24.25L12 26.625C12.125 27.125 12.625 27.5 13.125 27.5H16.875C17.375 27.5 17.875 27.125 18 26.625L18.75 24.25L21 25.375C21.5 25.625 22 25.5 22.5 25.125L25.125 22.5C25.5 22.125 25.625 21.5 25.375 21L24.25 18.75L26.625 18C27.125 17.875 27.5 17.375 27.5 16.875V13.125C27.5 12.625 27.125 12.125 26.625 12ZM15 18.75C12.875 18.75 11.25 17.125 11.25 15C11.25 12.875 12.875 11.25 15 11.25C17.125 11.25 18.75 12.875 18.75 15C18.75 17.125 17.125 18.75 15 18.75Z" fill="#4A4008" />
							</svg>
						</a>
					</div>
					<div class="confirm">
						<a href="confirm"
							><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M26.7091 13.2676C26.7091 12.6217 26.1855 12.0981 25.5396 12.0981H18.8415C18.1956 12.0981 17.672 12.6217 17.672 13.2676V16.7761C17.672 17.422 18.1956 17.9456 18.8415 17.9456H25.5396C26.1855 17.9456 26.7091 17.422 26.7091 16.7761V13.2676ZM21.0226 16.4005C20.2697 16.4005 19.6593 15.7901 19.6593 15.0372C19.6593 14.2842 20.2697 13.6738 21.0226 13.6738C21.7756 13.6738 22.3859 14.2842 22.3859 15.0372C22.3859 15.79 21.7756 16.4005 21.0226 16.4005Z" fill="#4A4008" />
								<path d="M16.1313 10.5033H24.7953V6.99477C24.7953 6.11541 24.1154 5.39999 23.236 5.39999H4.63018C3.75082 5.39999 3 6.11541 3 6.99477V23.1552C3 24.0346 3.75082 24.75 4.63018 24.75H23.236C24.1153 24.75 24.7953 24.0346 24.7953 23.1552V19.5404H16.1472L16.1313 10.5033Z" fill="#4A4008" />
							</svg>
						</a>
					</div>
					<div class="dashboard">
						<a href="home"
							><svg width="73" height="73" viewBox="0 0 73 73" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="36.5" cy="36.5" r="36.5" fill="#302E2F" />
								<path fill-rule="evenodd" clip-rule="evenodd" d="M36.3528 13.804C36.9968 13.804 37.6344 13.8287 38.2659 13.8753V11H43.3451V14.769C51.2633 17.013 57.4882 22.9699 59.7668 30.5054H54.7397C51.999 23.4032 44.8013 18.3334 36.3528 18.3334C25.5445 18.3334 16.7826 26.631 16.7826 36.8667C16.7826 47.1024 25.5445 55.4002 36.3528 55.4002C44.818 55.4002 52.0274 50.3102 54.7555 43.1858H59.7802C57.5123 50.7415 51.2784 56.7164 43.3451 58.9646V63H38.2659V59.8583C37.6344 59.9047 36.9968 59.9294 36.3528 59.9294C35.4287 59.9294 34.5168 59.8789 33.6195 59.7841V63H28.5401V58.717C18.9224 55.6344 12 47.0159 12 36.8667C12 26.7175 18.9224 18.0993 28.5401 15.0164V11H33.6195V13.9495C34.5168 13.8545 35.4287 13.804 36.3528 13.804ZM36.9555 34.3709H46.0062H50.9061H60V39.1812H50.9381C49.7733 45.8139 43.6872 50.871 36.3528 50.871C28.1859 50.871 21.5654 44.601 21.5654 36.8667C21.5654 29.1324 28.1859 22.8626 36.3528 22.8626C42.1011 22.8626 47.0832 25.9687 49.53 30.5054H43.7673C41.9368 28.593 39.293 27.3918 36.3528 27.3918C30.8273 27.3918 26.3479 31.6339 26.3479 36.8667C26.3479 42.0996 30.8273 46.3416 36.3528 46.3416C41.0353 46.3416 44.9659 43.2952 46.0565 39.1812H36.9555V34.3709Z" fill="url(#paint0_linear_10_714)" />
								<defs>
									<linearGradient id="paint0_linear_10_714" x1="36" y1="11" x2="36" y2="63" gradientUnits="userSpaceOnUse">
										<stop stop-color="#FFDB1C" />
										<stop offset="0.0001" stop-color="#FDD400" />
										<stop offset="0.46885" stop-color="#FFC93E" />
										<stop offset="1" stop-color="#FFDB1C" />
									</linearGradient>
								</defs>
							</svg>
						</a>
					</div>
					<div class="stacking">
						<a href="stacking"
							><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M15 1.25015C7.375 1.25015 1.25 7.37515 1.25 15.0002C1.25 22.6252 7.375 28.7502 15 28.7502C22.625 28.7502 28.75 22.6252 28.75 15.0002C28.75 7.37515 22.625 1.25015 15 1.25015ZM13.75 13.7502H16.25C18.375 13.7502 20 15.3752 20 17.5002C20 19.6252 18.375 21.2502 16.25 21.2502V22.5002C16.25 23.2502 15.75 23.7502 15 23.7502C14.25 23.7502 13.75 23.2502 13.75 22.5002V21.2502H11.25C10.5 21.2502 10 20.7502 10 20.0002C10 19.2502 10.5 18.7502 11.25 18.7502H16.25C17 18.7502 17.5 18.2502 17.5 17.5002C17.5 16.7502 17 16.2502 16.25 16.2502H13.75C11.625 16.2502 10 14.6252 10 12.5002C10 10.3752 11.625 8.75015 13.75 8.75015V7.50015C13.75 6.75015 14.25 6.25015 15 6.25015C15.75 6.25015 16.25 6.75015 16.25 7.50015V8.75015H18.75C19.5 8.75015 20 9.25015 20 10.0002C20 10.7502 19.5 11.2502 18.75 11.2502H13.75C13 11.2502 12.5 11.7502 12.5 12.5002C12.5 13.2502 13 13.7502 13.75 13.7502Z" fill="#4A4008" />
							</svg>
						</a>
					</div>
					<div class="members">
						<a href="members"
							><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M15.0001 15C18.5001 15 21.2501 12.25 21.2501 8.75C21.2501 5.25 18.5001 2.5 15.0001 2.5C11.5001 2.5 8.75013 5.25 8.75013 8.75C8.75013 12.25 11.5001 15 15.0001 15ZM26.6251 26C25.0001 19.625 18.5001 15.625 12.1251 17.25C7.87513 18.375 4.50013 21.625 3.37513 26C3.25013 26.625 3.62513 27.375 4.37513 27.5C4.50013 27.5 4.62513 27.5 4.62513 27.5H25.3751C26.1251 27.5 26.6251 27 26.6251 26.25C26.6251 26.125 26.6251 26 26.6251 26Z" fill="#4A4008" />
							</svg>
						</a>
					</div>
				</div>
			</div>
		</section>
		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	</body>
</html>
