<?php  
class depoAndWD extends dbClass{
    public function doDepo(string $user, string $fee, string $admin, string $coin){
        $sql = "INSERT INTO history_deposit_member_bot (username_history,jum_history,biaya_persen,type_coin_history) VALUES('$user','$fee','$admin','$coin')";

        $result = $this->dbConnect()->query($sql);
        return $result;
    }

    public function doWd(string $user, string $fee, string $admin, string $wallet, string $coin, string $type_wd){
        $sql = "INSERT INTO history_wd_member_bot (username_history,type_wd_history,type_coin_wd_history,token_history,jum_history,biaya_persen) VALUES('$user','$type_wd','$coin','$wallet','$fee','$admin')";
        $result = $this->dbConnect()->query($sql);
        return $result;
    } 
}
?>