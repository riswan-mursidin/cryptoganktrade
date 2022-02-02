<?php  
require_once "apiclass.php";
require_once "function.php";
require_once "class/depowd.php";
require_once "depowdaksi.php";

if($_SESSION['status_login_member_bot'] != true){
	header('Location: index');
	exit();
}
$coinname = $_GET['coin'];
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
$aboutUser = new viewMember();
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
				<a href="referral?coin=<?= $coinname ?>" class="col text-center mt-3">
					<img src="img/IC-REFERRAL.png" style="max-width: 32px;" class="mx-auto d-block img-fluid" alt="" />
				</a>
			</div>
			<div class="row mt-3 referral">
				<a href="detail?level=LEVEL1&coin=<?= $coinname ?>" class="col-10 mb-3 bonus d-flex justify-content-between">
					<div>
						<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M7.60326 0.816986C7.97008 0.07374 9.02992 0.07374 9.39674 0.816986L11.0593 4.18573C11.205 4.48087 11.4865 4.68544 11.8122 4.73277L15.5299 5.27297C16.3501 5.39216 16.6776 6.40013 16.0841 6.97866L13.394 9.60086C13.1583 9.8306 13.0508 10.1616 13.1064 10.486L13.7414 14.1886C13.8815 15.0055 13.0241 15.6285 12.2905 15.2428L8.96534 13.4946C8.67402 13.3415 8.32598 13.3415 8.03466 13.4946L4.70951 15.2428C3.97588 15.6285 3.11845 15.0055 3.25856 14.1886L3.89361 10.486C3.94925 10.1616 3.8417 9.8306 3.60601 9.60086L0.915912 6.97866C0.322395 6.40013 0.649905 5.39216 1.47013 5.27297L5.18775 4.73277C5.51346 4.68544 5.79503 4.48087 5.94069 4.18573L7.60326 0.816986Z" fill="black" />
						</svg>
					</div>
					<div class="text-dark">
						<?= $countt[] = $aboutUser->historyBonus("count",$coinname,$_SESSION['member_username_bot'],"LEVEL1")." ".strtoupper($coinname) ?>
					</div>
				</a>
				<a href="detail?level=LEVEL2&coin=<?= $coinname ?>" class="col-10 mb-3 bonus d-flex justify-content-between">
					<div>
						<svg width="40" height="19" viewBox="0 0 40 19" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M29.6033 1.81699C29.9701 1.07374 31.0299 1.07374 31.3967 1.81699L33.0593 5.18573C33.205 5.48087 33.4865 5.68544 33.8122 5.73277L37.5299 6.27297C38.3501 6.39216 38.6776 7.40013 38.0841 7.97866L35.394 10.6009C35.1583 10.8306 35.0508 11.1616 35.1064 11.486L35.7414 15.1886C35.8815 16.0055 35.0241 16.6285 34.2905 16.2428L30.9653 14.4946C30.674 14.3415 30.326 14.3415 30.0347 14.4946L26.7095 16.2428C25.9759 16.6285 25.1185 16.0055 25.2586 15.1886L25.8936 11.486C25.9492 11.1616 25.8417 10.8306 25.606 10.6009L22.9159 7.97866C22.3224 7.40013 22.6499 6.39216 23.4701 6.27297L27.1878 5.73277C27.5135 5.68544 27.795 5.48087 27.9407 5.18573L29.6033 1.81699Z" fill="black" />
							<path d="M8.60326 1.81699C8.97008 1.07374 10.0299 1.07374 10.3967 1.81699L12.0593 5.18573C12.205 5.48087 12.4865 5.68544 12.8122 5.73277L16.5299 6.27297C17.3501 6.39216 17.6776 7.40013 17.0841 7.97866L14.394 10.6009C14.1583 10.8306 14.0508 11.1616 14.1064 11.486L14.7414 15.1886C14.8815 16.0055 14.0241 16.6285 13.2905 16.2428L9.96534 14.4946C9.67402 14.3415 9.32598 14.3415 9.03466 14.4946L5.70951 16.2428C4.97588 16.6285 4.11845 16.0055 4.25856 15.1886L4.89361 11.486C4.94925 11.1616 4.8417 10.8306 4.60601 10.6009L1.91591 7.97866C1.32239 7.40013 1.64991 6.39216 2.47013 6.27297L6.18775 5.73277C6.51346 5.68544 6.79503 5.48087 6.94069 5.18573L8.60326 1.81699Z" fill="black" />
						</svg>
					</div>
					<div class="text-dark">
						<?= $countt[] = $aboutUser->historyBonus("count",$coinname,$_SESSION['member_username_bot'],"LEVEL2")." ".strtoupper($coinname) ?>
					</div>
				</a>
				<a href="detail?level=LEVEL3&coin=<?= $coinname ?>" class="col-10 mb-3 bonus d-flex justify-content-between">
					<div>
						<svg width="62" height="19" viewBox="0 0 62 19" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M51.6033 1.81699C51.9701 1.07374 53.0299 1.07374 53.3967 1.81699L55.0593 5.18573C55.205 5.48087 55.4865 5.68544 55.8122 5.73277L59.5299 6.27297C60.3501 6.39216 60.6776 7.40013 60.0841 7.97866L57.394 10.6009C57.1583 10.8306 57.0508 11.1616 57.1064 11.486L57.7414 15.1886C57.8815 16.0055 57.0241 16.6285 56.2905 16.2428L52.9653 14.4946C52.674 14.3415 52.326 14.3415 52.0347 14.4946L48.7095 16.2428C47.9759 16.6285 47.1185 16.0055 47.2586 15.1886L47.8936 11.486C47.9492 11.1616 47.8417 10.8306 47.606 10.6009L44.9159 7.97866C44.3224 7.40013 44.6499 6.39216 45.4701 6.27297L49.1878 5.73277C49.5135 5.68544 49.795 5.48087 49.9407 5.18573L51.6033 1.81699Z" fill="black" />
							<path d="M29.6033 1.81699C29.9701 1.07374 31.0299 1.07374 31.3967 1.81699L33.0593 5.18573C33.205 5.48087 33.4865 5.68544 33.8122 5.73277L37.5299 6.27297C38.3501 6.39216 38.6776 7.40013 38.0841 7.97866L35.394 10.6009C35.1583 10.8306 35.0508 11.1616 35.1064 11.486L35.7414 15.1886C35.8815 16.0055 35.0241 16.6285 34.2905 16.2428L30.9653 14.4946C30.674 14.3415 30.326 14.3415 30.0347 14.4946L26.7095 16.2428C25.9759 16.6285 25.1185 16.0055 25.2586 15.1886L25.8936 11.486C25.9492 11.1616 25.8417 10.8306 25.606 10.6009L22.9159 7.97866C22.3224 7.40013 22.6499 6.39216 23.4701 6.27297L27.1878 5.73277C27.5135 5.68544 27.795 5.48087 27.9407 5.18573L29.6033 1.81699Z" fill="black" />
							<path d="M8.60326 1.81699C8.97008 1.07374 10.0299 1.07374 10.3967 1.81699L12.0593 5.18573C12.205 5.48087 12.4865 5.68544 12.8122 5.73277L16.5299 6.27297C17.3501 6.39216 17.6776 7.40013 17.0841 7.97866L14.394 10.6009C14.1583 10.8306 14.0508 11.1616 14.1064 11.486L14.7414 15.1886C14.8815 16.0055 14.0241 16.6285 13.2905 16.2428L9.96534 14.4946C9.67402 14.3415 9.32598 14.3415 9.03466 14.4946L5.70951 16.2428C4.97588 16.6285 4.11845 16.0055 4.25856 15.1886L4.89361 11.486C4.94925 11.1616 4.8417 10.8306 4.60601 10.6009L1.91591 7.97866C1.32239 7.40013 1.64991 6.39216 2.47013 6.27297L6.18775 5.73277C6.51346 5.68544 6.79503 5.48087 6.94069 5.18573L8.60326 1.81699Z" fill="black" />
						</svg>
					</div>
					<div class="text-dark">
						<?= $countt[] = $aboutUser->historyBonus("count",$coinname,$_SESSION['member_username_bot'],"LEVEL3")." ".strtoupper($coinname) ?>
					</div>
				</a>
				<a href="detail?level=LEVEL4&coin=<?= $coinname ?>" class="col-10 mb-3 bonus d-flex justify-content-between">
					<div>
						<svg width="83" height="19" viewBox="0 0 83 19" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M51.6033 1.81699C51.9701 1.07374 53.0299 1.07374 53.3967 1.81699L55.0593 5.18573C55.205 5.48087 55.4865 5.68544 55.8122 5.73277L59.5299 6.27297C60.3501 6.39216 60.6776 7.40013 60.0841 7.97866L57.394 10.6009C57.1583 10.8306 57.0508 11.1616 57.1064 11.486L57.7414 15.1886C57.8815 16.0055 57.0241 16.6285 56.2905 16.2428L52.9653 14.4946C52.674 14.3415 52.326 14.3415 52.0347 14.4946L48.7095 16.2428C47.9759 16.6285 47.1185 16.0055 47.2586 15.1886L47.8936 11.486C47.9492 11.1616 47.8417 10.8306 47.606 10.6009L44.9159 7.97866C44.3224 7.40013 44.6499 6.39216 45.4701 6.27297L49.1878 5.73277C49.5135 5.68544 49.795 5.48087 49.9407 5.18573L51.6033 1.81699Z" fill="black" />
							<path d="M72.6033 1.81699C72.9701 1.07374 74.0299 1.07374 74.3967 1.81699L76.0593 5.18573C76.205 5.48087 76.4865 5.68544 76.8122 5.73277L80.5299 6.27297C81.3501 6.39216 81.6776 7.40013 81.0841 7.97866L78.394 10.6009C78.1583 10.8306 78.0508 11.1616 78.1064 11.486L78.7414 15.1886C78.8815 16.0055 78.0241 16.6285 77.2905 16.2428L73.9653 14.4946C73.674 14.3415 73.326 14.3415 73.0347 14.4946L69.7095 16.2428C68.9759 16.6285 68.1185 16.0055 68.2586 15.1886L68.8936 11.486C68.9492 11.1616 68.8417 10.8306 68.606 10.6009L65.9159 7.97866C65.3224 7.40013 65.6499 6.39216 66.4701 6.27297L70.1878 5.73277C70.5135 5.68544 70.795 5.48087 70.9407 5.18573L72.6033 1.81699Z" fill="black" />
							<path d="M29.6033 1.81699C29.9701 1.07374 31.0299 1.07374 31.3967 1.81699L33.0593 5.18573C33.205 5.48087 33.4865 5.68544 33.8122 5.73277L37.5299 6.27297C38.3501 6.39216 38.6776 7.40013 38.0841 7.97866L35.394 10.6009C35.1583 10.8306 35.0508 11.1616 35.1064 11.486L35.7414 15.1886C35.8815 16.0055 35.0241 16.6285 34.2905 16.2428L30.9653 14.4946C30.674 14.3415 30.326 14.3415 30.0347 14.4946L26.7095 16.2428C25.9759 16.6285 25.1185 16.0055 25.2586 15.1886L25.8936 11.486C25.9492 11.1616 25.8417 10.8306 25.606 10.6009L22.9159 7.97866C22.3224 7.40013 22.6499 6.39216 23.4701 6.27297L27.1878 5.73277C27.5135 5.68544 27.795 5.48087 27.9407 5.18573L29.6033 1.81699Z" fill="black" />
							<path d="M8.60326 1.81699C8.97008 1.07374 10.0299 1.07374 10.3967 1.81699L12.0593 5.18573C12.205 5.48087 12.4865 5.68544 12.8122 5.73277L16.5299 6.27297C17.3501 6.39216 17.6776 7.40013 17.0841 7.97866L14.394 10.6009C14.1583 10.8306 14.0508 11.1616 14.1064 11.486L14.7414 15.1886C14.8815 16.0055 14.0241 16.6285 13.2905 16.2428L9.96534 14.4946C9.67402 14.3415 9.32598 14.3415 9.03466 14.4946L5.70951 16.2428C4.97588 16.6285 4.11845 16.0055 4.25856 15.1886L4.89361 11.486C4.94925 11.1616 4.8417 10.8306 4.60601 10.6009L1.91591 7.97866C1.32239 7.40013 1.64991 6.39216 2.47013 6.27297L6.18775 5.73277C6.51346 5.68544 6.79503 5.48087 6.94069 5.18573L8.60326 1.81699Z" fill="black" />
						</svg>
					</div>
					<div class="text-dark">
						<?= $countt[] = $aboutUser->historyBonus("count",$coinname,$_SESSION['member_username_bot'],"LEVEL4")." ".strtoupper($coinname) ?>
					</div>
				</a>
				<a href="detail?level=LEVEL5&coin=<?= $coinname ?>" class="col-10 mb-3 bonus d-flex justify-content-between">
					<div>
						<svg width="105" height="19" viewBox="0 0 105 19" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M51.6033 1.81699C51.9701 1.07374 53.0299 1.07374 53.3967 1.81699L55.0593 5.18573C55.205 5.48087 55.4865 5.68544 55.8122 5.73277L59.5299 6.27297C60.3501 6.39216 60.6776 7.40013 60.0841 7.97866L57.394 10.6009C57.1583 10.8306 57.0508 11.1616 57.1064 11.486L57.7414 15.1886C57.8815 16.0055 57.0241 16.6285 56.2905 16.2428L52.9653 14.4946C52.674 14.3415 52.326 14.3415 52.0347 14.4946L48.7095 16.2428C47.9759 16.6285 47.1185 16.0055 47.2586 15.1886L47.8936 11.486C47.9492 11.1616 47.8417 10.8306 47.606 10.6009L44.9159 7.97866C44.3224 7.40013 44.6499 6.39216 45.4701 6.27297L49.1878 5.73277C49.5135 5.68544 49.795 5.48087 49.9407 5.18573L51.6033 1.81699Z" fill="black" />
							<path d="M72.6033 1.81699C72.9701 1.07374 74.0299 1.07374 74.3967 1.81699L76.0593 5.18573C76.205 5.48087 76.4865 5.68544 76.8122 5.73277L80.5299 6.27297C81.3501 6.39216 81.6776 7.40013 81.0841 7.97866L78.394 10.6009C78.1583 10.8306 78.0508 11.1616 78.1064 11.486L78.7414 15.1886C78.8815 16.0055 78.0241 16.6285 77.2905 16.2428L73.9653 14.4946C73.674 14.3415 73.326 14.3415 73.0347 14.4946L69.7095 16.2428C68.9759 16.6285 68.1185 16.0055 68.2586 15.1886L68.8936 11.486C68.9492 11.1616 68.8417 10.8306 68.606 10.6009L65.9159 7.97866C65.3224 7.40013 65.6499 6.39216 66.4701 6.27297L70.1878 5.73277C70.5135 5.68544 70.795 5.48087 70.9407 5.18573L72.6033 1.81699Z" fill="black" />
							<path d="M94.6033 1.81699C94.9701 1.07374 96.0299 1.07374 96.3967 1.81699L98.0593 5.18573C98.205 5.48087 98.4865 5.68544 98.8122 5.73277L102.53 6.27297C103.35 6.39216 103.678 7.40013 103.084 7.97866L100.394 10.6009C100.158 10.8306 100.051 11.1616 100.106 11.486L100.741 15.1886C100.882 16.0055 100.024 16.6285 99.2905 16.2428L95.9653 14.4946C95.674 14.3415 95.326 14.3415 95.0347 14.4946L91.7095 16.2428C90.9759 16.6285 90.1185 16.0055 90.2586 15.1886L90.8936 11.486C90.9492 11.1616 90.8417 10.8306 90.606 10.6009L87.9159 7.97866C87.3224 7.40013 87.6499 6.39216 88.4701 6.27297L92.1878 5.73277C92.5135 5.68544 92.795 5.48087 92.9407 5.18573L94.6033 1.81699Z" fill="black" />
							<path d="M29.6033 1.81699C29.9701 1.07374 31.0299 1.07374 31.3967 1.81699L33.0593 5.18573C33.205 5.48087 33.4865 5.68544 33.8122 5.73277L37.5299 6.27297C38.3501 6.39216 38.6776 7.40013 38.0841 7.97866L35.394 10.6009C35.1583 10.8306 35.0508 11.1616 35.1064 11.486L35.7414 15.1886C35.8815 16.0055 35.0241 16.6285 34.2905 16.2428L30.9653 14.4946C30.674 14.3415 30.326 14.3415 30.0347 14.4946L26.7095 16.2428C25.9759 16.6285 25.1185 16.0055 25.2586 15.1886L25.8936 11.486C25.9492 11.1616 25.8417 10.8306 25.606 10.6009L22.9159 7.97866C22.3224 7.40013 22.6499 6.39216 23.4701 6.27297L27.1878 5.73277C27.5135 5.68544 27.795 5.48087 27.9407 5.18573L29.6033 1.81699Z" fill="black" />
							<path d="M8.60326 1.81699C8.97008 1.07374 10.0299 1.07374 10.3967 1.81699L12.0593 5.18573C12.205 5.48087 12.4865 5.68544 12.8122 5.73277L16.5299 6.27297C17.3501 6.39216 17.6776 7.40013 17.0841 7.97866L14.394 10.6009C14.1583 10.8306 14.0508 11.1616 14.1064 11.486L14.7414 15.1886C14.8815 16.0055 14.0241 16.6285 13.2905 16.2428L9.96534 14.4946C9.67402 14.3415 9.32598 14.3415 9.03466 14.4946L5.70951 16.2428C4.97588 16.6285 4.11845 16.0055 4.25856 15.1886L4.89361 11.486C4.94925 11.1616 4.8417 10.8306 4.60601 10.6009L1.91591 7.97866C1.32239 7.40013 1.64991 6.39216 2.47013 6.27297L6.18775 5.73277C6.51346 5.68544 6.79503 5.48087 6.94069 5.18573L8.60326 1.81699Z" fill="black" />
						</svg>
					</div>
					<div class="text-dark">
						<?= $countt[] = $aboutUser->historyBonus("count",$coinname,$_SESSION['member_username_bot'],"LEVEL5")." ".strtoupper($coinname) ?>
					</div>
				</a>
				<div class="d-grid gap-2 col-8 offset-2 mb-3">
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#withdraw-<?= $coinname ?>" style="color: white; font-size: smaller" type="button">WITHDRAW BONUS</button>
					<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#historyreff" style="color: white; font-size: smaller" type="button">HISTORY WITHDRAW</button>
				</div>
			</div>
		</div>

		<section id="footer" class="fixed-bottom" >
			<div class="container">
				<div class="col-12">
					<div class="d-flex justify-content-center">
						<div class="load">
							<a href="referral?coin=<?= $coinname ?>"
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
			<div class="modal fade" id="withdraw-<?= $coinname ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog">
					<form method="post" action="" class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticBackdropLabel">WITHDRAW <?= strtoupper($coinname) ?></h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						</div>
						<div class="container">
							<div class="mb-3">
								Jumlah Saldo: <?= $aboutUser->countCurrentBlance("bonus",strtoupper($coinname),$_SESSION["member_username_bot"])." ".strtoupper($coinname) ?>
							</div>
							<label for="basic-url" class="form-label label-input">Jumlah <?= ucfirst(strtoupper($coinname)) ?></label>
							<div class="input-group mb-3">
								<input type="number" step="0.00001" class="form-control" max="<?= $aboutUser->countCurrentBlance("bonus",strtoupper($coinname),$_SESSION["member_username_bot"]) ?>" value="<?= $aboutUser->countCurrentBlance("bonus",strtoupper($coinname),$_SESSION["member_username_bot"]) ?>" name="jumlahh_wd"/>
								<input type="hidden" name="url_wallet" value="<?= $aboutUser->countCurrentBlance("wallet",strtoupper($coinname),$_SESSION["member_username_bot"]) ?>">
								<input type="hidden" name="coin" value="<?= strtoupper($coinname) ?>">
							</div>
							<?php $memberr = new getAllMember(); ?>
							<p style="font-size: 10px;">*Biaya Robot <?= $memberr->getBiayaAdmin("Withdraw")*100 ?>%</p>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success btn-sm" name="wd_bonus_aksi">Withdraw</button>
						</div>
					</form>
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
										<th scope="col">Date</th>
										<th scope="col">Amount</th>
										<th scope="col">Admin</th>
										<th scope="col">Status</th>
										<th scope="col">Confirmation</th>
									</tr>
								</thead>
								<tbody style="font-size: smaller;">
									<?= $aboutUser->historyWithdraw(strtoupper($coinname),$_SESSION['member_username_bot'],"BONUS") ?>
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
