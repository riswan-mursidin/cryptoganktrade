<?php  
class viewMember extends getAllMember{

    public function lastJoinMember(){
        $members = $this->memberDb();
        $i = 0;
        foreach($members['data'] as $member){
            ++$i;
            if($i > 5){
                break;
            }else{
                echo    '<tr>
                            <td>'.$member['username_member'].'</td>
                            <td>'.$member['email_member'].'</td>
                            <td>'.$member['telpn_member'].'</td>
                            <td>'.formatDate($member['date_member']).'</td>
                        </tr>';
            }
        }
    }

    

    public function DataMmeber(){
        $members = $this->memberDb();
        foreach($members['data'] as $member){
            echo    '<tr class="align-items-center">
                            <td>'.formatDate($member['date_member']).'</td>
                            <td>'.$member['username_member'].'</td>
                            <td>'.leaderview($member['upline_member']).'</td>
                            <td>'.$member['email_member'].'</td>
                            <td>'.$member['telpn_member'].'</td>
                            <td><a href="#membercb'.$member['username_member'].'" data-bs-toggle="modal" class="text-warning" style="font-weight: bolder">Detail</a></td>
                            <td>'.statusMember($member['status_member']).'</td>
                            <td>
									<button class="btn btn-success btn-sm"  data-bs-target="#member'.$member['username_member'].'" data-bs-toggle="modal">
                                        <svg  xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                        </svg>
									</button>
								</td>
                        </tr>';
        }
    }
    
    public function historyWD($coin){
        $getwd = $this->getWithDraw($coin, null, "allxcoin");
        foreach($getwd as $wd){
            echo    "<tr>
                        <td>".formatDate($wd['date_history'])."</td>
                        <td>".$wd['type_wd_history']."</td>
                        <td>".$wd['username_history']."</td>
                        <td>".cekDesimal($wd['jum_history'])."</td>
                        <td>".cekDesimal($wd['biaya_persen'])."</td>
                        <td>".statusWD($wd['status_history'])."</td>
                        <td>".formatDate($wd['date_confirm_history'])."</td>
                    </tr>";
        }
    }

    public function historyDeposit($coin){
        $getdepo = $this->getDeposit($coin, null, "allxcoin");
        foreach($getdepo as $depo){
            echo    "<tr>
                        <td>".formatDate($depo['tgl_history'])."</td>
                        <td>".$depo['username_history']."</td>
                        <td>".cekDesimal($depo['jum_history'])."</td>
                        <td>".cekDesimal($depo['biaya_persen'])."</td>
                        <td>".statusWD($depo['status_history'])."</td>
                        <td>".formatDate($depo['tgl_update_history'])."</td>
                    </tr>";
        }
    }

    public function getConfirWD(){
        $getwd = $this->getWithDraw(null, null, "all");
        foreach($getwd as $wd){
            echo '<tr>
                    <td>'.formatDate($wd['date_history']).'</td>
                    <td>'.$wd['username_history'].'</td>
                    <td>'.cekDesimal($wd['jum_history']).' '.$wd['type_coin_wd_history'].'</td>
                    <td>'.$wd['type_wd_history'].'</td>
                    <td><a href="#wdd'.$wd['id_history'].'" data-bs-toggle="modal">'.statusWD($wd['status_history']).'</a></td>
                    <td>'.formatDate($wd['date_confirm_history']).'</td>
                </tr>';
        }
    }
    public function getConfirDEPO(){
        $getdepo = $this->getDeposit(null, null, "all");
        foreach($getdepo as $depo){
            echo '<tr>
                    <td>'.formatDate($depo['tgl_history']).'</td>
                    <td>'.$depo['username_history'].'</td>
                    <td>'.cekDesimal($depo['jum_history']).' '.$depo['type_coin_history'].'</td>
                    <td><a href="#depoo'.$depo['id_history'].'" data-bs-toggle="modal">'.statusWD($depo['status_history']).'</a></td>
                    <td>'.formatDate($depo['tgl_update_history']).'</td>
                </tr>';
        }
    }
}

?>