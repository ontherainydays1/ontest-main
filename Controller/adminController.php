<?php
include "../View/Admin_Component.php";
include "../model/adminModel.php";
class adminController
{
    public static function renderAccountTable()
    {
        $head = array('Email', 'Mật khẩu', 'Chức vụ', 'Tên', 'Ngày sinh', 'Số điện thoại', 'Kích hoạt', 'Mã cá nhân');
        $data = adminModel::getAllAccounts();
        $result = adminTable::createTable($head, $data, adminTable::$accountModal);
        return $result;
    }
    public static function renderClassTable()
    {
        $head = array('Mã lớp', 'Tên lớp', 'Thông tin', 'Email giảng viên');
        $data = adminModel::getAllClasses();
        $result = adminTable::createTable($head, $data, adminTable::$classModal);
        return $result;
    }
    public static function renderQuestionTable()
    {
        $head = array('Mã câu', 'Mã nhóm', 'Nội dung', 'Đáp án');
        $data = adminModel::getAllQuestions();
        $result = adminTable::createTable($head, $data, adminTable::$questionModal);
        return $result;
    }
    public static function renderGroupQuestionTable()
    {
        $head = array('Mã nhóm câu hỏi', 'Tên nhóm câu hỏi');
        $data = adminModel::getAllGroupQuestions();
        $result = adminTable::createTable($head, $data, adminTable::$groupQuestionModal);
        return $result;
    }
    public static function renderAnswer() {
        $data = adminModel::getAllAnswers();
        $result = adminTable::createAnswerModal($data);
        return $result;
    }
    public static function clickDelete($id, $type)
    {
        if ($type == adminTable::$accountModal) {
            adminModel::deleteAccount($id);
            return self::renderAccountTable();
        } else if ($type == adminTable::$classModal) {
            adminModel::deleteClass($id);
            return self::renderClassTable();
        } else if ($type == adminTable::$groupQuestionModal) {
            adminModel::deleteGroupQuestion($id);
            return self::renderGroupQuestionTable();
        }else {
            adminModel::deleteQuestion($id);
            return self::renderQuestionTable();
        }
    }

    public static function editAccount($id, $password, $role, $name, $birth, $phone)
    {
        if ($password != null) {
            adminModel::editAccount($id, 'password', $password);
        }
        if ($role != null) {
            adminModel::editAccount($id, 'loaiTk', $role);
        }
        if ($name != null) {
            adminModel::editAccount($id, 'hoten', $name);
        }
        if ($birth != null) {
            adminModel::editAccount($id, 'ngaysinh', $birth);
        }
        if ($phone != null) {
            adminModel::editAccount($id, 'sdt', $phone);
        }
        return self::renderAccountTable();
    }

    public static function editClass($id, $tenLop, $thongTin, $email)
    {
        if ($tenLop != null) {
            adminModel::editClass($id, 'tenLop', $tenLop);
        }
        if ($thongTin != null) {
            adminModel::editClass($id, 'ThongTin', $thongTin);
        }
        if ($email != null) {
            adminModel::editClass($id, 'maGiangVien', $email);
        }
        return self::renderClassTable();
    }

    public static function editQuestion($id, $maNhom, $noiDung, $dapAn, $cauA, $cauB, $cauC, $cauD)
    {
        if ($maNhom != null) {
            adminModel::editQuestion($id, 'maNhom', $maNhom);
        }
        if ($noiDung != null) {
            adminModel::editQuestion($id, 'noiDung', $noiDung);
        }
        if ($dapAn != null) {
            adminModel::editQuestion($id, 'dapAn', $dapAn);
        }
        if ($cauA != null) {
            adminModel::editAnswer($id, 'a', 'noiDung', $cauA);
        }
        if ($cauB != null) {
            adminModel::editAnswer($id, 'b', 'noiDung', $cauB);
        }
        if ($cauC != null) {
            adminModel::editAnswer($id, 'c', 'noiDung', $cauC);
        }
        if ($cauD != null) {
            adminModel::editAnswer($id, 'd', 'noiDung', $cauD);
        }
    }

    public static function editGroupQuestion($id, $tenNhomCauHoi)
    {
        if ($tenNhomCauHoi != null) {
            adminModel::editGroupQuestion($id, 'tenNhomCauHoi', $tenNhomCauHoi);
        }
    }

    public static function active($id, $active) {
        adminModel::editAccount($id, 'active', $active);
    }

    public static function activeAll(){
        adminModel::editAccountWithoutCondition('active', '1');
    }

    public static function unActiveAll(){
        adminModel::editAccountWithoutCondition('active', '0');
    }
    public static function createGroupQuestion($tenNhomCauHoi) {
        adminModel::createGroupQuestion($tenNhomCauHoi);
        $data['notice']="Tạo nhóm câu hỏi thành công";
        return $data;
    }
}
