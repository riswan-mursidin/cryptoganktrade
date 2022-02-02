<?php  
$memberData = new getAllMember();
if(isset($_POST['stacking'])){
    $persen = $_POST['persen'];
    $valume = $_POST['val'];
    $order = $_POST['order'];
    $confirm = $_POST['confirm'];
    $timestamp = date("Y-m-d");
    $checkstacking = $memberData->getStakingAdmin($timestamp);
    if($checkstacking > 0){
        $alert = "1";
    }else{
        $history = $memberData->inputStakingAdmin($timestamp);
        if($history){
            $members = $memberData->memberDb();
            foreach($members['data'] as $member){
                $username = $member['username_member'];
                $upline = $member['upline_member'];
                $makeprofit = $memberData->inputProfit($username,$order,$valume,$persen,$confirm,$upline);
            }
        }
    }
}
?>