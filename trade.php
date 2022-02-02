<?php  
require_once "apiclass.php";
require_once "function.php";

if($_SESSION['status_login_member_bot'] != true){
	header('Location: index');
	exit();
}

$aboutUser = new viewMember();
$coinname = $_GET['coin'];

// check url valid
$array = array("doge","btt","tron","shiba");
$countcheck = 0;
foreach($array as $a){
	if($a == $coinname){
		++$countcheck;
	}
}
if($countcheck == 0){
	header('Location: home');
	exit();
}
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
		<style>
			.footer{
				background: #FFDB1C; 
				border-radius: 15px 15px 0px 0px;
				/* text-align: center; */
			}
			.load{
				
				
				margin: auto;
			}
		</style>
		<title>Trade</title>
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

		<div class="container mt-5">
			<!-- <div class="row">
				<a href="trade?coin=<?= $coinname ?>" class="col-12 mb-4 mt-2">
					<img src="img/logo.png" alt="" class="mx-auto d-block mt-3 logo-home" />
				</a>
			</div> -->
			<div class="row">
				<div class="card-balance col-6 text-center mb-3">
					TOTAL PROFIT <?= strtoupper($coinname) ?>
					<div class="form-balance">
						<?= $aboutUser->countCurrentBlance("profit",strtoupper($coinname),$_SESSION['member_username_bot']) ?>
					</div>
				</div>
				<div class="card-balance col-6 text-center mb-3">
					TOTAL WITHDRAW <?= strtoupper($coinname) ?>
					<div class="form-balance">
						<?= $aboutUser->countWithdraw(strtoupper($coinname),$_SESSION['member_username_bot']) ?>
					</div>
				</div>
				<div class="card-balance col-10 offset-1 text-center mb-3">
					CURRENT BALANCE <?= strtoupper($coinname) ?>
					<div class="form-balance">
						<?= $aboutUser->countCurrentBlance("saldo",strtoupper($coinname),$_SESSION['member_username_bot']) ?>
					</div>
				</div>
			</div>
		</div>
		<div class="container history-trade mt-3">
			<table class="table table-dark table-striped text-center">
				<thead>
					<tr>
						<th scope="col">Order</th>
						<th scope="col">Date</th>
						<th scope="col">Volume</th>
						<th scope="col">Risk</th>
						<th scope="col">Approve</th>
						<th scope="col">Profit</th>
					</tr>
				</thead>
				<tbody>
					<?= $aboutUser->historyProfit(strtoupper($coinname),$_SESSION['member_username_bot']) ?>
				</tbody>
			</table>
		</div>

		<section id="footer" class="fixed-bottom" >
			<div class="container">
				<div class="col-12">
					<div class="d-flex justify-content-center">
						<div class="load">
							<a href="trade?coin=<?= $coinname ?>"
								><svg class="logo-footer" width="40" height="40" viewBox="0 0 73 73" fill="none" xmlns="http://www.w3.org/2000/svg" >
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
					</div>
				</div>
			</div>
		</section>

		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<!-- Option 2: Separate Popper and Bootstrap JS -->
	</body>
</html>
