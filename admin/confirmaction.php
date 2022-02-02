<?php  
$memberData = new getAllMember();
if(isset($_POST['confirm_wd'])){
    $username = $_POST['username'];
    $coin = $_POST['coin'];
    $saldo = $_POST['saldo'];
    $admin = $_POST['admindepo'];
    $id_wd = $_POST['id_history'];
    $type = $_POST['type_wd'];
    $memberData->confirmWD($username,$coin,$saldo,$admin,$id_wd,$type,"Accept");
}
if(isset($_POST['tolak_wd'])){
    $username = $_POST['username'];
    $coin = $_POST['coin'];
    $saldo = $_POST['saldo'];
    $admin = $_POST['admindepo'];
    $id_wd = $_POST['id_history'];
    $type = $_POST['type_wd'];
    $memberData->confirmWD($username,$coin,$saldo,$admin,$id_wd,$type,"Rejected");
}

if(isset($_POST['confirm_depo'])){
    $username = $_POST['username'];
    $coin = $_POST['coin'];
    $saldo = $_POST['saldo'];
    $admin = $_POST['admindepo'];
    $id_wd = $_POST['id_history'];
    $memberData->confirmDEPO($username,$coin,$saldo,$admin,$id_wd,"Accept");
}
if(isset($_POST['tolak_depo'])){
    $username = $_POST['username'];
    $coin = $_POST['coin'];
    $saldo = $_POST['saldo'];
    $admin = $_POST['admindepo'];
    $id_wd = $_POST['id_history'];
    $memberData->confirmDEPO($username,$coin,$saldo,$admin,$id_wd,"Rejected");
}
?>