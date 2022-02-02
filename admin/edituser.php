<?php  
if(isset($_POST['edit_member'])){
    $memberData = new getAllMember();
    $username = $_POST["username_member"];
    $email_post = $_POST['email'];
    $notelpn_post = formatTelpn($_POST['notelpn']);
    $status_post = $_POST['status_member'];
    $password_post = $_POST['password'];
    $checkemail = $memberData->memberDb("cekemail",$email_post,$username);
    if($checkemail['jum'] == 0){
        $checktelpn = $memberData->memberDb("ceknotelpn",$notelpn_post,$username);
        if($checktelpn['jum'] == 0){
            $pass_hash = password_hash($password_post, PASSWORD_DEFAULT);
            $updateMember = $memberData->updateMember($username,$email_post,$notelpn_post,$pass_hash,"admin",$status_post);
            if($updateMember){
                header('Location: members');
                exit();
            }
        }else{
            $alert = "No Telpn Sudah Terdaftar!";
        }
    }else{
        $alert = "Email Sudah Terdaftar!";
    }
}

?>