<?php

include '../model/dataProvider.php';

class QuestionModel {
    public static function getAllQuestion(){
        $sql = "SELECT * FROM cauhoi_nganhang , nhomcauhoi WHERE cauhoi_nganhang.maNhom=nhomcauhoi.maNhomCauHoi ORDER BY `maCau` ASC ;";
        $data= DataProvider::executeSQL($sql);
        return $data;
    }

    public static function getAllAnswer(){
        $sql = "SELECT * FROM `luachon` ORDER BY `maCau` ASC,`maLuaChon` ASC ;";
        $data= DataProvider::executeSQL($sql);
        return $data;
    }

    public static function getAllGroupQuestions(){
        $sql = "SELECT * FROM `nhomcauhoi`;";
        $data= DataProvider::executeSQL($sql);
        return $data;
    }

    public static function createQuestionGroup($name){
        $sql = "INSERT INTO `nhomcauhoi`(`maNhomCauHoi`, `tenNhomCauHoi`) VALUES (NULL,'$name');";
        $data= DataProvider::executeSQL($sql);
        $sql = "SELECT * FROM nhomcauhoi WHERE tenNhomCauHoi='$name' ORDER BY `maNhomCauHoi` DESC;"; 
        $data= DataProvider::executeSQL($sql);
        return mysqli_fetch_array($data)['maNhomCauHoi'];
    }

    public static function createQuestion($noiDung,$idGroup,$dapAn){
        $sql = "INSERT INTO `cauhoi_nganhang` (`maCau`, `maNhom`, `noiDung`,`dapAn`) VALUES (NULL, '$idGroup', '$noiDung','$dapAn');";
        $data= DataProvider::executeSQL($sql);
        $sql = "SELECT * FROM `cauhoi_nganhang` WHERE noiDung='$noiDung' ORDER BY `maCau` DESC;";
        $data= DataProvider::executeSQL($sql);
        return mysqli_fetch_array($data)['maCau'];
    }

    public static function createAnswer($maCau,$maLuaChon,$noiDung,$laDapAn){
        $sql = "INSERT INTO `luachon` (`maLuaChon`, `maCau`, `noiDung`, `laDapAn`) VALUES ('$maLuaChon', '$maCau', '$noiDung', '$laDapAn');";
        $data= DataProvider::executeSQL($sql);
    }

    public static function getQuestionOfTest($idTest){
        $sql = "SELECT * FROM chitietbode ,cauhoi_nganhang WHERE chitietbode.maCau=cauhoi_nganhang.maCau and chitietbode.maBoDe=$idTest;";
        $data= DataProvider::executeSQL($sql);
        return $data;
    }

}

    // $data= QuestionModel::getAllQuestion();
    // while ($row=mysqli_fetch_array($data)){
    //     echo $row[0];
    // }
