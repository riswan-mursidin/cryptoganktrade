<?php  

class viewMember extends getAllMember{

    public function countCurrentBlance(string $param, string $coin, string $user){
        $getcb = $this->getCurrentBlance($coin,$user);
        if($param == "saldo"){
            return cekDesimal($getcb[0]['jumlah_saldo_cb']);
        }elseif($param == "profit"){
            return cekDesimal($getcb[0]['jumlah_profit_cb']);
        }elseif($param == "bonus"){
            return cekDesimal($getcb[0]['jumlah_bonus_cb']);
        }elseif($param == "wallet"){
            return $getcb[0]['token_cb'];
        }
    }

    public function countWithdraw(string $coin, string $user, string $param=""){
        
        if($param == ""){
            $count = 0;
            $getwd = $this->getWithDraw($coin,$user,"Accept");
            foreach($getwd as $wd){
                $count += $wd['jum_history']+$wd['biaya_persen'];
            }
        }else{
            $count = 0;
            $getwd = $this->getWithDraw($coin,$user,"Accept");
            foreach($getwd as $wd){
                if($wd['type_wd_history'] != "BONUS"){
                    $count += $wd['jum_history']+$wd['biaya_persen'];
                }
            }
        }
        return cekDesimal($count);
    }

    public function historyWithdraw(string $coin, string $user, string $param=""){
        $getwd = $this->getWithDraw($coin,$user);
        if($param == ""){
            foreach($getwd as $wd){
                if($wd['type_wd_history'] != "BONUS"){
                    echo    "<tr>
                                <td>".formatDate($wd['date_history'])."</td>
                                <td>".cekDesimal($wd['jum_history'])."</td>
                                <td>".cekDesimal($wd['biaya_persen'])."</td>
                                <td>".statusWD($wd['status_history'])."</td>
                                <td>".formatDate($wd['date_confirm_history'])."</td>
                            </tr>";
                }
            }
        }else{
            foreach($getwd as $wd){
                if($wd['type_wd_history'] == "BONUS"){
                    echo    "<tr>
                                <td>".formatDate($wd['date_history'])."</td>
                                <td>".cekDesimal($wd['jum_history'])."</td>
                                <td>".cekDesimal($wd['biaya_persen'])."</td>
                                <td>".statusWD($wd['status_history'])."</td>
                                <td>".formatDate($wd['date_confirm_history'])."</td>
                            </tr>";
                }
            }
        }
    }

    public function historyDeposit(string $coin, string $user){
        $getdepo = $this->getDeposit($coin,$user);
        foreach($getdepo as $depo){
            echo    "<tr>
                        <td>".formatDate($depo['tgl_history'])."</td>
                        <td>".cekDesimal($depo['jum_history'])."</td>
                        <td>".cekDesimal($depo['biaya_persen'])."</td>
                        <td>".statusWD($depo['status_history'])."</td>
                        <td>".formatDate($depo['tgl_update_history'])."</td>
                    </tr>";
        }
    }
    public function historyDepositCount(string $coin, string $user){
        $getdepo = $this->getDeposit($coin,$user);
        $count = 0;
        if(count($getdepo) > 0){
            foreach($getdepo as $depo){
                $count += $depo['fee_profit_history']; 
            }
        }
        return $count;
    }


    public function historyProfit(string $coin, string $user){
        $getprofit = $this->getProfit($coin,$user);
        foreach($getprofit as $profit){
            echo    '<tr class="'.profitColor($profit['approve_history']).'">
                        <td>'.$profit['order_history'].'</td>
                        <td>'.formatDate($profit['tgl_profit_history']).'</td>
                        <td>'.$profit['valume_history'].'</td>
                        <td>'.$profit['persen_history'].' %</td>
                        <td>'.$profit['approve_history'].'</td>
                        <td>'.$profit['fee_profit_history'].'</td>
                    </tr>';
        }
    }

