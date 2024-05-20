<?php

include '../model/dataProvider.php';

class TestModel{

    
    public static function getAllTest(){
        $sql = "SELECT * FROM `bode`   ORDER BY `maDe` DESC;";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }

    public static function createTest($idClass,$nameTest,$thoiGianLamBai,$ngayThi,$daoCauHoi,$loaiDe){
        $sql = "INSERT INTO `bode` (`maDe`,`tenDe`, `maLop`, `thoiGianLamBai`,`ngayThi`, `daoCauHoi`, `xemDiem`, `xemDapAn`,`loaiDe`) VALUES (NULL,'$nameTest', '$idClass', '$thoiGianLamBai','$ngayThi','$daoCauHoi', '','','$loaiDe');";
        $data= DataProvider::executeSQL($sql);
        $data=mysqli_fetch_array(TestModel::getAllTest());
        return $data['maDe'];
    }   

    public static function deleteQuestionInTest($idTest){
        $sql = "DELETE FROM `chitietbode` WHERE maBoDe='$idTest';";
        $data = DataProvider::executeSQL($sql);
    }

    public static function saveQuestionInTestDefault($idTest,$arrQuestion){
        TestModel::deleteQuestionInTest($idTest);
        foreach($arrQuestion as &$value ){            
            $sql = "INSERT INTO `chitietbode` (`maCau`, `maBoDe`) VALUES ('$value', '$idTest');";
            $tmp= DataProvider::executeSQL($sql);
        }
        $data['status'] = 'success';
        return $data;
    }
    public static function saveQuestionInTestPDF($idTest,$arrQuestion){
        TestModel::deleteQuestionInTest($idTest);
        $cnt=0;
        foreach($arrQuestion as &$value ){            
            $sql = "INSERT INTO `chitietbode` (`maCau`, `maBoDe`,`dapAn`) VALUES ('$cnt', '$idTest','$value');";
            $tmp= DataProvider::executeSQL($sql);
            $cnt++;
        }
        $data['status'] = 'success';
        return $data;
    }

    public static function getTestOfClass($idClass){
        // $sql = "SELECT bode.maDe,bode.tenDe,bode.maLop,bode.thoiGianLamBai,bode.ngayThi,bode.daoCauHoi,bode.xemDiem,bode.xemDapAn,AVG(bailam.diem) as diemtb FROM bode LEFT JOIN bailam on bode.maDe=bailam.maDe WHERE bode.maLop='$idClass' GROUP BY bode.maDe;";
        $sql = "SELECT bode.maDe,bode.tenDe,bode.maLop,bode.thoiGianLamBai,bode.ngayThi,bode.daoCauHoi,bode.xemDiem,bode.xemDapAn,AVG(bailam.diem) as diemtb FROM bode LEFT JOIN bailam on bode.maDe=bailam.maDe WHERE bode.maLop='$idClass' GROUP BY bode.maDe ORDER BY `ngayThi` DESC;";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }

    public static function getInfoTest($idTest){
        // $sql = "SELECT bode.maDe, bode.tenDe,bode.thoiGianLamBai,bode.ngayThi,bode.daoCauHoi,bode.xemDapAn,bode.xemDiem, COUNT(chitietdiem.maTaiKhoan) as slBai FROM `bode` LEFT JOIN chitietdiem on chitietdiem.maDe=bode.maDe WHERE bode.maDe='$idTest' GROUP BY bode.maDe;";
        $sql = "SELECT bode.maDe, bode.tenDe,bode.thoiGianLamBai,bode.ngayThi,bode.daoCauHoi,bode.xemDapAn,bode.xemDiem,bode.loaiDe, COUNT(bailam.maTaiKhoan) as slBai FROM `bode` LEFT JOIN bailam on bailam.maDe=bode.maDe WHERE bode.maDe='$idTest' GROUP BY bode.maDe;";

        $data= DataProvider::executeSQL($sql);
        return $data;
    }

    public static function deleteTest($idTest){
        $sql = "DELETE FROM `boDe` WHERE `maDe`='$idTest';";
        $data= DataProvider::executeSQL($sql);    
        //TO DO remove Student, remove Test
    }

    public static function getListTestNoSubmit($idClass,$idStudent){
        $sql = "SELECT * FROM bode WHERE bode.maDe NOT IN ( SELECT bailam.maDe FROM bailam WHERE bailam.maTaiKhoan=\"$idStudent\") AND bode.maLop=\"$idClass\" ORDER BY `bode`.`maDe` DESC ;";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }
    public static function getListTestSubmited($idClass,$idStudent){
        $sql = "SELECT * FROM bode WHERE bode.maDe IN ( SELECT bailam.maDe FROM bailam WHERE bailam.maTaiKhoan=\"$idStudent\") AND bode.maLop=\"$idClass\"ORDER BY `bode`.`maDe` DESC ;";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }

