<?php  
$dataAdmin = new getAllAdmin();
if(isset($_POST['login_admin'])){
    $username_post = strtolower($_POST['username']);
    $password_post = $_POST['password'];

    $checkusername = $dataAdmin->getDataAdmin($username_post);
    if($checkusername['jum'] > 0){
        if(password_verify($password_post, $checkusername['data'][0]['password_admin'])){
            $_SESSION['login_admin_bot'] = true;
            $_SESSION['username_admin'] = $username_post;
            header('Location: home');
            exit();
        }else{
            $alert = "Username atau Password salah!";
        }
    }else{
        $alert = "Username atau Password salah!";
    }
}

if(isset($_POST['simpan_wallet'])){
    $wallet = $_POST['walletadmin'];
    $update = $dataAdmin->updateWallet($wallet);
}
if(isset($_POST['simpan_bonus'])){
$bonusPersen = $_POST['bonusPersen'];
    $update = $dataAdmin->updatePersen($bonusPersen);
}
if(isset($_POST['biaya_aksi'])){
    $persen = $_POST['persen'];
    $update = $dataAdmin->updateBiaya($persen);
}

?>