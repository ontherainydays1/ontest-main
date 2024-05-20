<?php
include_once '../model/dataProvider.php';
class announcementModel {
    public static function getAllAnnouncements($idClass) {
        $sql = "SELECT * FROM thongbao WHERE idClass = '$idClass'";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }

    public static function getAnnouncementContent($idAnnouncement) {
        $sql = "SELECT * FROM thongbao WHERE idNotice ='$idAnnouncement'";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }
}