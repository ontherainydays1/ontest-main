<?php 
include_once '../model/adminModel.php';
session_start();
class profileController {
    public static function saveBasic($name, $birth) {
        if ($name != null) {
            adminModel::editAccount($_SESSION['user']['mail'], 'hoten', $name);
        }
        if ($birth != null) {
            adminModel::editAccount($_SESSION['user']['mail'], 'ngaysinh', $birth);
        }
        self::getUser();
        $result = $_SESSION['user'];
        return $result;
    }

    public static function saveContact($phone) {
        if ($phone != null) {
            adminModel::editAccount($_SESSION['user']['mail'], 'sdt', $phone);
        }
        self::getUser();
        $result = $_SESSION['user'];
        return $result;
    }

    public static function savePass($password) {
        if ($password != null) {
            adminModel::editAccount($_SESSION['user']['mail'], 'password', $password);
        }
        self::getUser();
        $result = $_SESSION['user'];
        return $result;
    }

    public static function getUser() {
        $data = adminModel::getAccount($_SESSION['user']['mail']);
        $data = mysqli_fetch_array($data);
        $_SESSION['user'] = $data;
    }
}