<?php

include '../model/classModel.php';
include '../View/classView.php';

class ClassController{
    
    public static function checkClassExists($idClass){
        $data=ClassModel::getAllClass();
        while ($row = mysqli_fetch_array($data)){
            if($row[0]==$idClass){
                return true;
            }
            
        }
        return false;
    }

    public static function createClass($idClass,$info,$email,$name){
        if(ClassController::checkClassExists($idClass)){
            $data['notice']="Mã lớp đã tồn tại";
            $data['status']="fails";
            return $data;
        }
        else{
            ClassModel::createClass($idClass,$info,$email,$name);
            $data['status']="success";
            $data['notice']="Tạo lớp thành công";
            return $data;
        }

    }

    public static function getClassOfTeacher($email){
        $data= ClassModel::getClassOfTeacher($email);
        return $data;
    }

    public static function getClass($idClass){
        return mysqli_fetch_array(ClassModel::getClass($idClass));
    }
    public static function getClassforteacher($idClass){
        $data=mysqli_fetch_array(ClassModel::getClassforteacher($idClass));
        $data['soLuongbaikt']=mysqli_fetch_array(ClassModel::countTestInClass($idClass))['soLuong'];
        return $data;
    }

    public static function deleteClass($idClass){
        ClassModel::deleteClass($idClass);
        $data['notice']="Xóa lớp thành công";
        $data['status']="success";
        return $data;
    }

    public static function renderListClass($email){
        $dataSQL=ClassController::getClassOfTeacher($email);
        $data=ClassView::rederClass($dataSQL);
        // $data['status']="success";
        return $data;
    }

    public static function renderMember($idClass){
        $dataSQL= ClassModel::getStudentInClass($idClass);
        $data=ClassView::renderMember($dataSQL);
        return $data;
    }

    public static function getStudentInClass($idClass){
        $data= ClassModel::getStudentInClass($idClass);
        $listStudent=array();
        while($row=mysqli_fetch_array($data)){
            $listStudent[]=$row;
        }
        return $listStudent;
    }

    public static function renderContainerInfoClass(){
        $data=ClassView::renderContainerInfoClass();
        return $data;
    }

    public static function getClassOfStudent($email){
        $data= ClassModel::getClassOfStudent($email);
        return $data;
    }

    public static function renderListClassOfStudent($email){
        $dataSQL=ClassController::getClassOfStudent($email);
        $data=ClassView::rederClass($dataSQL);
        return $data;
    }

    public static function checkStudentInClass($idClass,$email){
        $data=ClassModel::getClassOfStudent($email);
        while($row = mysqli_fetch_array($data)){
            if($row['maLop']==$idClass){
                return true;
            }
        }
        return false;
    }

    public static function addStudentToClass($idClass,$email){
        if(!ClassController::checkClassExists($idClass)){
            $data['notice']="Mã lớp không tồn tại";
            $data['status']="fails";
            return $data;
        }
        if(ClassController::checkStudentInClass($idClass,$email)){
            $data['notice']="Sinh viên đẫ tham gia lớp";
            $data['status']="fails";
            return $data;
        }
        ClassModel::addStudentToClass($idClass,$email);
        $data['status']="success";
        $data['notice']="Tham gia lớp thành công";
        return $data;
    }

    public static function removeStudent($idClass,$email){
        ClassModel::removeStudent($idClass,$email);
        $data['status']="success";
        $data['notice']="Rời lớp thành công";
        return $data;
    }

    public static function removeStudentsFromClass($idClass,$email){
        ClassModel::removeStudent($idClass,$email);
        $data['status']="success";
        $data['notice']="Xóa sinh viên thành công";
        return $data;
    }



    public static function addListStudent($idClass,$listIdstudent){
        $arrayStudent=json_decode($listIdstudent);
        foreach($arrayStudent as $student){
            if(ClassModel::checkUsersExit($student))
                if(!ClassController::checkStudentInClass($idClass,$student) ){
                    ClassModel::addStudentToClass($idClass,$student);
                }
        }
        $data['notice']="Thêm sinh viên thành công";
        return $data;
    }

    public static function createNotice($title,$notice,$idClass){
        ClassModel::createNotice($title,$notice,$idClass);
        $data['notice']="Thêm thông báo thành công";
        return $data;
    }

    public static function renderAnnouncement($idClass)
    {
        $head = array('Mã thông báo', 'Mã lớp', 'Tiêu đề', 'Nội dung', 'Thời gian');
        $data = ClassModel::getAllAnnouncements($idClass);
        $result = ClassView::createTableAnnouncement($head, $data);
        return $result;
    }

    public static function deleteAnnouncement($id) {
        ClassModel::deleteAnnouncement($id);
    }

    public static function editAnnouncement($id, $tieuDe, $noiDung, $thoiGian)
    {
        if ($tieuDe != null) {
            ClassModel::editAnnouncement($id, 'title', $tieuDe);
        }
        if ($noiDung != null) {
            ClassModel::editAnnouncement($id, 'notice', $noiDung);
        }
        if ($thoiGian != null) {
            ClassModel::editAnnouncement($id, 'date', $thoiGian);
        }
    }

    public static function delete_listStudent($listIdstudent,$idClass){
        $arrayStudent=json_decode($listIdstudent);
        foreach($arrayStudent as $student){
            ClassModel::removeStudent($idClass,$student);
        }
        $data['status']="success";
        $data['notice']="Rời lớp thành công";
        return $data;
    }

}
    // echo ClassController::renderMember("5IabAbm4");
