<?php  

class dbClass{
    private $servername;
    private $username;
    private $password;
    private $dbname;

    protected function dbConnect(){
        $this->servername = "localhost"; 
        $this->username = "u1438856_bottrade";
        $this->password = "riswanboss9999"; 
        $this->dbname = "u1438856_bottrade";
        // $this->servername = "localhost"; 
        // $this->username = "root";
        // $this->password = ""; 
        // $this->dbname = "bot_trend";
        $connect = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if($connect){
            return $connect;
        }
    }
}

?>