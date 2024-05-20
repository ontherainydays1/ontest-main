<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Home</title>
    <?php
    include './View/form/formSignUp.php';
    include './View/form/formSignIn.php';
    include "./View/_partial/popup/notice.php";
    ?>
</head>

<body class="selector-for-some-widget">

    <!-- Header -->

    <?php
    require("./View/_partial/Header_Footer/Header_Footer.php");
    head($homePage);
    ?>

    <!-- Giới Thiệu -->
    <div id="containerPopUp">
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col mt-5">
                <h1 style="font-size: 300%;">Cùng nhau <span class="text-success"> học tập, kiểm tra </span> trực tuyến</h1>
                <!-- cần bổ sung -->
                <p>
                    OnTest mang tới cho bạn một công cụ hỗ trợ việc
                    <span class="fw-bold">
                        quản lý và thực hiện bài kiểm tra theo hình thức online
                    </span>
                    một cách dễ dàng và hiệu quả.
                </p>
                <button type="button" class="btn btn-success shadow" data-bs-toggle="modal" data-bs-target="#form_signUp">THAM GIA NGAY</button>
            </div>
            <div class="col text-center">
                <img src="./Assets/img/Light bulb.jpg" alt="lightbulb">
            </div>
        </div>
    </div>

    <!-- Đặc điểm -->

    <div class="p-5 text-center" style="background-color: #82dda5; margin-top: 100px;">
        <div class="row gap-3">
            <div class="col-xl-2 m-auto">
                <div class="p-3 bg-info rounded-top">
                    <h6>Tiện dụng</h6>
                </div>
                <div class="bg-white rounded-bottom" style="height: 150px;">
                    <p class="p-4">Dễ dàng sử dụng với những <span class="fw-bold"> thao tác đơn giản </span></p>
                </div>
            </div>
            <div class="col-xl-2 m-auto">
                <div class="p-3 bg-warning rounded-top">
                    <h6>Tự động</h6>
                </div>
                <div class="bg-white rounded-bottom" style="height: 150px;">
                    <p class="p-3">Những tác vụ được <span class="fw-bold"> tự động hoá </span> giúp người dùng có thời gian tập trung vào các công việc chính</p>
                </div>
            </div>
            <div class="col-xl-2 m-auto">
                <div class="p-3 bg-danger rounded-top">
                    <h6>Bảo mật</h6>
                </div>
                <div class="p-3 bg-white rounded-bottom" style="height: 150px;">
                    <p class="p-2">Kiểm duyệt học sinh ra vào lớp, <span class="fw-bold"> chống rò rỉ </span> tài nguyên giảng dạy.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tính năng -->

    <div class="p-5 row" style="margin-right: 0px;">
        <h1 class="mb-5  text-center"> <span class="text-success">Tính năng </span> nổi bật</h1>
        <div class="col-sm-6 text-center border-end">
            <img src="./Assets/img/function.png" alt="function" style="width:70%" class="m-5 img-thumbnail">
        </div>
        <div class="col-sm-6 ps-5">
            <p class="m-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M5.536 21.886C5.682 21.962 5.841 22 6 22C6.2 22 6.398 21.94 6.569 21.822L19.569 12.822C19.839 12.635 20 12.328 20 12C20 11.672 19.839 11.365 19.569 11.178L6.569 2.178C6.264 1.966 5.864 1.941 5.536 2.114C5.206 2.287 5 2.628 5 3V21C5 21.372 5.206 21.713 5.536 21.886ZM7 4.909L17.243 12L7 19.091V4.909Z" fill="#2B2C34" />
                </svg>
                <span>Kho dữ liệu rộng lớn</span>
            </p>
            <p class="m-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M5.536 21.886C5.682 21.962 5.841 22 6 22C6.2 22 6.398 21.94 6.569 21.822L19.569 12.822C19.839 12.635 20 12.328 20 12C20 11.672 19.839 11.365 19.569 11.178L6.569 2.178C6.264 1.966 5.864 1.941 5.536 2.114C5.206 2.287 5 2.628 5 3V21C5 21.372 5.206 21.713 5.536 21.886ZM7 4.909L17.243 12L7 19.091V4.909Z" fill="#2B2C34" />
                </svg>
                <span>Hệ thống chấm thi</span>
            </p>
            <p class="m-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M5.536 21.886C5.682 21.962 5.841 22 6 22C6.2 22 6.398 21.94 6.569 21.822L19.569 12.822C19.839 12.635 20 12.328 20 12C20 11.672 19.839 11.365 19.569 11.178L6.569 2.178C6.264 1.966 5.864 1.941 5.536 2.114C5.206 2.287 5 2.628 5 3V21C5 21.372 5.206 21.713 5.536 21.886ZM7 4.909L17.243 12L7 19.091V4.909Z" fill="#2B2C34" />
                </svg>
                <span>Quản lý đề thi</span>
            </p>
            <p class="m-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M5.536 21.886C5.682 21.962 5.841 22 6 22C6.2 22 6.398 21.94 6.569 21.822L19.569 12.822C19.839 12.635 20 12.328 20 12C20 11.672 19.839 11.365 19.569 11.178L6.569 2.178C6.264 1.966 5.864 1.941 5.536 2.114C5.206 2.287 5 2.628 5 3V21C5 21.372 5.206 21.713 5.536 21.886ZM7 4.909L17.243 12L7 19.091V4.909Z" fill="#2B2C34" />
                </svg>
                <span>Thống kê</span>
            </p>
        </div>
    </div>

    <!-- Footer -->

    <?php
    footer();
    ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var CV = "gv";

    function setCV(cv) {
        CV = cv;
    }
    $(document).ready(function() {
        $("#btnFormSignUp").click(function(e) {
            postDataSignUp();

        });
        $("#btnFormSignIn").click(function(e) {
            postDataSignIn();

        });
    });
    function check() {
        // return true; 
        let dangki = document.querySelector('.frmSignUp');
        let emails = $("#inputEmail").val();
        let password = $("#inputPass1").val();
        let password2 = $("#inputPass2").val();
        let sdt = $("#inputSdt").val();
        let ngaysinh = $("#inputDate").val();
        let gioitinh = $("#inputGioitinh").val();
        if (emails.trim() == "" || password.trim() == "" || sdt.trim() == "" || ngaysinh.trim() == "" || gioitinh.trim() == "") {
            showNotice("Vui lòng nhập đầy đủ thông tin");
            dangki.classList.add('was-validated');
            return false;
        }
        if (!checkSdt(sdt)) {
            showNotice('Số điện thoại của bạn không đúng định dạng!');
            dangki.classList.add('was-validated');
            return false;
        }
        if (!checkEmail(emails)) {
            showNotice('Email của bạn không đúng định dạng!');
            dangki.classList.add('was-validated');
            return false;
        }
        if (!checkPass(password)) {
            showNotice('Mật khẩu không được chứa kí tự đặt biệt và phải hơn 8 kí tự');
            dangki.classList.add('was-validated');
            return false;
        }
        if (password != password2) {
            showNotice("Mật khẩu không khớp vui lòng nhập lại");
            dangki.classList.add('was-validated');
            return false;
        }
        if (!$('#checkCondition').is(':checked')) {
            showNotice("Vui lòng đồng ý với các điều khoản của chúng tôi.");
            dangki.classList.add('was-validated');
            return false;
        }
        return true;
    }

    function checkPass(pass) {
        let pass_regex = /^[a-zA-Z0-9]{8,}$/;
        return pass_regex.test(pass);
    }

    function checkSdt(sdt) {
        var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
        return vnf_regex.test(sdt);
    }

    function checkEmail(email) {
        return String(email)
            .toLowerCase()
            .match(
                /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
    }

    function postDataSignUp() {
        let ten = $("#inputTen").val();
        let emails = $("#inputEmail").val();
        let maCn=$("#inputMacn").val();
        let password = $("#inputPass1").val();
        let password2 = $("#inputPass2").val();
        let sdt = $("#inputSdt").val();
        let ngaysinh = $("#inputDate").val();
        let gioitinh = $("#inputGioitinh").val();
        console.log(ten);
        console.log(emails);
        console.log(password);
        console.log(password2);
        console.log(sdt);
        console.log(gioitinh);
        console.log(ngaysinh);
        console.log(CV);
        if (check()) {
            console.log("ajax")
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: 'signUp',
                    user: emails,
                    hoten: ten,
                    password: password,
                    sdt: sdt,
                    ngaysinh: ngaysinh,
                    gioitinh: gioitinh,
                    cv: CV,
                    maCn:maCn,
                },
                success: function(data) {
                    console.log(data);
                    showNotice(JSON.parse(data)['notice']);
                    if (JSON.parse(data)['status'] == 'success') {
                        // $('#form_signUp').modal('hide');
                        // $('#form_signIn').modal('show');
                    }
                }
            })
        }
    }

    function postDataSignIn() {
        let id = $('#signinEmail').val();
        let pass = $('#siginPassword').val();
        // console.log(id+pass);
        if (!checkPass(pass)) {
            showNotice('Mật khẩu không chính xác');
        } else {
            $.ajax({
                type: 'POST',
                url: "./Controller/controller.php",
                data: {
                    act: 'signIn',
                    user: id,
                    password: pass,
                },
                success: function(data) {
                    console.log(data);
                    console.log(JSON.parse(data));
                    showNotice(JSON.parse(data)['notice']);
                    if (JSON.parse(data)['status'] == 'success')
                        setTimeout(() => {
                            if (JSON.parse(data)['cv'] == 'gv') {
                                window.location = "./teacherPage.php";
                            } else if (JSON.parse(data)['cv'] == 'admin') {
                                window.location = "./Admin.php";
                            } else {
                                window.location = "./studentPage.php";
                                console.log("Sinh vien");
                            }

                        }
                        ,2000);
                }
            })
        }

    }

    function reload() {
        window.location.reload();
    }
</script>

</html>