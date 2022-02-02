<?php  
require_once "apiclass.php";
require_once "function.php";

if($_SESSION['status_login_member_bot'] != true){
	header('Location: index');
	exit();
}

$aboutUser = new viewMember();
$coinname = $_GET['coin'];
$lvl = $_GET['level'];

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
		<title>Profile</title>
	</head>
	<body>
		<div class="container">
			<div class="row d-flex justify-content-between">
				<div class="col-auto mt-3">
					<a href="referral?coin=<?= $coinname ?>">
						<svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M9.47458 2.08963L5.31202 6.52241H20V9.47759H5.31202L9.47458 13.9104L7.51233 16L0 8L7.51233 0L9.47458 2.08963Z" fill="white" />
						</svg>
					</a>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<a href="detail?level=<?= $lvl ?>&coin=<?= $coinname ?>" class="col text-center mt-3 mb-3">
					<img src="img/logo.png" style="max-width: 70px" class="mx-auto d-block img-fluid" alt="" />
				</a>
			</div>
		</div>
		<div class="container history-trade">
			<!-- <p class="mb-2">JUMLAH BONUS <?= $lvl ?></p>
			<div class="row" id="viewdoge">
				<div class="card-balance col-10 offset-1 text-center mb-3">
					<div class="form-balance">
						
					</div>
				</div>
			</div> -->

			
			<p class="mb-2 mt-5">LIST MEMBER <?= $lvl ?></p>
			<table class="table table-light table-st table-responsive">
				<thead>
					<tr>
						<th scope="col">Username</th>
						<th scope="col">Upline</th>
						<th scope="col">Amount</th>
						<th scope="col">Date</th>
					</tr>
				</thead>
				<tbody>
					<?= $aboutUser->historyBonus("show",$coinname,$_SESSION['member_username_bot'],$lvl); ?>
				</tbody>
			</table>
		</div>

		<section id="footer" class="fixed-bottom" >
			<div class="container">
				<div class="col-12">
					<div class="d-flex justify-content-center">
						<div class="load">
							<a href="detail?level=<?= $lvl ?>&coin=<?= $coinname ?>"
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
		<section id="footer" class="fixed-bottom" >
			<div class="container">
				<div class="col-12">
					<div class="d-flex justify-content-center">
						<div class="load">
							<a href="detail?level=<?= $lvl ?>&coin=<?= $coinname ?>"
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

		<!-- Modal withdraw -->
		<div class="modal fade" id="wdbonus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">WITHDRAW BONUS</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p style="font-size: smaller">Pilih Coin Bonus yang ingin di withdraw</p>
						<select class="form-select form-select-sm" aria-label="Default select example">
							<option selected>Pilih Bonus</option>
							<option value="1">Doge</option>
							<option value="2">BTT</option>
							<option value="3">Tron</option>
							<option value="4">Shiba</option>
						</select>
						<p class="mt-2 text-success" style="font-size: smaller; font-weight: bolder">Jumlah Doge : 203.344</p>
					</div>
					<div class="container">
						<label for="basic-url" class="form-label label-input">Jumlah Doge</label>
						<div class="input-group mb-3">
							<input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-success btn-sm">Withdraw</button>
					</div>
				</div>
			</div>
		</div>
		<!-- akhir modal withdraw -->

		<!-- Modal History Referral -->
		<div class="modal fade" id="historyreff" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable">
				<div class="modal-content" style="background-color: rgb(48, 48, 48)">
					<div class="modal-header text-white">History Withdraw Referral</div>
					<div class="modal-body text-center">
						<table class="table table-dark table-sm table-striped table-responsive text-center" style="font-size: smaller">
							<thead>
								<tr>
									<th scope="col">Type</th>
									<th scope="col">Date</th>
									<th scope="col">Amount</th>
									<th scope="col">Status</th>
									<th scope="col">Confirmation</th>
								</tr>
							</thead>
							<tbody style="font-size: smaller">
								<tr>
									<td>Doge</td>
									<td>01-01-2022 06:12:12</td>
									<td>50</td>
									<td class="text-success">Accepted</td>
									<td>01-01-2022 18:22:12</td>
								</tr>
								<tr>
									<td>BTT</td>
									<td>01-01-2022 06:12:12</td>
									<td>50</td>
									<td class="text-danger">Rejected</td>
									<td>01-01-2022 18:22:12</td>
								</tr>
								<tr>
									<td>TRON</td>
									<td>01-01-2022 06:12:12</td>
									<td>50</td>
									<td class="text-warning">Pending</td>
									<td>01-01-2022 18:22:12</td>
								</tr>
								<tr>
									<td>Doge</td>
									<td>01-01-2022 06:12:12</td>
									<td>50</td>
									<td class="text-success">Accepted</td>
									<td>01-01-2022 18:22:12</td>
								</tr>
								<tr>
									<td>Doge</td>
									<td>01-01-2022 06:12:12</td>
									<td>50</td>
									<td class="text-success">Accepted</td>
									<td>01-01-2022 18:22:12</td>
								</tr>
								<tr>
									<td>Doge</td>
									<td>01-01-2022 06:12:12</td>
									<td>50</td>
									<td class="text-success">Accepted</td>
									<td>01-01-2022 18:22:12</td>
								</tr>
								<tr>
									<td>Doge</td>
									<td>01-01-2022 06:12:12</td>
									<td>50</td>
									<td class="text-success">Accepted</td>
									<td>01-01-2022 18:22:12</td>
								</tr>
								<tr>
									<td>Doge</td>
									<td>01-01-2022 06:12:12</td>
									<td>50</td>
									<td class="text-success">Accepted</td>
									<td>01-01-2022 18:22:12</td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Akhir Modal History Referral-->

		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<!-- Option 2: Separate Popper and Bootstrap JS -->
	</body>
</html>
