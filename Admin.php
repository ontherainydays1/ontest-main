<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ./');
} else if ($_SESSION['user']['loaiTk'] != 'admin') {
    header('Location: ./');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1f286772f7.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/dde1966e52.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Admin</title>
    <style>
        .active {
            background-color: #198754 !important;
        }

        .nav-pills .nav-link:hover {
            background-color: #198754;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0;
        }
    </style>
    <script>
        window.onload = function() {
            renderAccountTable();
        }

        function renderAccountTable() {
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "renderAccountTable",
                },
                success: function(data) {
                    $('#table').html(JSON.parse(data));
                    $('#activeRadio').html(`<button id="" type="button" class="btn btn-info mx-2" style="height:50%;"  data-bs-toggle="modal" data-bs-target="#form_signUp"><i class="fas fa-plus-circle"></i> Tạo tài khoản</button>
                                            <select id="radio" class="form-select"  style="width: 50%;" aria-label="Default select example" onchange="searchRadio(this)">
                                                <option disabled selected>Lọc tài khoản kích hoạt</option>
                                                <option value="1">Đã kích hoạt</option>
                                                <option value="0">Chưa kích hoạt</option>
                                                <option value="2">Tất cả</option>
                                            </select>
                                            <button id="activeAll" type="button" class="btn btn-success mx-2" style="height:50%;" onclick="activeAll();">Kích hoạt tất cả</button>
                                            <button id="unActiveAll" type="button" class="btn btn-outline-success mx-2" style="height:50%;" onclick="unActiveAll();">Bỏ kích hoạt tất cả</button>`);
                    $('#searchArea').html(`<div class="input-group border-2 border-dark border rounded-pill mt-2 p-2" style="width:75%;">
                                                <i class="fas fa-search fs-4 my-auto mx-2"></i>
                                                <input class="form-control border-0" type="text" placeholder="Search..." id="search" onkeyup="search()">
                                            </div>`);
                    split();
                    slitItemIntoPage(currentPage);
                }
            });
        }

        function renderClassTable() {
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "renderClassTable",
                },
                success: function(data) {
                    $('#table').html(JSON.parse(data));
                    $('#activeRadio').html(`
                                            <button class="btn btn-info" href="#" data-bs-toggle="modal" data-bs-target="#form_createClass" ><i class="fas fa-plus-circle"></i> Tạo lớp</button>`);
                    $('#searchArea').html(`            <div class="input-group border-2 border-dark border rounded-pill mt-2 p-2" style="width:75%;">
                <i class="fas fa-search fs-4 my-auto mx-2"></i>
                <input class="form-control border-0" type="text" placeholder="Search..." id="search" onkeyup="search()">
            </div>`);
                    split();
                    slitItemIntoPage(0);
                }
            });
        }

        function renderQuestionTable() {
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "renderQuestionTable",
                },
                success: function(data) {
                    $('#table').html(JSON.parse(data));
                    $('#activeRadio').html(`
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#form_createQuestion" ><i class="fas fa-plus-circle"></i> Tạo câu hỏi</button>`);
                    $('#searchArea').html(`            <div class="input-group border-2 border-dark border rounded-pill mt-2 p-2" style="width:75%;">
                <i class="fas fa-search fs-4 my-auto mx-2"></i>
                <input class="form-control border-0" type="text" placeholder="Search..." id="search" onkeyup="search()">
            </div>`);
                    split();
                    slitItemIntoPage(0);
                }
            });
        };

        function renderGroupQuestionTable() {
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "renderGroupQuestionTable",
                },
                success: function(data) {
                    $('#table').html(JSON.parse(data));
                    $('#activeRadio').html(`
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#form_createGroupQuestion" ><i class="fas fa-plus-circle"></i> Tạo nhóm câu hỏi</button>`);
                    $('#searchArea').html(`            <div class="input-group border-2 border-dark border rounded-pill mt-2 p-2" style="width:75%;">
                <i class="fas fa-search fs-4 my-auto mx-2"></i>
                <input class="form-control border-0" type="text" placeholder="Search..." id="search" onkeyup="search()">
            </div>`);
                    split();
                    slitItemIntoPage(0);
                }
            });
        };

        function renderReport() {
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "renderReport",
                },
                success: function(data) {
                    $('#table').html(JSON.parse(data));
                    $('#activeRadio').html(`<select id="radio" class="form-select my-5"  style="width: 50%;" aria-label="Default select example" onchange="searchReportRadio(this)">
                                                <option disabled selected>Lọc báo cáo xác thực</option>
                                                <option value="0">Chưa xác thực</option>
                                                <option value="1">Đã xác thực</option>
                                                <option value="2">Tất cả</option>
                                            </select>`);
                    $('#pagesBtn').html('');
                    $('#searchArea').html('');
                }
            });
        };

        function renderReportContent(btn) {
            let idReport = btn.name;
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: 'renderReportContent',
                    idReport: idReport,
                },
                success: function(data) {
                    console.log(data);
                    $('#reportContent').html(JSON.parse(data));
                }
            })
        }

        function renderAnswer() {
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: 'renderAnswer',
                },
                success: function(data) {
                    console.log(data);
                    $('#Modal').html(JSON.parse(data));
                }
            })
        }

        $(document).ready(function() {
            $('#class a').click(function() {
                $('#class').find('a.active').addClass('link-dark');
                $('#class').find('a.active').removeClass('active');
                $(this).addClass('active');
                $(this).removeClass('link-dark');
            });
            $('#pagesBtn').on("click", "a", function(event) {
                $('#pagesBtn').find('a.active').addClass('link-dark');
                $('#pagesBtn').find('a.active').removeClass('active');
                $(this).addClass('active');
                $(this).removeClass('link-dark');
            });
            $('#tabs a').click(function() {
                $('#tabs').find('a.active').addClass('link-dark');
                $('#tabs').find('a.active').removeClass('active');
                $(this).addClass('active');
                $(this).removeClass('link-dark');
            });
            $('#account').click(function() {
                renderAccountTable();
            });
            $('#class').click(function() {
                renderClassTable();
            });
            $('#question').click(function() {
                renderQuestionTable();
                renderAnswer();
            });
            $('#GroupQuestion').click(function() {
                renderGroupQuestionTable();
            });
            $('#report').click(function() {
                renderReport();
            });

            $('#btnLogOut').click(function() {
                $.ajax({
                    type: 'POST',
                    url: "./Controller/controller.php",
                    data: {
                        act: 'logOut'
                    },
                    success: function(data) {}
                })
                window.location = './index.php';

            });
            $('#activeAll').click(function() {
                $.ajax({
                    type: 'POST',
                    url: "./Controller/controller.php",
                    data: {
                        act: 'activeAll'
                    },
                    success: function(data) {
                        renderAccountTable();
                    }
                })
            })
            $('#unActiveAll').click(function() {
                $.ajax({
                    type: 'POST',
                    url: "./Controller/controller.php",
                    data: {
                        act: 'unActiveAll'
                    },
                    success: function(data) {
                        renderAccountTable();
                    }
                })
            })
            $("#btnFormSignUp").click(function(e) {
                postDataSignUp();
            });
            $("#btnCreateClass").click(function() {
                let id = $("#txtIdClass").val().trim();
                let name = $("#txtNameClass").val().trim();
                let info = $("#txtInfoClass").val();
                if (name == '') {
                    showNotice("Vui lòng nhập tên lớp");
                    return;
                }
                console.log(id);
                console.log(name);
                console.log(info);
                $.ajax({
                    type: "POST",
                    url: "./Controller/controller.php",
                    data: {
                        act: "createClass",
                        id: id,
                        name: name,
                        info: info,
                    },
                    success: function(data) {
                        console.log(data);
                        showNotice(JSON.parse(data)['notice']);
                        if (JSON.parse(data)['status'] == 'success') {
                            // window.location.reload();
                            $('#class').click();
                        }
                    }
                })
            });
            $('#btnRandomCode').click(function() {
                $("#txtIdClass").val(gen_Code(8));
            });

            $('#btnCreateGroupQuestion').click(function() {
                let tenNhomCauHoi = $('#tenNhomCauHoi').val();
                if (tenNhomCauHoi == "") {
                    showNotice("Vui lòng nhập tên nhóm câu hỏi");
                    return;
                }
                $.ajax({
                    type: "POST",
                    url: "./Controller/controller.php",
                    data: {
                        act: 'createGroupQuestion',
                        tenNhomCauHoi: tenNhomCauHoi,
                    },
                    success: function(data) {
                        showNotice(JSON.parse(data)['notice']);
                        $('#GroupQuestion').click();
                    }
                })
            })

            //Create question
            $('#btnCreateQuestion').click(function() {
                let noidung = $('#txtQuestion').val();
                let cauA = $('#txtCauA').val();
                let cauB = $('#txtCauB').val();
                let cauC = $('#txtCauC').val();
                let cauD = $('#txtCauD').val();
                let idGroup = $('#sltQuestionGroup').val();
                let dapAn = $('#sltAnswer').val();
                let tenNhom = $('#txtNewGroup').val();
                console.log(noidung);
                console.log(cauA);
                console.log(cauB);
                console.log(cauC);
                console.log(cauD);
                console.log(idGroup);
                console.log(dapAn);
                console.log(tenNhom);
                if (noidung == "") {
                    showNotice("Vui lòng nhập nội dung câu hỏi");
                    return;
                }
                if (cauA == "") {
                    showNotice("Vui lòng nhập nội dung đáp án A");
                    return;
                }

                if (cauB == "") {
                    showNotice("Vui lòng nhập nội dung đáp án B");
                    return;
                }

                if (cauC == "") {
                    showNotice("Vui lòng nhập nội dung đáp án C");
                    return;
                }

                if (cauD == "") {
                    showNotice("Vui lòng nhập nội dung đáp án D");
                    return;
                }
                if (idGroup == null) {
                    showNotice("Vui lòng chọn nhóm câu hỏi");
                    return;
                }
                if (idGroup == "newGroup" && tenNhom == "") {
                    showNotice("Vui lòng nhập tên nhóm muốn tạo");
                    return;
                }

                if (dapAn == null) {
                    showNotice("Vui lòng chọn đáp án");
                    return;
                }
                $.ajax({
                    type: "POST",
                    url: "./Controller/controller.php",
                    data: {
                        act: 'createQuestion',
                        noidung: noidung,
                        cauA: cauA,
                        cauB: cauB,
                        cauC: cauC,
                        cauD: cauD,
                        idGroup: idGroup,
                        tenNhom: tenNhom,
                        dapAn: dapAn,
                    },
                    success: function(data) {
                        showNotice(JSON.parse(data)['notice']);
                        $('#question').click();
                    }
                })
            })
        });
        var CV = "gv";

        function setCV(cv) {
            CV = cv;
        }

        function activeAll() {
            $.ajax({
                type: 'POST',
                url: "./Controller/controller.php",
                data: {
                    act: 'activeAll'
                },
                success: function(data) {
                    renderAccountTable();
                }
            })
        }

        function unActiveAll() {
            $.ajax({
                type: 'POST',
                url: "./Controller/controller.php",
                data: {
                    act: 'unActiveAll'
                },
                success: function(data) {
                    renderAccountTable();
                }
            })
        }

        function active(s) {
            var id = s.name;
            var active = $('input[name="' + s.name + '"]').is(':checked') == true ? 1 : 0;
            $.ajax({
                type: 'POST',
                url: "./Controller/controller.php",
                data: {
                    act: 'active',
                    active: active,
                    id: id,
                },
                success: function(data) {
                    const myTimeout = setTimeout(renderAccountTable, 200);
                }
            })
        }

        function verify(s) {
            var maReport = s.name;
            var active = $('input[name="' + s.name + '"]').is(':checked') == true ? 1 : 0;
            $.ajax({
                type: 'POST',
                url: "./Controller/controller.php",
                data: {
                    act: 'verify',
                    active: active,
                    maReport: maReport,
                },
                success: function(data) {
                    setTimeout(renderReportContent(s), 200);
                    setTimeout(renderReport, 200);
                }
            })
        }

        function clickDelete(btn) {
            var id = btn.getAttribute('name');
            var type = $('#table-type').attr('name');
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "clickDelete",
                    idAdmin: id,
                    typeAdmin: type,
                },
                success: function(data) {
                    var type = document.getElementById('table-type').getAttribute('name');
                    if (type == 'Account_Modal') {
                        renderAccountTable();
                    } else if (type == 'Class_Modal') {
                        renderClassTable();
                    } else if (type == 'Question_Modal') {
                        renderQuestionTable();
                    } else {
                        renderGroupQuestionTable();
                    }
                }
            });
        }

        function editAccount(btn) {
            var password = $('input[name="password' + btn.id + '"]').val();
            var role = $('input[name="role' + btn.id + '"]').val();
            var name = $('input[name="name' + btn.id + '"]').val();
            var birth = $('input[name="birth' + btn.id + '"]').val();
            var phone = $('input[name="phone' + btn.id + '"]').val();
            if (checkAccount(password, phone, role)) {

                $.ajax({
                    type: "POST",
                    url: "./Controller/controller.php",
                    data: {
                        act: "editAccount",
                        id: btn.name,
                        password: password,
                        role: role,
                        name: name,
                        birth: birth,
                        phone: phone,
                    },
                    success: function(data) {
                        renderAccountTable();
                    }
                });
            }
        };

        function editClass(btn) {
            var tenLop = $('input[name="tenLop' + btn.id + '"]').val();
            var thongTin = $('input[name="thongTin' + btn.id + '"]').val();
            var email = $('input[name="email' + btn.id + '"]').val();

            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "editClass",
                    id: btn.name,
                    tenLop: tenLop,
                    thongTin: thongTin,
                    email: email,
                },
                success: function(data) {
                    renderClassTable();
                }
            });
        };

        function editQuestion(btn) {
            var maNhom = $('input[name="maNhom' + btn.id + '"]').val();
            var noiDung = $('input[name="noiDung' + btn.id + '"]').val();
            var dapAn = $('input[name="dapAn' + btn.id + '"]').val().toLowerCase();
            var cauA = $('input[name="cauA' + btn.id + '"]').val();
            var cauB = $('input[name="cauB' + btn.id + '"]').val();
            var cauC = $('input[name="cauC' + btn.id + '"]').val();
            var cauD = $('input[name="cauD' + btn.id + '"]').val();

            if (checkQuestion(dapAn)) {
                $.ajax({
                    type: "POST",
                    url: "./Controller/controller.php",
                    data: {
                        act: "editQuestion",
                        id: btn.name,
                        maNhom: maNhom,
                        noiDung: noiDung,
                        dapAn: dapAn,
                        cauA: cauA,
                        cauB: cauB,
                        cauC: cauC,
                        cauD: cauD,
                    },
                    success: function(data) {
                        renderQuestionTable();
                        renderAnswer();
                    }
                });
            }
        };

        function editGroupQuestion(btn) {
            var tenNhomCauHoi = $('input[name="tenNhomCauHoi' + btn.id + '"]').val();
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "editGroupQuestion",
                    id: btn.name,
                    tenNhomCauHoi: tenNhomCauHoi,
                },
                success: function(data) {
                    renderGroupQuestionTable();
                }
            });
        };

        function search() {
            // tạo biến
            var input, filterByinput, filterByradio, table, tr, td, i, txtValue, col;
            input = document.getElementById("search");
            filterByinput = input.value.toUpperCase();
            table = document.getElementById("table-type");
            tr = table.getElementsByTagName("tr");

            if (filterByinput == '') {
                type = table.getAttribute('name');
                if (type == 'Account_Modal') {
                    renderAccountTable();
                } else if (type == 'Class_Modal') {
                    renderClassTable();
                } else if (type == 'Group_Question_Modal') {
                    renderGroupQuestionTable();
                } else {
                    renderQuestionTable();
                }
            }

            if (table.getAttribute('name') == "Account_Modal") {
                col = 0;
            } else if (table.getAttribute('name') == "Class_Modal" || table.getAttribute('name') == "Group_Question_Modal") {
                col = 1;
            } else {
                col = 2;
            }
            // lọc câu hỏi
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[col];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filterByinput) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function searchRadio(loai) {
            // tạo biến
            var filterByradio, table, tr, td, i, txtValue;

            radio = document.getElementsByName("loaiCauhoi");
            filterByradio = loai.value.toUpperCase();
            table = document.getElementById("table-type");
            tr = table.getElementsByTagName("tr");

            // lọc câu hỏi
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[6];
                if (loai.value == 2) {
                    // tr[i].style.display = "";
                    split();
                    slitItemIntoPage(0);
                    continue;
                }
                if (td) {
                    txtValue = td.childNodes[0].childNodes[0].hasAttribute('checked') == true ? 1 : 0;
                    if (txtValue == loai.value) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function searchReportRadio(loai) {
            // tạo biến
            var filterByradio, table, li, td, i, txtValue;
            filterByradio = loai.value;
            table = document.getElementById("reportUl");
            li = table.getElementsByTagName("li");

            // lọc câu hỏi
            for (i = 0; i < li.length; i++) {
                if (filterByradio == 2) {
                    li[i].style.display = "";
                    continue;
                }
                if (li[i].getAttribute('name') == filterByradio) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }

        const itemPerPage = 10;
        var currentPage = 0;

        function split() {
            var table = document.getElementById("table-type");
            var tr = table.getElementsByTagName("tr");
            var totalItems = tr.length - 1;
            var totalPages = Math.ceil(totalItems / itemPerPage / 2);
            var s = '';
            for (var i = 0; i < totalPages; i++) {
                if (i == 0) {
                    s += '<li class="page-item"><a class="page-link active text-white" onclick="slitItemIntoPage(' + i + ')" href="#">' + (i + 1) + '</a></li>';
                } else {
                    s += '<li class="page-item"><a class="page-link" onclick="slitItemIntoPage(' + i + ')" href="#">' + (i + 1) + '</a></li>';
                }
            }
            $('#pagesBtn').html(s);
        }

        function getTotalItemsForSearch() {
            var table = document.getElementById("table-type");
            var tr = table.getElementsByTagName("tr");
            var totalItems = 0;
            for (var i = 0; i < tr.length; i++) {
                if (tr[i].style.display == "none") {
                    continue;
                }
                totalItems++;
            }
            return totalItems;
        }

        function slitItemIntoPage(page) {
            currentPage = page;
            var table = document.getElementById("table-type");
            var tr = table.getElementsByTagName("tr");
            var totalItems = tr.length;
            var index = (page) * itemPerPage;
            for (var i = 1; i < totalItems; i++) {
                if (i >= index * 2 && i <= (index + itemPerPage) * 2) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
            $('#pagesBtn').find('a.active').removeClass('text-white');
            $('#pagesBtn').find('a.active').removeClass('active');
            var a = document.getElementById('pagesBtn').childNodes[currentPage].childNodes[0];
            a.classList.add("active");
            a.classList.add("text-white");
        }

        function checkQuestion(dapAn) {
            if (!checkAnswer(dapAn) && dapAn.trim() != "") {
                showNotice('Đáp án phải ở định dạng: a (A), b (B), c (C), d (D)');
                return false;
            }
            return true;
        }

        function checkAccount(password, sdt, type) {
            if (!checkSdt(sdt) && sdt.trim() != "") {
                showNotice('Số điện thoại của bạn không đúng định dạng!');
                return false;
            }
            if (!checkPass(password) && password.trim() != "") {
                showNotice('Mật khẩu không được chứa kí tự đặt biệt và phải hơn 8 kí tự');
                return false;
            }
            if (!checkType(type) && type.trim() != "") {
                showNotice('Chức vụ chỉ ở định dạng sau: sv (sinh viên), gv (giảng viên), admin')
                return false;
            }
            return true;
        }

        function checkType(type) {
            return (type == 'sv' || type == 'gv' || type == 'admin');
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

        function check() {
            // return true;
            let emails = $("#inputEmail").val();
            let password = $("#inputPass1").val();
            let password2 = $("#inputPass2").val();
            let sdt = $("#inputSdt").val();
            let ngaysinh = $("#inputDate").val();
            let gioitinh = $("#inputGioitinh").val();
            if (emails.trim() == "" || password.trim() == "" || sdt.trim() == "" || ngaysinh.trim() == "" || gioitinh.trim() == "") {
                showNotice("Vui lòng nhập đầy đủ thông tin");
                return false;
            }
            if (!checkSdt(sdt)) {
                showNotice('Số điện thoại của bạn không đúng định dạng!');
                return false;
            }
            if (!checkEmail(emails)) {
                showNotice('Email của bạn không đúng định dạng!');
                return false;
            }
            if (!checkPass(password)) {
                showNotice('Mật khẩu không được chứa kí tự đặt biệt và phải hơn 8 kí tự');
                return false;
            }
            if (password != password2) {
                showNotice("Mật khẩu không khớp vui lòng nhập lại");
                return false;
            }
            if (!$('#checkCondition').is(':checked')) {
                showNotice("Vui lòng đồng ý với các điều khoản của chúng tôi.")
                return false;
            }
            return true;
        }

        function checkAnswer(dapAn) {
            dapAn = dapAn.toLowerCase();
            return (dapAn == 'a' || dapAn == 'b' || dapAn == 'c' || dapAn == 'd');
        }

        function postDataSignUp() {
            let ten = $("#inputTen").val();
            let emails = $("#inputEmail").val();
            let password = $("#inputPass1").val();
            let password2 = $("#inputPass2").val();
            let sdt = $("#inputSdt").val();
            let ngaysinh = $("#inputDate").val();
            let gioitinh = $("#inputGioitinh").val();
            if (check()) {
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
                    },
                    success: function(data) {
                        showNotice(JSON.parse(data)['notice']);
                        if (JSON.parse(data)['status'] == 'success') {
                            $('#form_signUp').modal('hide');
                            window.location.reload();
                            // $('#form_signIn').modal('show');
                        }
                    }
                })
            }
        }

        function gen_Code(length, special) {
            let iteration = 0;
            let password = "";
            let randomNumber;
            if (special == undefined) {
                var special = false;
            }
            while (iteration < length) {
                randomNumber = (Math.floor((Math.random() * 100)) % 94) + 33;
                if (!special) {
                    if ((randomNumber >= 33) && (randomNumber <= 47)) {
                        continue;
                    }
                    if ((randomNumber >= 58) && (randomNumber <= 64)) {
                        continue;
                    }
                    if ((randomNumber >= 91) && (randomNumber <= 96)) {
                        continue;
                    }
                    if ((randomNumber >= 123) && (randomNumber <= 126)) {
                        continue;
                    }
                }
                iteration++;
                password += String.fromCharCode(randomNumber);
            }
            return password;
        }
    </script>
    <?php
    include "./View/_partial/popup/notice.php";
    include "./View/form/form_create_class.php";
    include "./View/form/form_create_question.php";
    include "./View/form/form_create_group_question.php";
    include './View/form/formSignUp.php';
    ?>
</head>

<body>
    <!-- Header -->
    <?php
    require('./View/_partial/Header_Footer/Header_Footer.php');
    head($admin);
    ?>

    <!-- Side Navigation -->
    <div class="d-flex flex-column fixed-top flex-shrink-0 p-2 overflow-auto" style="height:93%; width: 280px; margin-top: 60.2px; background-color: #82dda5; z-index: 1;">
        <!-- Tính năng -->
        <?php require("./View/_partial/TeacherAndStudent_Component/Sidebar.php");
        Sidebar($admin); ?>
    </div>

    <div style="margin-left: 280px; margin-top: 80px;">
        <!-- Search bar -->
        <div id="searchArea" class="d-flex justify-content-center">
            <div class="input-group border-2 border-dark border rounded-pill mt-2 p-2" style="width:75%;">
                <i class="fas fa-search fs-4 my-auto mx-2"></i>
                <input class="form-control border-0" type="text" placeholder="Search..." id="search" onkeyup="search()">
            </div>
        </div>
        <div id="activeRadio" class="d-flex justify-content-center mt-3">

        </div>
        <div class="container" id="table">

        </div>
        <nav aria-label="Page navigation example">
            <ul id="pagesBtn" class="pagination justify-content-center">

            </ul>
        </nav>
    </div>
    <!-- <div class="modal fade" id="answerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> -->
    <div id = "Modal"></div>
</body>

</html>