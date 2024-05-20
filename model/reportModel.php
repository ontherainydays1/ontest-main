<?php

include '../model/dataProvider.php';


class ReportModel{
    public static function createReport($email,$title,$noiDung){
        $sql = "INSERT INTO `report`(`maReport`, `maGv`, `tieuDe`, `noiDung`) VALUES (null,'$email','$title','$noiDung');";
        $data = DataProvider::executeSQL($sql);
    }
    public static function getAllReports(){
        $sql = "SELECT * FROM `report`";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }
    public static function getReport($maReport) {
        $sql = "SELECT * FROM `report` WHERE `maReport` = '$maReport'";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }
    public static function editReport($id, $field, $info)
    {
        $sql = 'UPDATE report SET ' . $field . ' = "' . $info . '" WHERE maReport = "' . $id . '"';
        DataProvider::executeSQL($sql);
    }
}