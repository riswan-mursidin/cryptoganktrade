<?php  

function formatTelpn($tel){
    if(substr(trim($tel), 0,1) == 0){
        return substr_replace($tel,'62',0,1);
    }elseif(substr(trim($tel), 0,2) == 62){
        return $tel;
    }else{
        return "62".$tel;
    }
}

function generateReferral(){
    $data = array(1,2,3,4,5,6,7,'a','b','c','d','e','f','A','B','C','D','E','F');
    $res = '';
    for($i=0;$i<6;$i++){
        $res .= $data[rand(0,count($data))];
    }
    $memberdb = new getAllMember();
    $cekreferral = $memberdb->memberDb("referral",$res);
    if($cekreferral['jum'] > 0){
        $reff = generateReferral();
        return $reff;
    }else{
        return $res;
    }
}

function statusWD($txt){
    if($txt == "Pending"){
        return '<span class="text-warning">'.$txt.'</span>';
    }elseif($txt == "Accept"){
        return '<span class="text-success">'.$txt.'</span>';
    }elseif($txt == "Rejected"){
        return '<span class="text-danger">'.$txt.'</span>';
    }
}

function statusMember($txt){
    if($txt == "Aktif"){
        return '<span class="text-success">'.$txt.'</span>';
    }else{
        return '<span class="text-danger">'.$txt.'</span>';
    }
}

function formatDate($date){
    if($date != ""){
        $array = explode(" ",$date);
        $tgl = explode("-",$array[0]);
        $time = $array[1];
        return $tgl[2]."/".$tgl[1]."/".$tgl[0]." ".$time;
    }else{
        return "-";
    }
}

function profitColor($sts){
    if($sts == "Rejected"){
        return "lose";
    }else{
        return "profit";
    }
}

function createQRCode($url,$type){
    require_once "phpqrcode/qrlib.php"; 

    $tempdir = 'qrcode';
    //isi qrcode jika di scan
    $codeContents = $tempdir."/".$url.$type.".png"; 

    //output gambar langsung ke browser, sebagai PNG


    QRcode::png($url,$codeContents,QR_ECLEVEL_H,5,3,false);
    return $codeContents;
}

function notAllowCB($user,$param,$coin){
    $aboutUser = new getAllMember;
    $aboutUserView = new viewMember;
    $data = $aboutUser->memberDb("username",$user);
    $upline = $data['data'][0]['upline_member'];
    if($upline == "admin"){
        echo "hidden";
    }else{
        if($param == "BALANCE"){
            $saldo = $aboutUserView->countCurrentBlance("saldo",$coin,$user);
            $profit = $aboutUserView->historyDepositCount($coin,$user);
            if($saldo <= $profit || $saldo != 0){
                echo "disabled";
            }
        }
    }

}

function leaderview($upline){
    if($upline == "admin"){
        return "leader";
    }else{
        return $upline;
    }
}

function cekDesimal($ds){
    $array = explode(".",$ds);
    if($array[1] == "00000"){
        return $array[0];
    }else{
        return $ds;
    }
}

?>