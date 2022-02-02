<?php  

class getAllMember extends dbClass{

    public function memberDb(string $param = "", string $var = "", string $user = ""){
        if($param == "username"){
            $sql = "SELECT * FROM member_bot WHERE username_member='$var'";
        }elseif($param == "email"){
            $sql = "SELECT email_member FROM member_bot WHERE email_member='$var'";
        }elseif($param == "notelpn"){
            $sql = "SELECT telpn_member FROM member_bot WHERE telpn_member='$var'";
        }elseif($param == "referral"){
            $sql = "SELECT username_member, referral_member FROM member_bot WHERE referral_member='$var'";
        }elseif($param == "cekemail"){
            $sql = "SELECT email_member FROM member_bot WHERE email_member='$var' AND username_member<>'$user'";
        }elseif($param == "ceknotelpn"){
            $sql = "SELECT telpn_member FROM member_bot WHERE telpn_member='$var' AND username_member<>'$user'";
        }elseif($param == "upline"){
            $sql = "SELECT username_member FROM member_bot WHERE upline_member='$var'";
        }else{
            $sql = "SELECT * FROM member_bot ORDER BY id_member DESC";
        }
        $resultsql = $this->dbConnect()->query($sql);
        $result['jum'] = $resultsql->num_rows;
        if($resultsql->num_rows > 0){
            while($row = $resultsql->fetch_assoc()){
                $data[] = $row;
            }
            $result['data'] = $data;
            return $result;
        }
    }

    public function registMember(
        string $username,
        string $email,
        string $notelpn,
        ?string $referral,
        string $member_referral,
        string $pass
    ){
        if($referral != "" && !is_null($referral)){
            $uplineget = $this->memberDb("referral",$referral);
            if($uplineget['jum'] != 0){
                $upline = $uplineget['data'][0]['username_member'];
            }else{
                $upline = "admin";
            }
        }else{
            $upline = "admin";
        }
        $sql = "INSERT INTO member_bot (username_member,email_member,referral_member,telpn_member,upline_member,password_member) VALUES('$username','$email','$member_referral','$notelpn','$upline','$pass')";
        $resultsql = $this->dbConnect()->query($sql);
        return $resultsql;
    }

    public function updateMember(string $user,string $email,string $no,string $pass, ?string $param = "", string $status = ""){
        if($param == "admin"){
            $sql = "UPDATE member_bot SET email_member='$email', telpn_member='$no', password_member='$pass', status_member='$status' WHERE username_member='$user'";
            $result = $this->dbConnect()->query($sql);
            return $result;
        }else{
            $sql = "UPDATE member_bot SET email_member='$email', telpn_member='$no', password_member='$pass' WHERE username_member='$user'";
            $result = $this->dbConnect()->query($sql);
            return $result;
        }
    }



    public function currentBlanceInput(string $user){
        $coins = array("DOGE","BTT","TRON","SHIBA");
        foreach($coins as $coin){
            $sql = "INSERT INTO cb_member_bot (username_cb,type_coin_cb) VALUES('$user','$coin')";
            $result = $this->dbConnect()->query($sql);
        }
    }

    public function getCurrentBlance(?string $coin, string $user){
        $sql = "SELECT * FROM cb_member_bot WHERE type_coin_cb='$coin' AND username_cb='$user'";
        $result = $this->dbConnect()->query($sql);
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        $result = $data;
        return $result;
    }

    public function updateCurrentB($user,$coin,$val){
        $sql = "UPDATE cb_member_bot SET token_cb='$val' WHERE type_coin_cb='$coin' AND username_cb='$user'";
        $result = $this->dbConnect()->query($sql);
        return $result;
    }

