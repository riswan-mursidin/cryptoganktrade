<?php  
require_once "apiclass.php";
require_once "function.php";
require_once "class/depowd.php";
require_once "depowdaksi.php";

if($_SESSION['status_login_member_bot'] != true){
	header('Location: index');
	exit();
}

$aboutUser = new viewMember();
$aboutAdmin = new getAllAdmin();
	$tempdir = 'qrcode';
    $files = glob($tempdir.'/*'); // get all file names
    foreach($files as $file){ // iterate files
        if(is_file($file)) {
            unlink($file); // delete file
        }
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
		<link rel="stylesheet" href="style.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
		<!-- <link rel="stylesheet" href="style.css"> -->
		<title>Home</title>
	</head>
	<body>
		<div class="container">
			<div class="row d-flex justify-content-between">
				<!-- profil navigator -->
				<div class="col-auto mt-3">
					<a href="profile">
						<svg width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 2.54917C0 1.14106 1.17366 0 2.622 0H21.0351C22.4835 0 23.6571 1.14106 23.6571 2.54917V20.4508C23.6571 21.1269 23.3809 21.7753 22.8892 22.2534C22.3975 22.7314 21.7305 23 21.0351 23H2.622C1.9266 23 1.25969 22.7314 0.767966 22.2534C0.276246 21.7753 0 21.1269 0 20.4508V2.54917ZM4.41206 19.1667H19.5132C18.6663 17.9827 17.5372 17.0156 16.2223 16.3481C14.9075 15.6805 13.446 15.3324 11.9626 15.3333C10.4793 15.3324 9.01777 15.6805 7.70291 16.3481C6.38805 17.0156 5.25895 17.9827 4.41206 19.1667ZM11.8286 12.7778C12.4327 12.7778 13.0308 12.6621 13.5889 12.4374C14.147 12.2126 14.6541 11.8832 15.0813 11.4679C15.5084 11.0526 15.8472 10.5596 16.0784 10.017C16.3096 9.47441 16.4286 8.89286 16.4286 8.30556C16.4286 7.71826 16.3096 7.13671 16.0784 6.59411C15.8472 6.05152 15.5084 5.5585 15.0813 5.14322C14.6541 4.72793 14.147 4.39851 13.5889 4.17376C13.0308 3.94901 12.4327 3.83333 11.8286 3.83333C10.6086 3.83333 9.43855 4.30451 8.57588 5.14322C7.71321 5.98192 7.22857 7.11945 7.22857 8.30556C7.22857 9.49166 7.71321 10.6292 8.57588 11.4679C9.43855 12.3066 10.6086 12.7778 11.8286 12.7778Z" fill="white" /></svg>
					</a>
				</div>
				<!-- end profil navigator -->

				<!-- logout navigator -->
				<div class="col-auto mt-3">
					<a href="logout">
						<svg width="30" height="23" viewBox="0 0 30 23" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 2.875C0 2.1125 0.306093 1.38123 0.850941 0.842068C1.39579 0.302901 2.13476 0 2.90529 0H15.9791C16.7496 0 17.4886 0.302901 18.0335 0.842068C18.5783 1.38123 18.8844 2.1125 18.8844 2.875V5.75C18.8844 6.13125 18.7314 6.49688 18.4589 6.76647C18.1865 7.03605 17.817 7.1875 17.4318 7.1875C17.0465 7.1875 16.677 7.03605 16.4046 6.76647C16.1322 6.49688 15.9791 6.13125 15.9791 5.75V2.875H2.90529V20.125H15.9791V17.25C15.9791 16.8688 16.1322 16.5031 16.4046 16.2335C16.677 15.964 17.0465 15.8125 17.4318 15.8125C17.817 15.8125 18.1865 15.964 18.4589 16.2335C18.7314 16.5031 18.8844 16.8688 18.8844 17.25V20.125C18.8844 20.8875 18.5783 21.6188 18.0335 22.1579C17.4886 22.6971 16.7496 23 15.9791 23H2.90529C2.13476 23 1.39579 22.6971 0.850941 22.1579C0.306093 21.6188 0 20.8875 0 20.125V2.875ZM22.2153 6.17119C22.4877 5.9017 22.8572 5.75031 23.2424 5.75031C23.6275 5.75031 23.997 5.9017 24.2694 6.17119L28.6273 10.4837C28.8996 10.7533 29.0526 11.1188 29.0526 11.5C29.0526 11.8812 28.8996 12.2467 28.6273 12.5163L24.2694 16.8288C23.9954 17.0907 23.6285 17.2356 23.2476 17.2323C22.8667 17.229 22.5024 17.0778 22.233 16.8113C21.9637 16.5448 21.8109 16.1842 21.8076 15.8073C21.8043 15.4304 21.9507 15.0673 22.2153 14.7962L24.0936 12.9375H10.1685C9.78326 12.9375 9.41378 12.786 9.14135 12.5165C8.86893 12.2469 8.71588 11.8812 8.71588 11.5C8.71588 11.1188 8.86893 10.7531 9.14135 10.4835C9.41378 10.214 9.78326 10.0625 10.1685 10.0625H24.0936L22.2153 8.20381C21.943 7.93424 21.79 7.56867 21.79 7.1875C21.79 6.80633 21.943 6.44076 22.2153 6.17119Z" fill="white" /></svg>
					</a>
				</div>
				<!-- end logout navigator -->
			</div>
		</div>

		<div class="container mt-5">

			<!-- <div class="row">
				<a href="home" class="col-12 mb-4 mt-2">
					<img src="img/logo.png" alt="" class="mx-auto d-block mt-3 logo-home" />
				</a>
			</div> -->
			
			<div class="row" id="viewdoge">
				
				<div class="card-balance col-6 text-center mb-3">
					TOTAL PROFIT DOGE
					<div class="form-balance">
						<?= $aboutUser->countCurrentBlance("profit","DOGE",$_SESSION['member_username_bot']) ?>
					</div>
				</div>
				
				<div class="card-balance col-6 text-center mb-3">
					TOTAL WITHDRAW DOGE
					<a data-bs-toggle="modal" id href="#historywd">
						<div class="form-balance">
							<?= $aboutUser->countWithdraw("DOGE",$_SESSION['member_username_bot'],"NOBONUS") ?>
							<span class="ms-1"
							><svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M2.64627 2.9993H3.25033C3.44927 2.9993 3.64005 3.07832 3.78072 3.21899C3.92138 3.35966 4.00041 3.55044 4.00041 3.74937C4.00041 3.94831 3.92138 4.13909 3.78072 4.27976C3.64005 4.42043 3.44927 4.49945 3.25033 4.49945H0.750077C0.551144 4.49945 0.360359 4.42043 0.219692 4.27976C0.0790256 4.13909 0 3.94831 0 3.74937V1.24912C4.19219e-09 1.05019 0.0790256 0.859401 0.219692 0.718734C0.360359 0.578067 0.551144 0.499042 0.750077 0.499042C0.949009 0.499042 1.13979 0.578067 1.28046 0.718734C1.42113 0.859401 1.50015 1.05019 1.50015 1.24912V2.0302C2.405 1.00484 3.63293 0.319307 4.98059 0.0871283C6.32825 -0.145051 7.7148 0.0900547 8.91059 0.753508C10.1064 1.41696 11.0397 2.46896 11.556 3.73528C12.0722 5.00161 12.1405 6.40628 11.7494 7.71669C11.3583 9.02709 10.5314 10.1646 9.4055 10.9408C8.27964 11.7171 6.92242 12.0855 5.5586 11.985C4.19478 11.8846 2.90618 11.3213 1.9062 10.3885C0.906228 9.45565 0.254873 8.20925 0.0600061 6.85569C0.0318903 6.65862 0.0832141 6.45844 0.202687 6.29921C0.32216 6.13997 0.499995 6.03472 0.697071 6.0066C0.894147 5.97849 1.09432 6.02981 1.25356 6.14929C1.41279 6.26876 1.51804 6.44659 1.54616 6.64367C1.69258 7.65764 2.18049 8.59134 2.92931 9.29052C3.67812 9.9897 4.64304 10.4125 5.66466 10.4892C6.68628 10.5658 7.70348 10.2917 8.54823 9.71205C9.39298 9.13242 10.0147 8.28197 10.3108 7.30119C10.6069 6.32041 10.5595 5.26798 10.1766 4.31775C9.79365 3.36752 9.09803 2.57634 8.20464 2.07491C7.31125 1.57348 6.27354 1.39179 5.26293 1.55986C4.25232 1.72793 3.32928 2.2357 2.64627 2.9993ZM5.75059 2.9993C5.94952 2.9993 6.14031 3.07832 6.28097 3.21899C6.42164 3.35966 6.50066 3.55044 6.50066 3.74937V5.49955H7.25074C7.44967 5.49955 7.64046 5.57858 7.78113 5.71925C7.92179 5.85991 8.00082 6.0507 8.00082 6.24963C8.00082 6.44856 7.92179 6.63935 7.78113 6.78001C7.64046 6.92068 7.44967 6.99971 7.25074 6.99971H5.75059C5.55166 6.99971 5.36087 6.92068 5.2202 6.78001C5.07954 6.63935 5.00051 6.44856 5.00051 6.24963V3.74937C5.00051 3.55044 5.07954 3.35966 5.2202 3.21899C5.36087 3.07832 5.55166 2.9993 5.75059 2.9993V2.9993Z" fill="black" />
							</svg>
						</span>
						</div>
					</a>
				</div>
				
				<div class="card-balance col-10 offset-1 text-center mb-3">
					CURRENT BALANCE DOGE
					<a data-bs-toggle="modal" data-bs-target="#historydepo">
						<div class="form-balance">
							<?= $aboutUser->countCurrentBlance("saldo","DOGE",$_SESSION['member_username_bot']) ?>
							<span class="ms-1"
								><svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M2.64627 2.9993H3.25033C3.44927 2.9993 3.64005 3.07832 3.78072 3.21899C3.92138 3.35966 4.00041 3.55044 4.00041 3.74937C4.00041 3.94831 3.92138 4.13909 3.78072 4.27976C3.64005 4.42043 3.44927 4.49945 3.25033 4.49945H0.750077C0.551144 4.49945 0.360359 4.42043 0.219692 4.27976C0.0790256 4.13909 0 3.94831 0 3.74937V1.24912C4.19219e-09 1.05019 0.0790256 0.859401 0.219692 0.718734C0.360359 0.578067 0.551144 0.499042 0.750077 0.499042C0.949009 0.499042 1.13979 0.578067 1.28046 0.718734C1.42113 0.859401 1.50015 1.05019 1.50015 1.24912V2.0302C2.405 1.00484 3.63293 0.319307 4.98059 0.0871283C6.32825 -0.145051 7.7148 0.0900547 8.91059 0.753508C10.1064 1.41696 11.0397 2.46896 11.556 3.73528C12.0722 5.00161 12.1405 6.40628 11.7494 7.71669C11.3583 9.02709 10.5314 10.1646 9.4055 10.9408C8.27964 11.7171 6.92242 12.0855 5.5586 11.985C4.19478 11.8846 2.90618 11.3213 1.9062 10.3885C0.906228 9.45565 0.254873 8.20925 0.0600061 6.85569C0.0318903 6.65862 0.0832141 6.45844 0.202687 6.29921C0.32216 6.13997 0.499995 6.03472 0.697071 6.0066C0.894147 5.97849 1.09432 6.02981 1.25356 6.14929C1.41279 6.26876 1.51804 6.44659 1.54616 6.64367C1.69258 7.65764 2.18049 8.59134 2.92931 9.29052C3.67812 9.9897 4.64304 10.4125 5.66466 10.4892C6.68628 10.5658 7.70348 10.2917 8.54823 9.71205C9.39298 9.13242 10.0147 8.28197 10.3108 7.30119C10.6069 6.32041 10.5595 5.26798 10.1766 4.31775C9.79365 3.36752 9.09803 2.57634 8.20464 2.07491C7.31125 1.57348 6.27354 1.39179 5.26293 1.55986C4.25232 1.72793 3.32928 2.2357 2.64627 2.9993ZM5.75059 2.9993C5.94952 2.9993 6.14031 3.07832 6.28097 3.21899C6.42164 3.35966 6.50066 3.55044 6.50066 3.74937V5.49955H7.25074C7.44967 5.49955 7.64046 5.57858 7.78113 5.71925C7.92179 5.85991 8.00082 6.0507 8.00082 6.24963C8.00082 6.44856 7.92179 6.63935 7.78113 6.78001C7.64046 6.92068 7.44967 6.99971 7.25074 6.99971H5.75059C5.55166 6.99971 5.36087 6.92068 5.2202 6.78001C5.07954 6.63935 5.00051 6.44856 5.00051 6.24963V3.74937C5.00051 3.55044 5.07954 3.35966 5.2202 3.21899C5.36087 3.07832 5.55166 2.9993 5.75059 2.9993V2.9993Z" fill="black" />
								</svg>
							</span>
						</div>
					</a>
				</div>
			</div>
			<div class="row" style="display: none;" id="viewbtt">

				<div class="card-balance col-6 text-center mb-3">
					TOTAL PROFIT BTT
					<div class="form-balance">
					<?= $aboutUser->countCurrentBlance("profit","BTT",$_SESSION['member_username_bot']) ?>
					</div>
				</div>

				<div class="card-balance col-6 text-center mb-3">
					TOTAL WITHDRAW BTT
					<a data-bs-toggle="modal" data-bs-target="#historywd">
						<div class="form-balance">
							<?= $aboutUser->countWithdraw("BTT",$_SESSION['member_username_bot'],"NOBONUS") ?>
							<span class="ms-1"
								><svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M2.64627 2.9993H3.25033C3.44927 2.9993 3.64005 3.07832 3.78072 3.21899C3.92138 3.35966 4.00041 3.55044 4.00041 3.74937C4.00041 3.94831 3.92138 4.13909 3.78072 4.27976C3.64005 4.42043 3.44927 4.49945 3.25033 4.49945H0.750077C0.551144 4.49945 0.360359 4.42043 0.219692 4.27976C0.0790256 4.13909 0 3.94831 0 3.74937V1.24912C4.19219e-09 1.05019 0.0790256 0.859401 0.219692 0.718734C0.360359 0.578067 0.551144 0.499042 0.750077 0.499042C0.949009 0.499042 1.13979 0.578067 1.28046 0.718734C1.42113 0.859401 1.50015 1.05019 1.50015 1.24912V2.0302C2.405 1.00484 3.63293 0.319307 4.98059 0.0871283C6.32825 -0.145051 7.7148 0.0900547 8.91059 0.753508C10.1064 1.41696 11.0397 2.46896 11.556 3.73528C12.0722 5.00161 12.1405 6.40628 11.7494 7.71669C11.3583 9.02709 10.5314 10.1646 9.4055 10.9408C8.27964 11.7171 6.92242 12.0855 5.5586 11.985C4.19478 11.8846 2.90618 11.3213 1.9062 10.3885C0.906228 9.45565 0.254873 8.20925 0.0600061 6.85569C0.0318903 6.65862 0.0832141 6.45844 0.202687 6.29921C0.32216 6.13997 0.499995 6.03472 0.697071 6.0066C0.894147 5.97849 1.09432 6.02981 1.25356 6.14929C1.41279 6.26876 1.51804 6.44659 1.54616 6.64367C1.69258 7.65764 2.18049 8.59134 2.92931 9.29052C3.67812 9.9897 4.64304 10.4125 5.66466 10.4892C6.68628 10.5658 7.70348 10.2917 8.54823 9.71205C9.39298 9.13242 10.0147 8.28197 10.3108 7.30119C10.6069 6.32041 10.5595 5.26798 10.1766 4.31775C9.79365 3.36752 9.09803 2.57634 8.20464 2.07491C7.31125 1.57348 6.27354 1.39179 5.26293 1.55986C4.25232 1.72793 3.32928 2.2357 2.64627 2.9993ZM5.75059 2.9993C5.94952 2.9993 6.14031 3.07832 6.28097 3.21899C6.42164 3.35966 6.50066 3.55044 6.50066 3.74937V5.49955H7.25074C7.44967 5.49955 7.64046 5.57858 7.78113 5.71925C7.92179 5.85991 8.00082 6.0507 8.00082 6.24963C8.00082 6.44856 7.92179 6.63935 7.78113 6.78001C7.64046 6.92068 7.44967 6.99971 7.25074 6.99971H5.75059C5.55166 6.99971 5.36087 6.92068 5.2202 6.78001C5.07954 6.63935 5.00051 6.44856 5.00051 6.24963V3.74937C5.00051 3.55044 5.07954 3.35966 5.2202 3.21899C5.36087 3.07832 5.55166 2.9993 5.75059 2.9993V2.9993Z" fill="black" />
								</svg>
							</span>
						</div>
					</a>
				</div>

				<div class="card-balance col-10 offset-1 text-center mb-3">
					CURRENT BALANCE BTT
					<a data-bs-toggle="modal" data-bs-target="#historydepo">
						<div class="form-balance">
							<?= $aboutUser->countCurrentBlance("saldo","BTT",$_SESSION['member_username_bot']) ?>
							<span class="ms-1"
								><svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M2.64627 2.9993H3.25033C3.44927 2.9993 3.64005 3.07832 3.78072 3.21899C3.92138 3.35966 4.00041 3.55044 4.00041 3.74937C4.00041 3.94831 3.92138 4.13909 3.78072 4.27976C3.64005 4.42043 3.44927 4.49945 3.25033 4.49945H0.750077C0.551144 4.49945 0.360359 4.42043 0.219692 4.27976C0.0790256 4.13909 0 3.94831 0 3.74937V1.24912C4.19219e-09 1.05019 0.0790256 0.859401 0.219692 0.718734C0.360359 0.578067 0.551144 0.499042 0.750077 0.499042C0.949009 0.499042 1.13979 0.578067 1.28046 0.718734C1.42113 0.859401 1.50015 1.05019 1.50015 1.24912V2.0302C2.405 1.00484 3.63293 0.319307 4.98059 0.0871283C6.32825 -0.145051 7.7148 0.0900547 8.91059 0.753508C10.1064 1.41696 11.0397 2.46896 11.556 3.73528C12.0722 5.00161 12.1405 6.40628 11.7494 7.71669C11.3583 9.02709 10.5314 10.1646 9.4055 10.9408C8.27964 11.7171 6.92242 12.0855 5.5586 11.985C4.19478 11.8846 2.90618 11.3213 1.9062 10.3885C0.906228 9.45565 0.254873 8.20925 0.0600061 6.85569C0.0318903 6.65862 0.0832141 6.45844 0.202687 6.29921C0.32216 6.13997 0.499995 6.03472 0.697071 6.0066C0.894147 5.97849 1.09432 6.02981 1.25356 6.14929C1.41279 6.26876 1.51804 6.44659 1.54616 6.64367C1.69258 7.65764 2.18049 8.59134 2.92931 9.29052C3.67812 9.9897 4.64304 10.4125 5.66466 10.4892C6.68628 10.5658 7.70348 10.2917 8.54823 9.71205C9.39298 9.13242 10.0147 8.28197 10.3108 7.30119C10.6069 6.32041 10.5595 5.26798 10.1766 4.31775C9.79365 3.36752 9.09803 2.57634 8.20464 2.07491C7.31125 1.57348 6.27354 1.39179 5.26293 1.55986C4.25232 1.72793 3.32928 2.2357 2.64627 2.9993ZM5.75059 2.9993C5.94952 2.9993 6.14031 3.07832 6.28097 3.21899C6.42164 3.35966 6.50066 3.55044 6.50066 3.74937V5.49955H7.25074C7.44967 5.49955 7.64046 5.57858 7.78113 5.71925C7.92179 5.85991 8.00082 6.0507 8.00082 6.24963C8.00082 6.44856 7.92179 6.63935 7.78113 6.78001C7.64046 6.92068 7.44967 6.99971 7.25074 6.99971H5.75059C5.55166 6.99971 5.36087 6.92068 5.2202 6.78001C5.07954 6.63935 5.00051 6.44856 5.00051 6.24963V3.74937C5.00051 3.55044 5.07954 3.35966 5.2202 3.21899C5.36087 3.07832 5.55166 2.9993 5.75059 2.9993V2.9993Z" fill="black" />
								</svg>
							</span>
						</div>
					</a>
				</div>
			</div>
			<div class="row" style="display: none;" id="viewtron">

				<div class="card-balance col-6 text-center mb-3">
					TOTAL PROFIT TRON
					<div class="form-balance">
						<?= $aboutUser->countCurrentBlance("profit","TRON",$_SESSION['member_username_bot']) ?>
					</div>
				</div>

				<div class="card-balance col-6 text-center mb-3">
					TOTAL WITHDRAW TRON
					<a data-bs-toggle="modal" data-bs-target="#historywd">
						<div class="form-balance">
							<?= $aboutUser->countWithdraw("TRON",$_SESSION['member_username_bot'],"NOBONUS") ?>
							<span class="ms-1"
								><svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M2.64627 2.9993H3.25033C3.44927 2.9993 3.64005 3.07832 3.78072 3.21899C3.92138 3.35966 4.00041 3.55044 4.00041 3.74937C4.00041 3.94831 3.92138 4.13909 3.78072 4.27976C3.64005 4.42043 3.44927 4.49945 3.25033 4.49945H0.750077C0.551144 4.49945 0.360359 4.42043 0.219692 4.27976C0.0790256 4.13909 0 3.94831 0 3.74937V1.24912C4.19219e-09 1.05019 0.0790256 0.859401 0.219692 0.718734C0.360359 0.578067 0.551144 0.499042 0.750077 0.499042C0.949009 0.499042 1.13979 0.578067 1.28046 0.718734C1.42113 0.859401 1.50015 1.05019 1.50015 1.24912V2.0302C2.405 1.00484 3.63293 0.319307 4.98059 0.0871283C6.32825 -0.145051 7.7148 0.0900547 8.91059 0.753508C10.1064 1.41696 11.0397 2.46896 11.556 3.73528C12.0722 5.00161 12.1405 6.40628 11.7494 7.71669C11.3583 9.02709 10.5314 10.1646 9.4055 10.9408C8.27964 11.7171 6.92242 12.0855 5.5586 11.985C4.19478 11.8846 2.90618 11.3213 1.9062 10.3885C0.906228 9.45565 0.254873 8.20925 0.0600061 6.85569C0.0318903 6.65862 0.0832141 6.45844 0.202687 6.29921C0.32216 6.13997 0.499995 6.03472 0.697071 6.0066C0.894147 5.97849 1.09432 6.02981 1.25356 6.14929C1.41279 6.26876 1.51804 6.44659 1.54616 6.64367C1.69258 7.65764 2.18049 8.59134 2.92931 9.29052C3.67812 9.9897 4.64304 10.4125 5.66466 10.4892C6.68628 10.5658 7.70348 10.2917 8.54823 9.71205C9.39298 9.13242 10.0147 8.28197 10.3108 7.30119C10.6069 6.32041 10.5595 5.26798 10.1766 4.31775C9.79365 3.36752 9.09803 2.57634 8.20464 2.07491C7.31125 1.57348 6.27354 1.39179 5.26293 1.55986C4.25232 1.72793 3.32928 2.2357 2.64627 2.9993ZM5.75059 2.9993C5.94952 2.9993 6.14031 3.07832 6.28097 3.21899C6.42164 3.35966 6.50066 3.55044 6.50066 3.74937V5.49955H7.25074C7.44967 5.49955 7.64046 5.57858 7.78113 5.71925C7.92179 5.85991 8.00082 6.0507 8.00082 6.24963C8.00082 6.44856 7.92179 6.63935 7.78113 6.78001C7.64046 6.92068 7.44967 6.99971 7.25074 6.99971H5.75059C5.55166 6.99971 5.36087 6.92068 5.2202 6.78001C5.07954 6.63935 5.00051 6.44856 5.00051 6.24963V3.74937C5.00051 3.55044 5.07954 3.35966 5.2202 3.21899C5.36087 3.07832 5.55166 2.9993 5.75059 2.9993V2.9993Z" fill="black" />
								</svg>
							</span>
						</div>
					</a>
				</div>

				<div class="card-balance col-10 offset-1 text-center mb-3">
					CURRENT BALANCE TRON
					<a data-bs-toggle="modal" data-bs-target="#historydepo">
						<div class="form-balance">
							<?= $aboutUser->countCurrentBlance("saldo","TRON",$_SESSION['member_username_bot']) ?>
							<span class="ms-1"
								><svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M2.64627 2.9993H3.25033C3.44927 2.9993 3.64005 3.07832 3.78072 3.21899C3.92138 3.35966 4.00041 3.55044 4.00041 3.74937C4.00041 3.94831 3.92138 4.13909 3.78072 4.27976C3.64005 4.42043 3.44927 4.49945 3.25033 4.49945H0.750077C0.551144 4.49945 0.360359 4.42043 0.219692 4.27976C0.0790256 4.13909 0 3.94831 0 3.74937V1.24912C4.19219e-09 1.05019 0.0790256 0.859401 0.219692 0.718734C0.360359 0.578067 0.551144 0.499042 0.750077 0.499042C0.949009 0.499042 1.13979 0.578067 1.28046 0.718734C1.42113 0.859401 1.50015 1.05019 1.50015 1.24912V2.0302C2.405 1.00484 3.63293 0.319307 4.98059 0.0871283C6.32825 -0.145051 7.7148 0.0900547 8.91059 0.753508C10.1064 1.41696 11.0397 2.46896 11.556 3.73528C12.0722 5.00161 12.1405 6.40628 11.7494 7.71669C11.3583 9.02709 10.5314 10.1646 9.4055 10.9408C8.27964 11.7171 6.92242 12.0855 5.5586 11.985C4.19478 11.8846 2.90618 11.3213 1.9062 10.3885C0.906228 9.45565 0.254873 8.20925 0.0600061 6.85569C0.0318903 6.65862 0.0832141 6.45844 0.202687 6.29921C0.32216 6.13997 0.499995 6.03472 0.697071 6.0066C0.894147 5.97849 1.09432 6.02981 1.25356 6.14929C1.41279 6.26876 1.51804 6.44659 1.54616 6.64367C1.69258 7.65764 2.18049 8.59134 2.92931 9.29052C3.67812 9.9897 4.64304 10.4125 5.66466 10.4892C6.68628 10.5658 7.70348 10.2917 8.54823 9.71205C9.39298 9.13242 10.0147 8.28197 10.3108 7.30119C10.6069 6.32041 10.5595 5.26798 10.1766 4.31775C9.79365 3.36752 9.09803 2.57634 8.20464 2.07491C7.31125 1.57348 6.27354 1.39179 5.26293 1.55986C4.25232 1.72793 3.32928 2.2357 2.64627 2.9993ZM5.75059 2.9993C5.94952 2.9993 6.14031 3.07832 6.28097 3.21899C6.42164 3.35966 6.50066 3.55044 6.50066 3.74937V5.49955H7.25074C7.44967 5.49955 7.64046 5.57858 7.78113 5.71925C7.92179 5.85991 8.00082 6.0507 8.00082 6.24963C8.00082 6.44856 7.92179 6.63935 7.78113 6.78001C7.64046 6.92068 7.44967 6.99971 7.25074 6.99971H5.75059C5.55166 6.99971 5.36087 6.92068 5.2202 6.78001C5.07954 6.63935 5.00051 6.44856 5.00051 6.24963V3.74937C5.00051 3.55044 5.07954 3.35966 5.2202 3.21899C5.36087 3.07832 5.55166 2.9993 5.75059 2.9993V2.9993Z" fill="black" />
								</svg>
							</span>
						</div>
					</a>
				</div>
			</div>
			<div class="row" style="display: none;" id="viewshiba">

				<div class="card-balance col-6 text-center mb-3">
					TOTAL PROFIT SHIBA
					<div class="form-balance">
					<?= $aboutUser->countCurrentBlance("profit","SHIBA",$_SESSION['member_username_bot']) ?>
					</div>
				</div>

				<div class="card-balance col-6 text-center mb-3">
					TOTAL WITHDRAW SHIBA
					<a data-bs-toggle="modal" data-bs-target="#historywd">
						<div class="form-balance">
						<?= $aboutUser->countWithdraw("SHIBA",$_SESSION['member_username_bot'],"NOBONUS") ?>
							<span class="ms-1"
								><svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M2.64627 2.9993H3.25033C3.44927 2.9993 3.64005 3.07832 3.78072 3.21899C3.92138 3.35966 4.00041 3.55044 4.00041 3.74937C4.00041 3.94831 3.92138 4.13909 3.78072 4.27976C3.64005 4.42043 3.44927 4.49945 3.25033 4.49945H0.750077C0.551144 4.49945 0.360359 4.42043 0.219692 4.27976C0.0790256 4.13909 0 3.94831 0 3.74937V1.24912C4.19219e-09 1.05019 0.0790256 0.859401 0.219692 0.718734C0.360359 0.578067 0.551144 0.499042 0.750077 0.499042C0.949009 0.499042 1.13979 0.578067 1.28046 0.718734C1.42113 0.859401 1.50015 1.05019 1.50015 1.24912V2.0302C2.405 1.00484 3.63293 0.319307 4.98059 0.0871283C6.32825 -0.145051 7.7148 0.0900547 8.91059 0.753508C10.1064 1.41696 11.0397 2.46896 11.556 3.73528C12.0722 5.00161 12.1405 6.40628 11.7494 7.71669C11.3583 9.02709 10.5314 10.1646 9.4055 10.9408C8.27964 11.7171 6.92242 12.0855 5.5586 11.985C4.19478 11.8846 2.90618 11.3213 1.9062 10.3885C0.906228 9.45565 0.254873 8.20925 0.0600061 6.85569C0.0318903 6.65862 0.0832141 6.45844 0.202687 6.29921C0.32216 6.13997 0.499995 6.03472 0.697071 6.0066C0.894147 5.97849 1.09432 6.02981 1.25356 6.14929C1.41279 6.26876 1.51804 6.44659 1.54616 6.64367C1.69258 7.65764 2.18049 8.59134 2.92931 9.29052C3.67812 9.9897 4.64304 10.4125 5.66466 10.4892C6.68628 10.5658 7.70348 10.2917 8.54823 9.71205C9.39298 9.13242 10.0147 8.28197 10.3108 7.30119C10.6069 6.32041 10.5595 5.26798 10.1766 4.31775C9.79365 3.36752 9.09803 2.57634 8.20464 2.07491C7.31125 1.57348 6.27354 1.39179 5.26293 1.55986C4.25232 1.72793 3.32928 2.2357 2.64627 2.9993ZM5.75059 2.9993C5.94952 2.9993 6.14031 3.07832 6.28097 3.21899C6.42164 3.35966 6.50066 3.55044 6.50066 3.74937V5.49955H7.25074C7.44967 5.49955 7.64046 5.57858 7.78113 5.71925C7.92179 5.85991 8.00082 6.0507 8.00082 6.24963C8.00082 6.44856 7.92179 6.63935 7.78113 6.78001C7.64046 6.92068 7.44967 6.99971 7.25074 6.99971H5.75059C5.55166 6.99971 5.36087 6.92068 5.2202 6.78001C5.07954 6.63935 5.00051 6.44856 5.00051 6.24963V3.74937C5.00051 3.55044 5.07954 3.35966 5.2202 3.21899C5.36087 3.07832 5.55166 2.9993 5.75059 2.9993V2.9993Z" fill="black" />
								</svg>
							</span>
						</div>
					</a>
				</div>

				<div class="card-balance col-10 offset-1 text-center mb-3">
					CURRENT BALANCE SHIBA
					<a data-bs-toggle="modal" data-bs-target="#historydepo">
						<div class="form-balance">
						<?= $aboutUser->countCurrentBlance("saldo","SHIBA",$_SESSION['member_username_bot']) ?>
							<span class="ms-1"
								><svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M2.64627 2.9993H3.25033C3.44927 2.9993 3.64005 3.07832 3.78072 3.21899C3.92138 3.35966 4.00041 3.55044 4.00041 3.74937C4.00041 3.94831 3.92138 4.13909 3.78072 4.27976C3.64005 4.42043 3.44927 4.49945 3.25033 4.49945H0.750077C0.551144 4.49945 0.360359 4.42043 0.219692 4.27976C0.0790256 4.13909 0 3.94831 0 3.74937V1.24912C4.19219e-09 1.05019 0.0790256 0.859401 0.219692 0.718734C0.360359 0.578067 0.551144 0.499042 0.750077 0.499042C0.949009 0.499042 1.13979 0.578067 1.28046 0.718734C1.42113 0.859401 1.50015 1.05019 1.50015 1.24912V2.0302C2.405 1.00484 3.63293 0.319307 4.98059 0.0871283C6.32825 -0.145051 7.7148 0.0900547 8.91059 0.753508C10.1064 1.41696 11.0397 2.46896 11.556 3.73528C12.0722 5.00161 12.1405 6.40628 11.7494 7.71669C11.3583 9.02709 10.5314 10.1646 9.4055 10.9408C8.27964 11.7171 6.92242 12.0855 5.5586 11.985C4.19478 11.8846 2.90618 11.3213 1.9062 10.3885C0.906228 9.45565 0.254873 8.20925 0.0600061 6.85569C0.0318903 6.65862 0.0832141 6.45844 0.202687 6.29921C0.32216 6.13997 0.499995 6.03472 0.697071 6.0066C0.894147 5.97849 1.09432 6.02981 1.25356 6.14929C1.41279 6.26876 1.51804 6.44659 1.54616 6.64367C1.69258 7.65764 2.18049 8.59134 2.92931 9.29052C3.67812 9.9897 4.64304 10.4125 5.66466 10.4892C6.68628 10.5658 7.70348 10.2917 8.54823 9.71205C9.39298 9.13242 10.0147 8.28197 10.3108 7.30119C10.6069 6.32041 10.5595 5.26798 10.1766 4.31775C9.79365 3.36752 9.09803 2.57634 8.20464 2.07491C7.31125 1.57348 6.27354 1.39179 5.26293 1.55986C4.25232 1.72793 3.32928 2.2357 2.64627 2.9993ZM5.75059 2.9993C5.94952 2.9993 6.14031 3.07832 6.28097 3.21899C6.42164 3.35966 6.50066 3.55044 6.50066 3.74937V5.49955H7.25074C7.44967 5.49955 7.64046 5.57858 7.78113 5.71925C7.92179 5.85991 8.00082 6.0507 8.00082 6.24963C8.00082 6.44856 7.92179 6.63935 7.78113 6.78001C7.64046 6.92068 7.44967 6.99971 7.25074 6.99971H5.75059C5.55166 6.99971 5.36087 6.92068 5.2202 6.78001C5.07954 6.63935 5.00051 6.44856 5.00051 6.24963V3.74937C5.00051 3.55044 5.07954 3.35966 5.2202 3.21899C5.36087 3.07832 5.55166 2.9993 5.75059 2.9993V2.9993Z" fill="black" />
								</svg>
							</span>
						</div>
					</a>
				</div>
			</div>

			<div class="coin-menu d-flex justify-content-evenly">
				<div class="coin">
					<p>DOGE</p>
					<div class="form-check form-switch">
						<input class="form-check-input" id="checkdoge" type="checkbox" role="switch" checked/>
					</div>
				</div>
				<div class="coin">
					<p>BTT</p>
					<div class="form-check form-switch">
						<input class="form-check-input" id="checkbtt" type="checkbox" role="switch"/>
					</div>
				</div>
				<div class="coin">
					<p>TRON</p>
					<div class="form-check form-switch">
						<input class="form-check-input" id="checktron" type="checkbox" role="switch" />
					</div>
				</div>
				<div class="coin">
					<p>SHIBA</p>
					<div class="form-check form-switch">
						<input class="form-check-input" id="checkshiba" type="checkbox" role="switch"/>
					</div>
				</div>
			</div>

			<div class="d-flex menu text-center justofy-content-arround mt-4">
				<div class="col mb-3">
					<a href="trade?coin=doge" id="trade" class="btn btn-dark"
						><img src="img/trade.png" alt="exit" class="img-fluid mx-auto d-block" />
						<p>TRADE</p>
					</a>
				</div>
				<div class="col mb-3">
					<a href="#deposit-doge" id="deposit" class="btn btn-dark" data-bs-toggle="modal">
						<img src="img/deposit.png" alt="deposit" class="img-fluid mx-auto d-block" />
						<p>DEPOSITE</p>
					</a>
				</div>
			</div>
			<div class="d-flex menu text-center justofy-content-arround mt-4 mb-3">	
				<div class="col mb-3 mb-5">
					<a href="referral?coin=doge" id="referral" class="btn btn-dark"
						><img src="img/refferal.png" alt="referRal" class="img-fluid mx-auto d-block" />
						<p>REFERRAL</p>
					</a>
				</div>
				<div class="col mb-3 mb-5">
					<a href="#withdraw-doge" id="wd" class="btn btn-dark" data-bs-toggle="modal">
						<img src="img/withdraw.png" alt="withdraw" class="img-fluid mx-auto d-block" />
						<p>WITHDRAW</p>
					</a>
				</div>
			</div>



			<!-- modal deposite -->
			<!-- Button trigger modal -->
			
			<!-- Modal deposite wd -->
			<?php  $memberr = new getAllMember();
			$datawallet = $aboutAdmin->getAdmin();
			foreach($datawallet as $data){
			?>
			<div class="modal fade" id="deposit-<?= strtolower($data['type_wallet']) ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog">
					<form action="" method="post" class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticBackdropLabel">DEPOSITE <?= $data['type_wallet'] ?></h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body text-center">
							<img src="<?= createQRCode($data['url_wallet'],$data['type_wallet']) ?>" alt="" class="img-fluid mx-auto d-block qr" />
							<p id="wallet<?= strtolower($data['type_wallet']) ?>" style="font-weight: bolder; cursor:pointer"><?= $data['url_wallet'] ?></p>
							<button type="button" class="btn btn-outline-secondary bt<?= strtolower($data['type_wallet']) ?>">
								Copy
							</button>
							<hr />
							<p style="font-size: smaller">Transfer Doge ke alamat diatas, setelah Transfer selesai, silahkan isi Form Validasi dibawah ini.</p>
						</div>
						<div class="container">
							<label for="basic-url" class="form-label label-input">Jumlah</label>
							<div class="input-group mb-3">
								<input type="number" step="0.00001" class="form-control" name="jumlah_deposit" />
							</div>
							<p style="font-size: 10px;">*Biaya admin <?= $memberr->getBiayaAdmin("Deposit")*100 ?>%</p>
							<!-- <label for="basic-url" class="form-label label-input">Alamat Doge Anda</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
							</div> -->
						</div>

						<div class="modal-footer">
							<input type="hidden" name="type_coin" value="<?= $data['type_wallet'] ?>">
							<button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
							<button type="submit" name="deposit_aksi" class="btn btn-success btn-sm">Deposite</button>
						</div>
					</form>
				</div>
			</div>
			<div class="modal fade" id="withdraw-<?= strtolower($data['type_wallet']) ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog">
					<form method="post" action="" class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticBackdropLabel">WITHDRAW <?= $data['type_wallet'] ?></h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<p style="font-size: smaller">Pilih Type Withdraw</p>
							<select class="form-select form-select-sm" id="type_wd<?= $data['type_wallet'] ?>" name="type_wd" required>
								<option value="" hidden>TYPE WD</option>
								<option value="PROFIT" <?= notAllowCB($_SESSION['member_username_bot'],"PROFIT",$data['type_wallet']) ?>>PROFIT BOT</option>
								<option value="BALANCE" <?= notAllowCB($_SESSION['member_username_bot'],"BALANCE",$data['type_wallet']) ?>>CURRENT BALANCE</option>
							</select>
							<p style="font-size: smaller">Masukkan jumlah Doge yang ingin anda withdraw</p>
						</div>
						<div class="container">
							<label for="basic-url" class="form-label label-input">Jumlah</label>
							<div class="input-group mb-3">
								<input type="number" step="0.00001" class="form-control" max value="" id="jum_wd<?= $data['type_wallet'] ?>" name="jumlahh_wd"/>
								<input type="hidden" name="url_wallet" value="<?= $aboutUser->countCurrentBlance("wallet",$data['type_wallet'],$_SESSION["member_username_bot"]) ?>">
								<input type="hidden" name="coin" value="<?= $data['type_wallet'] ?>">
							</div>
							<p style="font-size: 10px;">*Biaya admin <?= $memberr->getBiayaAdmin("Withdraw")*100 ?>%</p>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success btn-sm" name="wd_aksi">Withdraw</button>
						</div>
					</form>
				</div>
			</div>
			<script src="js/dist/clipboard.min.js"></script>
			<script>
				var clipboard = new ClipboardJS('.bt<?= strtolower($data['type_wallet']) ?>', {
					target: function () {
						return document.querySelector("#wallet<?= strtolower($data['type_wallet']) ?>");
					},
				});

				clipboard.on('success', function (e) {
					console.log(e);
				});

				clipboard.on('error', function (e) {
					console.log(e);
				});
			</script>
			<script>
			$('#type_wd<?= $data['type_wallet'] ?>').change(function(){
				if($(this).val() == "BALANCE"){
					$("#jum_wd<?= $data['type_wallet'] ?>").prop("max", "<?= $aboutUser->countCurrentBlance("saldo",$data['type_wallet'],$_SESSION['member_username_bot']) ?>");
					$("#jum_wd<?= $data['type_wallet'] ?>").prop("value", "<?= $aboutUser->countCurrentBlance("saldo",$data['type_wallet'],$_SESSION['member_username_bot']); ?>");
				}else{
					$("#jum_wd<?= $data['type_wallet'] ?>").prop("max", "<?= $aboutUser->countCurrentBlance("profit",$data['type_wallet'],$_SESSION['member_username_bot']) ?>");
					$("#jum_wd<?= $data['type_wallet'] ?>").prop("value", "<?= $aboutUser->countCurrentBlance("profit",$data['type_wallet'],$_SESSION['member_username_bot']) ?>");
				}
			});
			</script>
			<?php } ?>
			<!-- akhir modal deposite wd -->

			<!-- Modal History WD -->
			<div class="modal fade" id="historywd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-scrollable">
					<div class="modal-content" style="background-color: rgb(48, 48, 48)">
						<div class="modal-header text-white">History Withdraw</div>
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
								<tbody id="datawddoge" style="font-size: smaller;">
									<?= $aboutUser->historyWithdraw("DOGE",$_SESSION['member_username_bot']) ?>
								</tbody>
								<tbody id="datawdbtt" style="font-size: smaller; display: none">
									<?= $aboutUser->historyWithdraw("BTT",$_SESSION['member_username_bot']) ?>
								</tbody>
								<tbody id="datawdtron" style="font-size: smaller; display: none">
									<?= $aboutUser->historyWithdraw("TRON",$_SESSION['member_username_bot']) ?>
								</tbody>
								<tbody id="datawdshiba" style="font-size: smaller; display: none">
									<?= $aboutUser->historyWithdraw("SHIBA",$_SESSION['member_username_bot']) ?>
								</tbody>
							</table>
						</div>
						
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Akhir Modal History WD-->

			<!-- Modal History depo -->
			<div class="modal fade" id="historydepo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-scrollable">
					<div class="modal-content" style="background-color: rgb(48, 48, 48)">
						<div class="modal-header text-white">History Deposite</div>
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
								<tbody id="datadepodoge" style="font-size: smaller">
									<?= $aboutUser->historyDeposit("DOGE",$_SESSION['member_username_bot']) ?>
								</tbody>
								<tbody id="datadepobtt" style="font-size: smaller; display: none">
									<?= $aboutUser->historyDeposit("BTT",$_SESSION['member_username_bot']) ?>
								</tbody>
								<tbody id="datadepotron" style="font-size: smaller; display: none">
									<?= $aboutUser->historyDeposit("TRON",$_SESSION['member_username_bot']) ?>
								</tbody>
								<tbody id="datadeposhiba" style="font-size: smaller; display: none">
									<?= $aboutUser->historyDeposit("SHIBA",$_SESSION['member_username_bot']) ?>
								</tbody>
							</table>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Akhir Modal History depo-->
		</div>

		<section id="footer" class="fixed-bottom" >
			<div class="container">
				<div class="col-12">
					<div class="d-flex justify-content-center">
						<div class="load">
							<a href="home"
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
		
		<script src="js/viewscoin.js"></script>
		
		
	</body>
</html>
