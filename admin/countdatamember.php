<?php  
class countMember extends getAllMember{
    
    public function countCB(string $coin){
        $members = $this->memberDb();
        $cb = 0;
        foreach($members['data'] as $member){
            $currentB = $this->getDeposit($coin, $member['username_member'],"Accept");
            foreach($currentB as $current){
                $cb += $current['jum_history']+$current['biaya_persen'];
            }
        }
        return $cb;
    }

    public function countProfit(string $coin){
        $members = $this->memberDb();
        $profit = 0;
        foreach($members['data'] as $member){
            $currentProfit = $this->getProfit($coin, $member['username_member']);
            foreach($currentProfit as $current){
                $profit += $current['fee_profit_history'];
            }
        }
        return $profit;
    }

    public function countWD(string $coin){
        $members = $this->memberDb();
        $WD = 0;
        foreach($members['data'] as $member){
            $currentWD = $this->getWithDraw($coin, $member['username_member'],"Accept");
            foreach($currentWD as $current){
                $WD += $current['jum_history']+$current['biaya_persen'];
            }
        }
        return $WD;
    }
}




?>