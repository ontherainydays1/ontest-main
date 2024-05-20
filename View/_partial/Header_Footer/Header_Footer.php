<?php
$homePage = "Home Page";
$studentPage = "Student Page";
$teacherPage = "Teacher Page";
$profile = 'Profile';
$admin = 'Admin';
$link = '';
$linkName ='';
function head($currentPage)
{
    global $link, $linkName, $profile;
    $headerRight = "";
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['loaiTk'] == 'sv') {
            $linkName = 'Trang Sinh Viên';
            $link = './studentPage.php';
        } else if ($_SESSION['user']['loaiTk'] == 'gv') {
            $linkName = 'Trang Giảng Viên';
            $link = './teacherPage.php';
        } else {
            $linkName = 'Trang Admin';
            $link = './Admin.php';
        }
    }
    // $username = "Toàn";
    if (!isset($_SESSION['user'])) {
        $headerRight = '
        <button type="button" class="btn btn-success col-3 shadow fs-5" style="width: 140px;" data-bs-toggle="modal" data-bs-target="#form_signIn" >Đăng nhập</button>
        <button type="button" class="btn btn-outline-warning col-3 shadow fs-5" style="width: 140px;" data-bs-toggle="modal" data-bs-target="#form_signUp" >Đăng ký</button>';
    } else if ($currentPage == $profile) {
        $username = $_SESSION['user'][3];
        $headerRight = '
        <li class="nav-item dropstart">
            <a class="nav-link fs-5 text-nowrap dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                ' . $username . '
            </a>
            <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#" id="btnLogOut">Đăng xuất</a></li>
            </ul>
        </li>';
    }else {
        $username = $_SESSION['user'][3];
        $headerRight = '
        <li class="nav-item dropstart">
            <a class="nav-link fs-5 text-nowrap dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                ' . $username . '
            </a>
            <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="./Profile.php">Hồ sơ</a></li>
                <hr>
                <li><a class="dropdown-item" href="#" id="btnLogOut">Đăng xuất</a></li>
            </ul>
        </li>';
    }
    echo '<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="' . $link . '">
                    <img src="./Assets/img/Logo.png" alt="Avatar Logo" style="width:36px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav gap-3">
                        ' . createLinkAndButton($currentPage, $link, $linkName) . '
                        ' . $headerRight . '
                    </ul>
                </div>
            </div>
        </nav>';
}
function footer()
{
    global $link;
    echo '<div class="row p-5" style="background-color: #82dda5; margin-right:0px">
            <div class="col-3 m-auto">
                <a class="navbar-brand" href="'.$link.'">
                <img src="./Assets/img/Logo.png" alt="Avatar Logo" style="width:80px;">
                </a>
                <p> &copy;copyright 2022 OnTest All Rights Reserved</p>
            </div>
            <div class="col-3 m-auto ps-5">
                <h5>Email</h5>
                <p>ontest@gmail.com</p>
                <h5>Địa chỉ</h5>
                <p>273 An D. Vương, Phường 3, Quận 5, Thành phố Hồ Chí Minh</p>
            </div>
            <div class="col-3 m-auto text-center">
                <h5>Thông tin</h5>
                <a class="nav-link link-dark" href="#">Giới Thiệu</a>
                <a class="nav-link link-dark" href="#">Liên Lạc</a>
            </div>
        </div>';
}
function createLinkAndButton($currentPage, $link, $linkName)
{
    global $studentPage, $profile, $teacherPage;
    if ($currentPage == $studentPage) {
        return '<li class="nav-item">
                    <a class="nav-link fs-5 text-nowrap" href="#"   data-bs-toggle="modal" data-bs-target="#form_findClass" ><i class="fas fa-plus-circle"></i> Tìm lớp</a>
                </li>';
    } else if ($currentPage == $profile) {
        return '<li class="nav-item">
                    <a class="nav-link fs-5 text-nowrap" href="'.$link.'">'.$linkName.'</a>
                </li>';
    } else if ($currentPage == $teacherPage) {
        return '<li class="nav-item">
                    <a class="nav-link fs-5 text-nowrap" href="#" data-bs-toggle="modal" data-bs-target="#form_createClass" ><i class="fas fa-plus-circle"></i> Tạo lớp</a>
                </li>';
    } else {
        return '';
    }
}