    public function historyBonus(string $param, string $coin, string $upline, string $lvl){
        if($param == "count"){
            if($lvl == "LEVEL1"){
                $count = 0;
                $getbonus1 = $this->getBonus($upline,$coin,$lvl);
                foreach($getbonus1 as $bonus1){
                    $count += $bonus1['bonus_history'];
                }
                return $count;
            }elseif($lvl == "LEVEL2"){
                $count = 0;
                $getbonus1 = $this->memberDb("upline",$upline);
                foreach($getbonus1['data'] as $bonus1){
                    $getbonus2 = $this->getBonus($bonus1['username_member'],$coin,$lvl);
                    foreach($getbonus2 as $bonus2){
                        $count += $bonus2['bonus_history'];
                    }
                }
                return $count;
            }elseif($lvl == "LEVEL3"){
                $count = 0;
                $getbonus1 = $this->memberDb("upline",$upline);
                foreach($getbonus1['data'] as $bonus1){
                    $getbonus2 = $this->memberDb("upline",$bonus1['username_member']);
                    foreach($getbonus2['data'] as $bonus2){
                        $getbonus3 = $this->getBonus($bonus2['username_member'],$coin,$lvl);
                        foreach($getbonus3 as $bonus3){
                            $count += $bonus3['bonus_history'];
                        }
                    }
                }
                return $count;
            }elseif($lvl == "LEVEL4"){
                $count = 0;
                $getbonus1 = $this->memberDb("upline",$upline);
                foreach($getbonus1['data'] as $bonus1){
                    $getbonus2 = $this->memberDb("upline",$bonus1['username_member']);
                    foreach($getbonus2['data'] as $bonus2){
                        $getbonus3 =  $this->memberDb("upline",$bonus2['username_member']);
                        foreach($getbonus3['data'] as $bonus3){
                            $getbonus4 = $this->getBonus($bonus3['username_member'],$coin,$lvl);
                            foreach($getbonus4 as $bonus4){
                                $count += $bonus4['bonus_history'];
                            }
                        }
                    }
                }
                return $count;
            }elseif($lvl == "LEVEL5"){
                $count = 0;
                $getbonus1 = $this->memberDb("upline",$upline);
                foreach($getbonus1['data'] as $bonus1){
                    $getbonus2 = $this->memberDb("upline",$bonus1['username_member']);
                    foreach($getbonus2['data'] as $bonus2){
                        $getbonus3 =  $this->memberDb("upline",$bonus2['username_member']);
                        foreach($getbonus3['data'] as $bonus3){
                            $getbonus4 = $this->memberDb("upline",$bonus3['username_member']);
                            foreach($getbonus4['data'] as $bonus4){
                                $getbonus5 = $this->getBonus($bonus4['username_member'],$coin,$lvl);
                                foreach($getbonus5 as $bonus5){
                                    $count += $bonus5['bonus_history'];
                                }
                            }
                        }
                    }
                }
                return $count;
            }
        }else{
            if($lvl == "LEVEL1"){
                $getbonus1 = $this->getBonus($upline,$coin,$lvl);
                foreach($getbonus1 as $bonus1){
                    echo '<tr>
                            <td>'.$bonus1['username_history'].'</td>
                            <td>'.$bonus1['upline_history'].'</td>
                            <td>'.$bonus1['bonus_history'].'</td>
                            <td>'.$bonus1['tgl_history'].'</td>
                        </tr>';
                }
            }elseif($lvl == "LEVEL2"){
                $getbonus1 = $this->memberDb("upline",$upline);
                foreach($getbonus1['data'] as $bonus1){
                    $getbonus2 = $this->getBonus($bonus1['username_member'],$coin,$lvl);
                    foreach($getbonus2 as $bonus2){
                        echo '<tr>
                            <td>'.$bonus2['username_history'].'</td>
                            <td>'.$bonus2['upline_history'].'</td>
                            <td>'.$bonus2['bonus_history'].'</td>
                            <td>'.$bonus2['tgl_history'].'</td>
                        </tr>';
                    }
                }
            }elseif($lvl == "LEVEL3"){
                $getbonus1 = $this->memberDb("upline",$upline);
                foreach($getbonus1['data'] as $bonus1){
                    $getbonus2 = $this->memberDb("upline",$bonus1['username_member']);
                    foreach($getbonus2['data'] as $bonus2){
                        $getbonus3 = $this->getBonus($bonus2['username_member'],$coin,$lvl);
                        foreach($getbonus3 as $bonus3){
                            echo '<tr>
                                    <td>'.$bonus3['username_history'].'</td>
                                    <td>'.$bonus3['upline_history'].'</td>
                                    <td>'.$bonus3['bonus_history'].'</td>
                                    <td>'.$bonus3['tgl_history'].'</td>
                                </tr>';
                        }
                    }
                }
            }elseif($lvl == "LEVEL4"){
                $getbonus1 = $this->memberDb("upline",$upline);
                foreach($getbonus1['data'] as $bonus1){
                    $getbonus2 = $this->memberDb("upline",$bonus1['username_member']);
                    foreach($getbonus2['data'] as $bonus2){
                        $getbonus3 =  $this->memberDb("upline",$bonus2['username_member']);
                        foreach($getbonus3['data'] as $bonus3){
                            $getbonus4 = $this->getBonus($bonus3['username_member'],$coin,$lvl);
                            foreach($getbonus4 as $bonus4){
                                echo '<tr>
                                        <td>'.$bonus4['username_history'].'</td>
                                        <td>'.$bonus4['upline_history'].'</td>
                                        <td>'.$bonus4['bonus_history'].'</td>
                                        <td>'.$bonus4['tgl_history'].'</td>
                                    </tr>';
                            }
                        }
                    }
                }
            }elseif($lvl == "LEVEL5"){
                $getbonus1 = $this->memberDb("upline",$upline);
                foreach($getbonus1['data'] as $bonus1){
                    $getbonus2 = $this->memberDb("upline",$bonus1['username_member']);
                    foreach($getbonus2['data'] as $bonus2){
                        $getbonus3 =  $this->memberDb("upline",$bonus2['username_member']);
                        foreach($getbonus3['data'] as $bonus3){
                            $getbonus4 = $this->memberDb("upline",$bonus3['username_member']);
                            foreach($getbonus4['data'] as $bonus4){
                                $getbonus5 = $this->getBonus($bonus4['username_member'],$coin,$lvl);
                                foreach($getbonus5 as $bonus5){
                                    echo '<tr>
                                        <td>'.$bonus5['username_history'].'</td>
                                        <td>'.$bonus5['upline_history'].'</td>
                                        <td>'.$bonus5['bonus_history'].'</td>
                                        <td>'.$bonus5['tgl_history'].'</td>
                                    </tr>';
                                }
                            }
                        }
                    }
                }
            }
        }
    }

}

?>