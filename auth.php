<?php  
// register
if(isset($_POST['aksi_registrasi'])){
    $username_post = strtolower($_POST['username']);
    $email_post = $_POST['email'];
    $notelpn_post = formatTelpn($_POST['notelpn']);
    $referral_post = $_POST['referral'];
    $password_post = $_POST['password'];
    $cekusername = $memberdb->memberDb("username",$username_post);
    if($cekusername['jum'] == 0){
        $cekemail = $memberdb->memberDb("email",$email_post);
        if($cekemail['jum'] == 0){
            $ceknotelpn = $memberdb->memberDb("notelpn",$notelpn_post);
            if($ceknotelpn['jum'] == 0){
                $pass_hash = password_hash($password_post, PASSWORD_DEFAULT);
                $create_referral_member = generateReferral();
                $regist = $memberdb->registMember($username_post,$email_post,$notelpn_post,$referral_post,$create_referral_member,$pass_hash);
                if($regist){
                    $cblance = $memberdb->currentBlanceInput($username_post);
                    header('Location: index');
                    exit();
                }else{
                    $alert = "FAILED!";
                }
            }else{
                $alert = "No Telepon sudah Terdaftar!";
            }
        }else{
            $alert = "Email sudah Terdaftar!";
        }
    }else{
        $alert = "Username sudah Terdaftar!";
    }
}

if(isset($_POST['aksi_login'])){
    $username_post = strtolower($_POST['username']);
    $password_post = $_POST['password'];
    $cekusername = $memberdb->memberDb("username",$username_post);
    $redirect_to = $_POST['redirect_to'];
    if($cekusername['jum'] > 0){
        if($cekusername['data'][0]['status_member'] == "Aktif"){
            $pass_hash = $cekusername['data'][0]['password_member'];
            if(password_verify($password_post, $pass_hash)){
                $_SESSION['member_username_bot'] = $cekusername['data'][0]['username_member'];
                $_SESSION['status_login_member_bot'] = true;
                header('Location: home');
                exit();
            }else{
                $alert = "Login FAILED!!";
            }
        }else{
            $alert = "Akun Anda di nonaktifkan";
        }
    }else{
        $alert = "Login FAILED!";
    }
}

if($_SESSION['status_login_member_bot'] == true){
    $aboutUser = new getAllMember();
    
    $data_profil = $aboutUser->memberDb("username",$_SESSION["member_username_bot"]);
    $username_member = $data_profil['data'][0]['username_member'];
    $telpn_member = $data_profil['data'][0]['telpn_member'];
    $email_member = $data_profil['data'][0]['email_member'];
    $referral_member = $data_profil['data'][0]['referral_member'];

    
}

if(isset($_POST['edit_profit'])){
    $email_post = $_POST['email'];
    $notelpn_post = formatTelpn($_POST['notelpn']);
    $password_post = $_POST['password'];
    $checkemail = $aboutUser->memberDb("cekemail",$email_post,$_SESSION['member_username_bot']);
    if($checkemail['jum'] == 0){
        $checktelpn = $aboutUser->memberDb("ceknotelpn",$notelpn_post,$_SESSION['member_username_bot']);
        if($checktelpn['jum'] == 0){
            $pass_hash = password_hash($password_post, PASSWORD_DEFAULT);
            $updateMember = $aboutUser->updateMember($_SESSION["member_username_bot"],$email_post,$notelpn_post,$pass_hash);
            if($updateMember){
                header('Location: profile');
                exit();
            }
        }else{
            $alert = "No Telpn Sudah Terdaftar!";
        }
    }else{
        $alert = "Email Sudah Terdaftar!";
    }
}



?>