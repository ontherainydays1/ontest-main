<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ./');
} else if ($_SESSION['user']['loaiTk'] != 'sv') {
    header('Location: ./');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/1f286772f7.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Học Sinh</title>
    <style>
        .active {
            background-color: #198754 !important;
        }

        .nav-pills .nav-link:hover {
            background-color: #198754;
        }

        .scrollClass {
            height: 70vh;
            overflow-y: auto;
        }

        #dong_ho h2 {
            position: relative;
            display: block;
            color: black;
            text-align: center;
            margin: 10px 0;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.4em;
        }

        #dong_ho #thoi_gian {
            display: flex;

        }

        #dong_ho #thoi_gian div {
            position: relative;
            margin: 0 3px;
        }

        #dong_ho #thoi_gian div span {
            position: relative;
            display: block;
            /* width: 200px;
            height: 160px; */
            padding: 5px;
            background: #2196f3;
            color: #fff;
            font-weight: 300;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 150%;
            z-index: 3;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.2);
        }

        #dong_ho {
            background-color: #82dda5;
            position: fixed;
            padding-left: 50px;
            padding-top: 25px;
            margin-top: -20px;
            z-index: 1;
            width: 280px;
            height: 100vh;
        }
    </style>
    <script>
        function Dong_ho() {
            var gio = document.getElementById("gio");
            var phut = document.getElementById("phut");
            var giay = document.getElementById("giay");
            var Gio_hien_tai = new Date().getHours();
            var Phut_hien_tai = new Date().getMinutes();
            var Giay_hien_tai = new Date().getSeconds();
            gio.innerHTML = Gio_hien_tai;
            phut.innerHTML = Phut_hien_tai;
            giay.innerHTML = Giay_hien_tai;
        }
        var Dem_gio = setInterval(Dong_ho, 1000);
        $(document).ready(function() {
            $("#class").on("click", "a", function(event) {
                $('#class').find('a.active').addClass('link-dark');
                $('#class').find('a.active').removeClass('active');
                $(this).addClass('active');
                $(this).removeClass('link-dark');
                $('#background-content').addClass('d-none');
                $('#main-content').removeClass('d-none');
                $('#tabs').find('a.active').addClass('link-dark');
                $('#tabs').find('a.active').removeClass('active');
                $('#tabs li:first-child a').addClass('active');
                $('#tabs a').removeClass('disabled');
            });
            $('#tabs a').click(function() {
                $('#tabs').find('a.active').addClass('link-dark');
                $('#tabs').find('a.active').removeClass('active');
                $(this).addClass('active');
                $(this).removeClass('link-dark');
            });
            $('#btnLogOut').click(function() {
                $.ajax({
                    type: 'POST',
                    url: "./Controller/controller.php",
                    data: {
                        act: 'logOut'
                    },
                    success: function(data) {
                        console.log(data);
                    }
                })
                window.location = './index.php';

            });
            $('#btnFindClass').click(function() {
                let idClass = $('#txtIdClass').val();
                console.log(idClass);
                $.ajax({
                    type: 'POST',
                    url: "./Controller/controller.php",
                    data: {
                        act: "addStudentToClass",
                        idClass: idClass,
                    },
                    success: function(data) {
                        // console.log(data);
                        showNotice(JSON.parse(data)['notice']);
                        if (JSON.parse(data)['status'] == 'success') {
                            setTimeout(() => {
                                renderListclass();
                                $('.modal').modal('hide');
                            }, 2000);
                        }
                    }
                })
            })
        });

        window.onload = function() {
            $('#main-content').addClass('d-none');
            $('#tabs a').addClass('disabled');
            $('#tabs').find('a.active').removeClass('active');
            renderListclass();
        }

        function renderInfoclass(idClass) {
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "getClass",
                    id: idClass,
                },
                success: function(data) {
                    data = JSON.parse(data);
                    infoClassCurent = data;
                    // console.log(data);
                    $("#nameClass").html(data['tenLop']);
                    $("#infoClass").html(data['ThongTin']);
                    // $("#idClass").html("Mã lớp: " + data['maLop']);
                    // $("#soHs").html(data['soLuong']);
                    $("#idClassCurent").val(data['maLop']);
                    $("#nameTeacher").html(data['hoten']);
                    renderListTest();

                }
            })
        }

        function renderListTest() {
            let idClass = infoClassCurent['maLop'];
            console.log(idClass);
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "renderListTestInStudentPage",
                    idClass: idClass,
                },
                success: function(data) {
                    // console.log(data);
                    $('#title').html("Bài kiểm tra");
                    $('#content_left').removeClass('col-7');
                    $('#content_left').addClass('col-4');
                    $("#content_center").html(JSON.parse(data));
                    $("#content_left").html("");
                }
            })
        }

        function renderListclass() {
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: 'renderListClassOfStudent',
                },
                success: function(data) {
                    $("#class").html(JSON.parse(data));
                    console.log(data);
                }
            });
        }

        function renderInfoTestNoSubmit(maDe, btn) {
            console.log(maDe);
            $('#content_center').find('button.active').removeClass('active');
            $("#maDe" + maDe).addClass('active');
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: 'renderInfoTestNoSubmit',
                    idTest: maDe,
                },
                success: function(data) {
                    // console.log(data);
                    $("#content_left").html(JSON.parse(data));
                }
            })
        }

        function renderInfoTestSubmited(maDe, btn) {
            console.log(maDe);
            $('#content_center').find('button.active').removeClass('active');
            $("#maDe" + maDe).addClass('active');
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: 'renderInfoTestSubmited',
                    idTest: maDe,
                },
                success: function(data) {
                    // console.log(data);
                    $("#content_left").html(JSON.parse(data));
                }
            })
        }

        function takeATest(made) {
            console.log(made);
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: 'takeATest',
                    idTest: made,
                },
                success: function(data) {
                    data = JSON.parse(data);
                    console.log(data);
                    let now = new Date();
                    let thoiGianLamBai = Date.parse(data['infoTest']['ngayThi']);
                    $("#idTest").val(data['infoTest']['maDe']);
                    if (now < thoiGianLamBai) {
                        // $('.modal').modal('hide');
                        showNotice("Chưa tới thời gian làm bài");
                        return;
                    }
                    m = parseInt(data['infoTest']['thoiGianLamBai']) - Math.round((now - thoiGianLamBai) / 60000) + 1;
                    s = 0;
                    if (m <= 0) {
                        // $('.modal').modal('hide');
                        showNotice("Đã quá thời gian làm bài");
                        return;
                    }
                    if(data['infoTest']['loaiDe']=='default')
                    {     
                        // console.log(thoiGianLamBai);
                        $('#phieuLamBai').html(data['html']['baiLam']);
                        $('#deThi').html(data['html']['deThi']);
                        $("#formDoTest").modal('show');
                    }
                    else{
                        $("#formDoTestPDF").modal('show');
                        $("#ifrPDF").attr('src',data['html']['deThi']);
                        $('#phieuLamBaiPDF').html(data['html']['baiLam']);
                    }
                    start();
                }
            })
        }

        function removeStudent() {
            let idClass = infoClassCurent['maLop'];
            console.log(idClass);
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: 'removeStudent',
                    idClass: idClass,
                },
                success: function(data) {
                    // console.log(data);
                    showNotice(JSON.parse(data)['notice']);
                    if (JSON.parse(data)['status'] == 'success') {
                        setTimeout(() => {
                            renderListclass();
                            $('.modal').modal('hide');
                        }, 2000);
                    }
                }

            })
        }

        function submitTestDefault() {
            stop();
            let idTest = $('#idTest').val();
            console.log("Nộp bài" + idTest);
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "getListQuestionInTest",
                    idTest: idTest,
                },
                success: function(data) {
                    data = JSON.parse(data);
                    // console.log(data.length);
                    // console.log(listQuestion.length);
                    let listAnswer = getAnswer(data);
                    console.log(listAnswer);
                    chamBai(listAnswer, idTest);
                }
            })

            // setTimeout(() =>{
            //     window.location.reload();
            // },1000);
        }

        function submitTestPDF() {
            stop();
            let idTest = $('#idTest').val();
            console.log("Nộp bài" + idTest);
            var listAnswer = $("select[name='test']")
            .map(function() {
                return $(this).val();
            }).get();
            chamBai(listAnswer, idTest);
        }

        function chamBai(listAnswer, idTest) {
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "chamBai",
                    listAnswer: JSON.stringify(listAnswer),
                    idTest: idTest,
                },
                success: function(data) {
                    console.log(data);
                    $(".modal").modal('hide');
                    showNotice("Nộp bài thành công");
                    renderListTest();
                }

            })
        }

        function getAnswer(listQuestion) {
            let listAnswer = [];
            console.log(listQuestion.length);
            for (let i = 0; i < listQuestion.length; i++) {
                let luaChon = $('input[name="' + listQuestion[i]['maCau'] + '"]:checked').val();
                if ($('input[name="' + listQuestion[i]['maCau'] + '"]:checked').val() == null) {
                    luaChon = "";
                }
                listAnswer.push({
                    maCau: listQuestion[i]['maCau'],
                    luaChon: luaChon,
                });
            }
            return listAnswer;
        }

        function checkTheBox(name) {
            console.log(name);
            // bắt id của checkbox rùi check
            $("#" + name + "").prop("checked", true);
        }

        var h = 0; // Giờ
        var m = 1; // Phút
        var s = 0; // Giây

        var timeout = null; // Timeout

        function start() {
            /*BƯỚC 1: LẤY GIÁ TRỊ BAN ĐẦU*/

            /*BƯỚC 1: CHUYỂN ĐỔI DỮ LIỆU*/
            // Nếu số giây = -1 tức là đã chạy ngược hết số giây, lúc này:
            //  - giảm số phút xuống 1 đơn vị
            //  - thiết lập số giây lại 59
            if (s === -1) {
                m -= 1;
                s = 59;
            }

            // Nếu số phút = -1 tức là đã chạy ngược hết số phút, lúc này:
            //  - giảm số giờ xuống 1 đơn vị
            //  - thiết lập số phút lại 59
            if (m === -1) {
                h -= 1;
                m = 59;
            }

            // Nếu số giờ = -1 tức là đã hết giờ, lúc này:
            //  - Dừng chương trình
            if (h == -1) {
                clearTimeout(timeout);
                alert('Hết giờ');
                submitTest();
                return false;
            }

            /*BƯỚC 1: HIỂN THỊ ĐỒNG HỒ*/
            // document.getElementById('h').innerText = h.toString();
            document.getElementById('m1').innerText = m.toString();
            document.getElementById('s1').innerText = s.toString();
            
            document.getElementById('m2').innerText = m.toString();
            document.getElementById('s2').innerText = s.toString();

            /*BƯỚC 1: GIẢM PHÚT XUỐNG 1 GIÂY VÀ GỌI LẠI SAU 1 GIÂY */
            timeout = setTimeout(function() {
                s--;
                start();
            }, 1000);
        }

        function stop() {
            clearTimeout(timeout);
        }

        function submitTest(){
            let idTest = $('#idTest').val();
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: 'getTest',
                    idTest: idTest,
                },
                success: function(data) {
                    // console.log(JSON.parse(data));
                    let infoTest= JSON.parse(data);
                    if(infoTest['loaiDe']=='default'){
                        console.log('submit default');
                        submitTestDefault();
                    }else{
                        console.log('submit PDF');
                        submitTestPDF();
                    }
                }
            })
        }

        function renderAnnounment() {
            let idClass = infoClassCurent['maLop'];
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: 'renderStudentAnnounment',
                    idClass: idClass,
                },
                success: function(data) {
                    // console.log(data);
                    $('#title').html("Thông Báo");
                    $('#content_center').html(JSON.parse(data));
                    $('#content_left').removeClass('col-4');
                    $('#content_left').addClass('col-7');
                    $('#content_left').html("");
                }
            })
        }
        function renderAnnoucementContent(btn) {
            let idAnnouncement = btn.name;
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: 'renderAnnoucementContent',
                    idAnnouncement: idAnnouncement,
                },
                success: function(data) {
                    // console.log(data);
                    $('#content_left').html(JSON.parse(data));
                }
            })
        }
    </script>
