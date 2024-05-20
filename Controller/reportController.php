<?php


include '../model/reportModel.php';
include '../View/reportView.php';

class ReportController{
    public static function createReport($email,$title,$noiDung){
        ReportModel::createReport($email,$title,$noiDung);
        $data['status']="success";
        $data['notice']="Gửi thông báo thành công";
        return $data;
    }
    public static function renderReport() {
        $data = ReportModel::getAllReports();
        $result = reportView::createReport($data);
        return $result;
    }
    public static function renderReportContent($maReport) {
        $data = ReportModel::getReport($maReport);
        $result = reportView::createReportContent($data);
        return $result;
    }
    public static function verify($maReport, $active) {
        $data = ReportModel::editReport($maReport,'trangThai',$active);
    }
}