    public function confirmWD(string $user, string $coin, string $saldo, string $admin, string $id_wd, string $type, string $confirm){
        if($confirm == "Accept"){
            $tz = 'Asia/Makassar';
            $dt = new DateTime("now", new DateTimeZone($tz));
            $timestamp = $dt->format('Y-m-d G:i:s');
            $sqlupdate = "UPDATE history_wd_member_bot SET status_history='$confirm', date_confirm_history='$timestamp' WHERE id_history='$id_wd'";
            $result = $this->dbConnect()->query($sqlupdate);
            if($result){
                $resultcb = false;
                $getsaldo = $this->getCurrentBlance($coin,$user);
                if($type == "PROFIT"){
                    $dbsaldo = $getsaldo[0]['jumlah_profit_cb'];
                    $jum = $dbsaldo - ($saldo+$admin);
                    $sql = "UPDATE cb_member_bot SET jumlah_profit_cb='$jum' WHERE username_cb='$user' AND type_coin_cb='$coin'";
                    $resultcb = $this->dbConnect()->query($sql);
                }elseif($type == "BALANCE"){
                    $dbsaldo = $getsaldo[0]['jumlah_saldo_cb'];
                    $jum = $dbsaldo - ($saldo+$admin);
                    $sql = "UPDATE cb_member_bot SET jumlah_saldo_cb='$jum' WHERE username_cb='$user' AND type_coin_cb='$coin'";
                    $resultcb = $this->dbConnect()->query($sql);
                }elseif($type == "BONUS"){
                    $dbsaldo = $getsaldo[0]['jumlah_bonus_cb'];
                    $jum = $dbsaldo - ($saldo+$admin);
                    $sql = "UPDATE cb_member_bot SET jumlah_bonus_cb='$jum' WHERE username_cb='$user' AND type_coin_cb='$coin'";
                    $resultcb = $this->dbConnect()->query($sql);
                }
                if($resultcb){
                    $getadmin = $this->profitAdmin($coin);
                    $jumprofitt = $getadmin + $admin;
                    $sql_admin = "UPDATE wallet_admin_bot SET profit_admin='$jumprofitt' WHERE type_wallet='$coin'";
                    $result_admin = $this->dbConnect()->query($sql_admin);
                }
            }
        }else{
            $sqlupdate = "UPDATE history_wd_member_bot SET status_history='$confirm' WHERE id_history='$id_wd'";
            $result = $this->dbConnect()->query($sqlupdate);
        }
    }

    public function confirmDEPO(string $user, string $coin, string $saldo, string $admin, string $id_wd, string $confirm){
        if($confirm == "Accept"){
            $tz = 'Asia/Makassar';
            $dt = new DateTime("now", new DateTimeZone($tz));
            $timestamp = $dt->format('Y-m-d G:i:s');
            $sqlupdate = "UPDATE history_deposit_member_bot SET status_history='$confirm', tgl_update_history='$timestamp' WHERE id_history='$id_wd'";
            $result = $this->dbConnect()->query($sqlupdate);
            if($result){
                $getsaldo = $this->getCurrentBlance($coin,$user);
                $dbsaldo = $getsaldo[0]['jumlah_saldo_cb'];
                $jum = $dbsaldo + $saldo;
                $sql = "UPDATE cb_member_bot SET jumlah_saldo_cb='$jum' WHERE username_cb='$user' AND type_coin_cb='$coin'";
                $resultcb = $this->dbConnect()->query($sql);
                if($resultcb){
                    $getadmin = $this->profitAdmin($coin);
                    $jumprofitt = $getadmin + $admin;
                    $sql_admin = "UPDATE wallet_admin_bot SET profit_admin='$jumprofitt' WHERE type_wallet='$coin'";
                    $result_admin = $this->dbConnect()->query($sql_admin);
                }
            }
        }else{
            $sqlupdate = "UPDATE history_deposit_member_bot SET status_history='$confirm' WHERE id_history='$id_wd'";
            $result = $this->dbConnect()->query($sqlupdate);
        }
    }

    public function getBiayaAdmin($ket){
        $sql = "SELECT persen_biaya FROM biaya_admin WHERE ket_biaya='$ket'";
        $result = $this->dbConnect()->query($sql);
        $row = $result->fetch_assoc();
        return $row['persen_biaya'];
    }

    public function profitAdmin(string $coin){
        $sql = "SELECT profit_admin FROM wallet_admin_bot WHERE type_wallet='$coin'";
        $result = $this->dbConnect()->query($sql);
        $row = $result->fetch_assoc();
        return $row['profit_admin'];
    }



    public function getWithDraw(?string $coin, ?string $user, string $confirm = ""){
        if($confirm == "Accept"){
            $sql = "SELECT jum_history,biaya_persen,type_wd_history FROM history_wd_member_bot WHERE status_history='$confirm' AND type_coin_wd_history='$coin' AND username_history='$user'";
        }elseif($confirm == "all"){
            $sql = "SELECT * FROM history_wd_member_bot ORDER BY id_history DESC";
        }elseif($confirm == "allxcoin"){
            $sql = "SELECT * FROM history_wd_member_bot  WHERE type_coin_wd_history='$coin' ORDER BY id_history DESC";
        }else{
            $sql = "SELECT * FROM history_wd_member_bot WHERE type_coin_wd_history='$coin' AND username_history='$user' ORDER BY id_history DESC";
        }
        
        $result = $this->dbConnect()->query($sql);
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        $result = $data;
        return $result;
    }

