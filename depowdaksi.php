<?php  
$depoWd = new depoAndWD();
$admin = new getAllMember();
if(isset($_POST['deposit_aksi'])){
    $member = $_SESSION['member_username_bot'];
    $jum = $_POST['jumlah_deposit'];
    $type_coin = $_POST['type_coin'];
    $persenadmin = $admin->getBiayaAdmin("Deposit");
    $admin = $jum * $persenadmin;
    $sisadepo = $jum - $admin;
    $insertSdEPO = $depoWd->doDepo($member,$sisadepo,$admin,$type_coin);
}

if(isset($_POST['wd_aksi'])){
    $member = $_SESSION['member_username_bot'];
    $jum = $_POST['jumlahh_wd'];
    $persenadmin = $admin->getBiayaAdmin("Deposit");
    $admin = $jum * $persenadmin;
    $sisawd = $jum - $admin;
    $url_member = $_POST['url_wallet'];
    $coin = $_POST['coin'];
    $type_wd = $_POST['type_wd'];

    if($url_member == ""){
        echo '<script>
                alert("Isi terlebih dahulu Url Wallet Anda Pada pengaturan Profil");
            </script>';
    }else{
        $insertWD = $depoWd->doWd($member,$sisawd,$admin,$url_member,$coin,$type_wd);
        if(!$insertWD){
            echo '<script>
                alert("GAGAL");
            </script>';
        }
    }
}
if(isset($_POST['wd_bonus_aksi'])){
    $member = $_SESSION['member_username_bot'];
    $jum = $_POST['jumlahh_wd'];
    $persenadmin = $admin->getBiayaAdmin("Deposit");
    $admin = $jum * $persenadmin;
    $sisawd = $jum - $admin;
    $url_member = $_POST['url_wallet'];
    $coin = $_POST['coin'];
    $type_wd = "BONUS";

    if($url_member == ""){
        echo '<script>
                alert("Isi terlebih dahulu Url Wallet Anda Pada pengaturan Profil");
            </script>';
    }else{
        $insertWD = $depoWd->doWd($member,$sisawd,$admin,$url_member,$coin,$type_wd);
        if(!$insertWD){
            echo '<script>
                alert("GAGAL");
            </script>';
        }
    }
}

?>