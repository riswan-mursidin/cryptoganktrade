<?php  
class getAllAdmin extends dbClass{

    public function getDataAdmin($admin){
        $sql = "SELECT * FROM admin_bot WHERE username_admin='$admin'";
        $result = $this->dbConnect()->query($sql);
        $jum = $result->num_rows;
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        $return['jum'] = $jum;
        $return['data'] = $data;
        return $return;
    }

    public function getAdmin(){
        $sql = "SELECT * FROM wallet_admin_bot";
        $result = $this->dbConnect()->query($sql);
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }

    public function getBonus(){
        $sql = "SELECT * FROM bonus_referral_member_bot";
        $result = $this->dbConnect()->query($sql);
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }

    public function getBiayaAdmin(){
        $sql = "SELECT * FROM biaya_admin";
        $result = $this->dbConnect()->query($sql);
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }



    public function updateWallet(array $urls){
        $n = 0;
        foreach($urls as $url){
            ++$n;
            $sql = "UPDATE wallet_admin_bot SET url_wallet='$url' WHERE id_wallet='$n'";
            $result = $this->dbConnect()->query($sql);
        }
    }
    public function updateBiaya(array $by){
        $n = 0;
        foreach($by as $b){
            ++$n;
            $sql = "UPDATE biaya_admin SET persen_biaya='$b' WHERE id_biaya='$n'";
            $result = $this->dbConnect()->query($sql);
        }
    }
    public function updatePersen(array $persens){
        $n = 0;
        foreach($persens as $sen){
            ++$n;
            $sql = "UPDATE bonus_referral_member_bot SET persen_bonus='$sen' WHERE id_bonus='$n'";
            $result = $this->dbConnect()->query($sql);
        }
    }
}


?>