    public function getDeposit(?string $coin, ?string $user, string $param = ""){
        if($param == "all"){
            $sql = "SELECT * FROM history_deposit_member_bot ORDER BY id_history DESC";
        }elseif($param == "allxcoin"){
            $sql = "SELECT * FROM history_deposit_member_bot WHERE
            type_coin_history='$coin' ORDER BY id_history DESC";
        }elseif($param == "Accept"){
            $sql = "SELECT * FROM history_deposit_member_bot WHERE
            type_coin_history='$coin' AND status_history='$param' ORDER BY id_history DESC";
        }else{
            $sql = "SELECT * FROM history_deposit_member_bot WHERE username_history='$user' AND type_coin_history='$coin' ORDER BY id_history DESC";
        }
        $result = $this->dbConnect()->query($sql);
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        $result = $data;
        return $result;
    }

    protected function getProfit(string $coin, string $user){
        $sql = "SELECT * FROM history_profit_member_bot WHERE username_history='$user' AND type_coin_profit_history='$coin' ORDER BY id_history DESC";
        $result = $this->dbConnect()->query($sql);
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        $result = $data;
        return $result;
    }

    public function inputProfit(string $user, string $order, array $valume, string $persen, string $approve, string $upline){
        $cointypes = array("DOGE","BTT","TRON","SHIBA");
        foreach($cointypes as $key => $coin){
            $getcb = $this->getCurrentBlance($coin,$user);
            $saldocb = $getcb[0]['jumlah_saldo_cb'];
            if($saldocb > 0){
                $saldoprofit = $getcb[0]['jumlah_profit_cb'];
                $fee = $saldocb * ($persen/100);
                $sqlmember = "INSERT INTO history_profit_member_bot (username_history,order_history,valume_history,persen_history,approve_history,fee_profit_history,type_coin_profit_history) VALUES('$user','$order','$valume[$key]','$persen','$approve','$fee','$coin')";
                $resultmember = $this->dbConnect()->query($sqlmember);
                if($resultmember){
                    $jum = $saldoprofit + $fee;
                    $sqlprofitcb = "UPDATE cb_member_bot SET jumlah_profit_cb='$jum' WHERE username_cb='$user' AND type_coin_cb='$coin'";
                    $resultprofitcb = $this->dbConnect()->query($sqlprofitcb);
                    if($resultprofitcb){
                        if($persen > 0){
                            $makebonus = $this->makeBonus($user, $upline, $upline, 1, $fee, $coin);
                        }
                    }
                }
            }
        }
    }

    public function makeBonus(string $from, string $to, string $upline, int $lvl, string $fee, string $coin){
        $stringlvl = $this->convertLVL($lvl);
        if($to != "admin" && $lvl <= 5){
            $persenbonus = $this->getPersenBonus($stringlvl);
            $jumbonus = $fee * $persenbonus;
            $sqlbonus = "INSERT INTO history_bonus_referral_member_bot (username_history,upline_history,bonus_history,type_history,level_history) VALUES('$from','$upline','$jumbonus','$coin','$stringlvl')";
            $resultbonus = $this->dbConnect()->query($sqlbonus);
            if($resultbonus){
                $getcb = $this->getCurrentBlance($coin,$to);
                $saldoto = $getcb[0]['jumlah_bonus_cb'];
                $jum = $saldoto + $jumbonus;
                $sqlbonuscb = "UPDATE cb_member_bot SET jumlah_bonus_cb='$jum' WHERE username_cb='$to' AND type_coin_cb='$coin'";
                $resultbonuscb = $this->dbConnect()->query($sqlbonuscb);
                if($resultbonuscb){
                    $members = $this->memberDb("username",$to);
                    $secondto = $members['data'][0]['upline_member'];
                    return $this->makeBonus($from, $secondto, $upline, $lvl+1, $fee, $coin);
                }
            }
        }
    }

    public function convertLVL(int $lvl){
        switch($lvl){
            case 1:
                return "LEVEL1";
                break;
            case 2:
                return "LEVEL2";
                break;
            case 3:
                return "LEVEL3";
                break;
            case 4:
                return "LEVEL4";
                break;
            case 5:
                return "LEVEL5";
                break;
        }
    }

    public function getPersenBonus($lvl){
        $sql = "SELECT * FROM bonus_referral_member_bot WHERE level_bonus='$lvl'";
        $result = $this->dbConnect()->query($sql);
        $row = $result->fetch_assoc();
        return $row['persen_bonus'];
    }

    protected function getBonus(string $upline,string $coin, string $lvl){
        $sql = "SELECT * FROM history_bonus_referral_member_bot WHERE upline_history='$upline' AND type_history='$coin' AND level_history='$lvl' ORDER BY id_history DESC";
        $result = $this->dbConnect()->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getStakingAdmin(string $date){
        $sql = "SELECT * FROM history_staking WHERE date_history='$date'";
        $result = $this->dbConnect()->query($sql);
        $nums = $result->num_rows;
        return $nums;
    }

    public function inputStakingAdmin(string $date){
        $sql = "INSERT INTO history_staking (date_history) VALUES('$date')";
        $result = $this->dbConnect()->query($sql);
        return $result;
    }

}



?>