</head>

<body>
    <!-- Header -->
    <?php
    include "./View/_partial/Header_Footer/Header_Footer.php";
    head($studentPage);
    include "./View/form/form_find_class.php";
    include "./View/_partial/popup/notice.php";
    include "./View/TrangLamBai/pageBailam.php";
    include "./View/TrangLamBai/pageBailamPDF.php";

    ?>

    <!-- Sidebar -->

    <div id="dong_ho">
        <div id="thoi_gian">
            <div>
                <span id="gio">00</span><span>Giờ</span>
            </div>
            <div>
                <span id="phut">00</span><span>Phút</span>
            </div>
            <div>
                <span id="giay">00</span><span>Giây</span>
            </div>
        </div>
    </div>
    <div class="fixed-top flex-shrink-0 p-2 overflow-auto" style="height:93%; width: 280px; margin-top: 200px; background-color: #82dda5; z-index: 1;">
        <!-- Tính năng -->
        <?php require("./View/_partial/TeacherAndStudent_Component/Sidebar.php");
        Sidebar($studentPage); ?>
        <!-- Danh sách lớp -->
        <span class="fs-3 fw-bold">Danh sách lớp</span>
        <ul id="class" class="nav nav-pills flex-column border-top border-dark pt-2">
            <!-- inner danh sách lớp -->

        </ul>
    </div>


    <!-- Content -->

    <div id="background-content" style="margin-left: 280px; margin-top: 80px;">
        <div class="container d-flex justify-content-center">
            <img src="./Assets/img/background-student.jpg" alt="background-student" style="width: 70%;">
        </div>
    </div>

    <div id="main-content" style="margin-left: 280px; margin-top: 80px;">
        <div class="row gap-2" style="margin-left: 0; margin-right: 0;">
            <div class="col-sm-0 mt-2 px-5">
                <div class="col py-3">

                    <div class="row px-3">
                        <div class="card py-2">
                            <div class="col-md align-self-start">
                                <h4 id="nameClass"></h4>
                                <h4 class="ps-3">Mô tả:</h4>
                                <!-- p for chú thích -->
                                <p class="ps-5" id="infoClass"></p>
                            </div>
                            <div class="row px-3">

                                <div class="col">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle mb-2" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg>
                                    <h4 style="display:inline-block;">Giáo viên:</h4>
                                    <!-- thẻ p cho tên giáo viên -->
                                    <h3 id="nameTeacher">
                                        </h1>
                                </div>
                                <div class="col ">
                                    <button type="button" class="btn btn-warning text-dark fw-bold" onclick="removeStudent()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                        </svg>
                                        Rời lớp
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="body" class="row px-3 mt-5">
                        <div class="card py-2 ">
                            <div class="row px-2 ">
                                <div class="col text-center">
                                    <p class=" fs-5 fw-bold" id="title" >Bài kiểm tra</p>

                                    <div class="list-group px-5" style="max-height:55vh; overflow-y: auto" id="content_center">
                                        <button type="button" id="maDe111" class="list-group-item list-group-item-action active row d-flex justify-content-between" aria-current="true" onclick="renderInfoTest(111,this)">
                                            <div class="col">Bài kiểm tra giữa kì 23/4/2022</div>
                                            <div class="col">Chưa làm</div>
                                        </button>
                                        <hr>
                                        <button type="button" id="maDe222" class="list-group-item list-group-item-action  row d-flex justify-content-between" aria-current="true" onclick="renderInfoTest(222,this)">
                                            <div class="col">Bài kiểm tra giữa kì 23/4/2022</div>
                                            <div class="col">Chưa làm</div>
                                        </button>
                                        <hr>
                                    </div>
                                </div>
                                <div class="col-4 py-3" id="content_left">
                                    <p class="text-center fs-5 fw-bold">Bài kiểm tra giữa kì:</p>
                                    <div class="">
                                        <p class="">Ngày làm bài:</p>
                                        <p class="">Thời gian làm bài:</p>
                                        <hr>
                                        <div class="text-center">
                                            <p>Điểm: </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="card py-2">
                <div class="row px-3">
                    <div class="col-4 text-center">
                        <p class="fs-5 bold">Thông Báo</p>
                        <div class="list-group px-5">
                            <button type="button" class="list-group-item list-group-item-action row d-flex justify-content-between active" aria-current="true">
                                <div class="col">Báo 1</div>
                                <div class="col">Thời gian</div>
                            </button>
                            <hr>
                        </div>
                    </div>
                    <div class="col-8 border py-3">
                        <p class="text-center fs-5 fw-bold">Báo 1</p>
                        <div>
                            <p>Nội dung:</p>
                            <hr>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</body>

</html>