<?php
class DataProvider {
    private static $localhost = "localhost";
    private static $username = "admin";
    private static $pass = "1Je4[(9frwiHQzi2";
    private static $db = "qlttn";
    // private static $connection = mysqli_connect(self::$localhost, self::$username, self::$pass, self::$db);

    public static function executeSQL($query) {
        $connection = mysqli_connect(self::$localhost, self::$username, self::$pass, self::$db);
        $resultSql = mysqli_query($connection, $query);
        return $resultSql;
    }

}
?>