    public static function getInfoTestSubmited($idTest,$idStudent){
        $sql = "SELECT * FROM bailam,bode WHERE bailam.maDe=bode.maDe and bailam.maTaiKhoan='$idStudent' AND bailam.maDe='$idTest';";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }

    public static function getQuestionOfTest($idTest){
        $sql = "SELECT cauhoi_nganhang.noiDung, cauhoi_nganhang.maCau FROM chitietbode,cauhoi_nganhang WHERE chitietbode.maCau=cauhoi_nganhang.maCau and chitietbode.maBoDe='$idTest';";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }
    
    public static function getQuestionOfTestPDF($idTest){
        $sql = "SELECT * FROM chitietbode WHERE chitietbode.maBoDe='$idTest';";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }

    public static function getAnswerOfTest($idTest){
        $sql = "SELECT * FROM luachon WHERE luachon.maCau IN ( SELECT chitietbode.maCau FROM chitietbode WHERE chitietbode.maBoDe='$idTest');";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }

    public static function taoChiTietBaiLam($listAnswer,$idTest,$email,$loaiDe){
        $result="";
        if($loaiDe=='default'){
            foreach($listAnswer as $Answer){
                $maCau=$Answer->maCau;
                $luaChon=$Answer->luaChon;
                $sql = "INSERT INTO `chitietbailam`(`maTaiKhoan`, `maCau`, `maDe`, `dapAnChon`) VALUES ('$email','$maCau','$idTest','$luaChon');";
                $data = DataProvider::executeSQL($sql);
            }
        }else{
            $maCau=0;
            foreach($listAnswer as $luaChon){
                $sql = "INSERT INTO `chitietbailam`(`maTaiKhoan`, `maCau`, `maDe`, `dapAnChon`) VALUES ('$email','$maCau','$idTest','$luaChon');";
                $data = DataProvider::executeSQL($sql);
                $maCau++;
            }
        }
    }

    public static function getQuestionAndAnswerOfTest($idTest){
        $sql = "SELECT cauhoi_nganhang.noiDung, cauhoi_nganhang.maCau,cauhoi_nganhang.dapAn FROM chitietbode,cauhoi_nganhang WHERE chitietbode.maCau=cauhoi_nganhang.maCau and chitietbode.maBoDe='$idTest';";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }
    public static function taoBaiLam($idTest,$email,$diem){
        $sql = "INSERT INTO `bailam`(`maTaiKhoan`, `maDe`, `diem`) VALUES ('$email','$idTest','$diem');";
        $data = DataProvider::executeSQL($sql);
    }

    public static function getBaiLam($idTest,$idStudent){
        $sql = "SELECT * FROM `chitietbailam` WHERE chitietbailam.maTaiKhoan='$idStudent' AND chitietbailam.maDe='$idTest';"; 
        $data = DataProvider::executeSQL($sql);
        return $data;
    }

    public static function alterInfoTest($idTest,$nameTest,$thoiGianLamBai,$ngayThi,$daoCauHoi){
        $sql = "UPDATE `bode` SET  `tenDe`='$nameTest',`thoiGianLamBai`='$thoiGianLamBai',`ngayThi`='$ngayThi',`daoCauHoi`='$daoCauHoi' WHERE bode.maDe='$idTest';";
        $data = DataProvider::executeSQL($sql);
    }

    public static function getTestscores($idTest,$idClass){
        // $sql = "SELECT taikhoan.mail,taikhoan.hoten,taikhoan.ngaysinh,bailam.diem FROM taikhoan,chitietlop LEFT JOIN bailam ON chitietlop.maTaiKhoan=bailam.maTaiKhoan AND bailam.maDe='$idTest' WHERE taikhoan.mail=chitietlop.maTaiKhoan and chitietlop.maLop='$idClass';";
        $sql = "SELECT taikhoan.mail,taikhoan.hoten,taikhoan.maCanhan,taikhoan.ngaysinh,bailam.diem,bailam.maDe FROM taikhoan,chitietlop LEFT JOIN bailam ON chitietlop.maTaiKhoan=bailam.maTaiKhoan AND bailam.maDe='$idTest' WHERE taikhoan.mail=chitietlop.maTaiKhoan and chitietlop.maLop='$idClass';";
        $data= DataProvider::executeSQL($sql);    
        return $data;
    }

    public static function getDetialtest($idTest){
        $sql = "SELECT chitietbode.maCau,cauhoi_nganhang.noiDung noiDungcauhoi,cauhoi_nganhang.dapAn,luachon.noiDung noiDungluachon FROM chitietbode,cauhoi_nganhang,luachon WHERE chitietbode.maBoDe='$idTest' and chitietbode.maCau=cauhoi_nganhang.maCau and cauhoi_nganhang.maCau=luachon.maCau and luachon.laDapAn=1;";
        $data= DataProvider::executeSQL($sql);    
        return $data;
    }
    
}

