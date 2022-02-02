<?php  
if(isset($_POST['edit_wallet'])){
    $aboutUser = new getAllMember();
    $wallets = $_POST['wallet'];
    $coins = array("DOGE","BTT","TRON","SHIBA");
    foreach($wallets as $index => $wallet){
        $coin = $coins[$index];
        $updateWallet = $aboutUser->updateCurrentB($_SESSION["member_username_bot"],$coin,$wallet);
    }
}

?>