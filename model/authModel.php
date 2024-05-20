<?php

include '../model/dataProvider.php';

class AuthModel{
    public static function getAllUsers(){
        $sql = "SELECT * FROM `taikhoan`;";
        $dataSql= DataProvider::executeSQL($sql);
        return $dataSql;
    }

    public static function getUsers($email){
        $sql = "SELECT * FROM `taikhoan` WHERE `mail` =\"$email\";";
        $dataSql= DataProvider::executeSQL($sql);
        return $dataSql;
    }

    public static function checkUsersExit($email){
        $dataSql=  AuthModel :: getAllUsers();
        while ($row = mysqli_fetch_array($dataSql)){
            if($row[0]==$email){
                return true;
            }
            
        }
        return false;
    }   
    
    public static function createUser($email,$pass,$maCn,$hoten,$ngaysinh,$sdt,$cv){        
        $sql = "INSERT INTO `taikhoan` (`mail`, `password`,`maCanhan`, `loaiTk`, `hoten`, `ngaysinh`, `sdt`, `active`) VALUES ('$email', '$pass','$maCn', '$cv', '$hoten', '$ngaysinh', '$sdt',0);";
        $dataSql=DataProvider::executeSQL($sql);
    }
    

}   
?>

