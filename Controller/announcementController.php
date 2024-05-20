<?php
include_once '../model/announcementModel.php';
include_once '../View/_partial/TeacherAndStudent_Component/Announcement.php';
class announcementController {
    public static function renderAnnounment($idClass) {
        $data = announcementModel::getAllAnnouncements($idClass);
        $result = Announcement::createAnnouncement($data);
        return $result;
    }

    public static function renderAnnoucementContent($idAnnouncement) {
        $data = announcementModel::getAnnouncementContent($idAnnouncement);
        $result = Announcement::createAnnouncementContent($data);
        return $result;
    }
}