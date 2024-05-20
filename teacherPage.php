<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ./');
} else if ($_SESSION['user']['loaiTk'] != 'gv') {
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
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <title>Giảng Viên</title>
    <style>
        .active {
            background-color: #198754 !important;
        }

        .nav-pills .nav-link:hover {
            background-color: #198754;
        }

        .scrollClass {
            height: 42vh;
            overflow-y: auto;
        }


        table thead,
        table tfoot {
            position: sticky;
        }

        table thead {
            inset-block-start: 0;
            /* "top" */
        }

        table tfoot {
            inset-block-end: 0;
            /* "bottom" */
        }
    </style>
    <script>
        var idTest;
        window.onload = function() {

            renderContainerbankquestion();
            // renderBankQuestion();

            // set time default for form create Test
            const now = new Date();
            now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
            document.getElementById('ngayThi').value = now.toISOString().slice(0, -8);

        };

        $(document).ready(function() {
            $("#class").on("click", "a", function(event) {
                $('#class').find('a.active').addClass('link-dark');
                $('#class').find('a.active').removeClass('active');
                $(this).addClass('active');
                $(this).removeClass('link-dark');
            });
            $('#tabs a').click(function() {
                $('#tabs').find('a.active').addClass('link-dark');
                $('#tabs').find('a.active').removeClass('active');
                $(this).addClass('active');
                $(this).removeClass('link-dark');
            });
            $('#btnRandomCode').click(function() {
                $("#txtIdClass").val(gen_Code(8));
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
                            setTimeout(() => {
                                // window.location.reload();
                                $('.modal').modal('hide');
                                renderListclass();
                            }, 2000);

                        }
                    }
                })
            });
            $("#bankQuestion").click(function() {
                renderContainerbankquestion();
            });
            $("#btnRenderMember").click(function() {
                renderMember();
            });
            $('#btnCreateTest').click(function() {
                createTest();
            });
            $('#btnSaveQuestionInTest').click(function() {
                if (idTest == null) {
                    idTest = $('#idTestcurent').val();
                }
                console.log(idTest);
                $.ajax({
                    type: "POST",
                    url: "./Controller/controller.php",
                    data: {
                        act: "saveQuestionInTest",
                        arrQuestion: JSON.stringify(questionArr),
                        loaiDe: "default",
                        // arrQuestion: arrQuestion,
                        idTest: idTest,
                    },
                    success: function(data) {
                        console.log(JSON.parse(data));
                        showNotice(JSON.parse(data)['notice']);
                        setTimeout(() => {
                            $('.modal').modal('hide');
                            renderListTest();
                        }, 1000);
                    }
                })
            });
            $('#btnTongQuan').click(function() {
                renderContainerInfoClass();
                renderListTest();

            })
            $('#btnCreateQuestion').click(function() {
                createQuestion();
            })
            $('#btnAddstudent').click(function() {
                addListStudent();
            })
            $('#btnCreatenotice').click(function() {
                createNotice();
            })
            $('#btnAltertest').click(function() {
                alterInfoTest();
            })
            $('#btnRenderAnnounment').click(function() {
                renderAnnounment();
            })
            $('#btnSummitreport').click(function() {
                summitReport();
            })
            $('#form_uploadFile').submit(function(e) {
                e.preventDefault();
                var form = document.getElementById('form_uploadFile');
                var fdata = new FormData(form);
                console.log(fdata);
                $.ajax({
                    type: "POST",
                    url: './Controller/upload.php',
                    data: fdata,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(result) {
                        console.log(result);
                        if (result == "success") {
                            showNotice("Tạo đề thành công");
                            setTimeout(() => {
                                $('.modal').modal('hide');
                                renderListTest();
                            }, 1000);
                        } else {
                            showNotice("Tạo đề không thành công </br> Lưu ý: Chỉ được tải file dạng pdf");
                        }
                    }
                });
            });
        });

        async function createTest() {
            let thoiGianLamBai = $('#thoiGianLamBai').val();
            let ngayThi = $('#ngayThi').val();
            let daoCauHoi = $('input[name="daoCauHoi"]:checked').val();
            let loaiDe = $('input[name="loaiDe"]:checked').val();
            let idClass = $("#idClassCurent").val();
            if (idClass == null) {
                idClass = infoClassCurent['maLop'];
            }
            let nameTest = $('#txtNameTest').val();
            if (nameTest.trim() == "") {
                showNotice("Vui lòng nhập tên bài kiểm tra");
                return;
            }
            console.log(nameTest);
            console.log(thoiGianLamBai);
            console.log(ngayThi);
            console.log(daoCauHoi);
            console.log(idClass);
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: 'createTest',
                    thoiGianLamBai: thoiGianLamBai,
                    nameTest: nameTest,
                    ngayThi: ngayThi,
                    daoCauHoi: daoCauHoi,
                    idClass: idClass,
                    loaiDe: loaiDe,
                },
                success: function(data) {
                    console.log(data);
                    idTest = JSON.parse(data)['maDe'];
                    console.log(idTest);
                    showNotice(JSON.parse(data)['notice']);
                    setTimeout(() => {
                        $('.modal').modal('hide');
                        showSettingTest(JSON.parse(data)['maDe'], loaiDe);
                    }, 1000);
                },
            })
        }

        var count = 0;
        // var questnum =document.getElementById('socauhoi').value;
        // console.log(questnum);
        // cập nhật số câu hỏi
        function capnhatCauhoi() {

            // count = document.getElementsByClassName("card h-100").length;
            var values = $(".cardQuestion")
                .map(function() {
                    return $(this).val();
                }).get();
            count = document.getElementById("soCauhoi").value;
            console.log(count);
            let html = '';
            for (let i = 1; i <= count; i++) {
                var socau = i;
                html += addCard(socau, values[i - 1]);
                // console.log( addCard(socau,values[i-1]));
            }
            document.getElementById('containerCardQuestion').innerHTML = html;
            count--;
        }


        // hàm này chèn thẻ vào trước nút thêm câu hỏi
        // chưa thiết kế id hay name cho câu hỏi để đẩy dữ liệu
        function addCard(socau, value) {
            function checkUndefined() {
                return value == undefined ? `selected` : ``;
            }

            function checkA() {
                return value == 'A' ? `selected` : ``;
            }

            function checkB() {
                return value == 'B' ? `selected` : ``;
            }

            function checkC() {
                return value == 'C' ? `selected` : ``;
            }

            function checkD() {
                return value == 'D' ? `selected` : ``;
            }
            var card =
                `<div name="cauhoi" class="col cardcauhoi">
                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="card-title">Câu ` + socau + `</h5>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="">Đáp án</label>
                                <select class="form-select cardQuestion" id="">
                                    <option value="" ` + checkUndefined() + ` hidden>Chọn</option>
                                    <option value="A"` + checkA() + `>A</option>
                                    <option value="B"` + checkB() + `>B</option>
                                    <option value="C"` + checkC() + `>C</option>
                                    <option value="D"` + checkD() + `>D</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>`;
            // <input type="text"  class='form-control cardQuestion'>

            // $(card).insertBefore("#buttonAddCard");
            return card;
        }
        // xóa thẻ
        function xoaCard() {
            // console.log(socau);
            const elmnt = document.getElementsByClassName("col cardcauhoi")[count--];
            elmnt.remove();
        }

        function createTestPDF() {
            let idTest = $('#idTest_form_createDetailTest_PDF').val();
            // console.log("Nộp bài" + idTest);
            var values = $(".cardQuestion")
                .map(function() {
                    return $(this).val();
                }).get();
            // console.log(values,idTest);
            $('#form_uploadFile').submit();
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "saveQuestionInTest",
                    arrQuestion: JSON.stringify(values),
                    loaiDe: "PDF",
                    idTest: idTest,
                },
                success: function(data) {
                    console.log(data);
                    // showNotice(JSON.parse(data)['notice']);
                    // setTimeout(() => {
                    //     $('.modal').modal('hide');
                    //     renderListTest();
                    // }, 1000);
                }
            })
        }

        function summitReport() {
            let title = $("#txtTitlereport").val();
            let noiDung = $("#txtReport").val();
            if (title.trim() == "") {
                showNotice("Vui lòng nhập tiêu đề");
                $("#txtTitlereport").focus();
                return;
            }
            if (noiDung.trim() == "") {
                showNotice("Vui lòng nhập nội dung");
                $("#txtReport").focus();
                return;
            }
            console.log(title, noiDung);
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "createReport",
                    title: title.trim(),
                    noiDung: noiDung.trim(),
                },
                success: function(data) {
                    console.log(data);
                    showNotice(JSON.parse(data)['notice']);
                    if (JSON.parse(data)['status'] == 'success') {
                        $("#txtTitlereport").val("");
                        $("#txtReport").val("");
                    }
                }
            })
        }

        function createNotice() {
            let title = $('#txtTitle').val().trim();
            if (title === "") {
                showNotice("Vui lòng nhập tiêu đề");
                return;
            }
            let notice = $('#txtNotice').val();
            let idClass = $("#idClassCurent").val();
            if (idClass == null) {
                idClass = infoClassCurent['maLop'];
            }
            console.log(idClass);
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "createNotice",
                    title: title,
                    notice: notice,
                    idClass: idClass,
                },
                success: function(data) {
                    console.log(data);
                    showNotice(JSON.parse(data)['notice']);
                    $('.modal').modal('hide');
                    renderAnnounment();
                }
            })
        }

        function renderAnnounment() {
            let idClass = $("#idClassCurent").val();
            if (idClass == null) {
                idClass = infoClassCurent['maLop'];
            }
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "renderAnnounment",
                    idClass: idClass,
                },
                success: function(data) {
                    // console.log(data);
                    $('#container').html(JSON.parse(data));
                }
            });
        }

        function editAnnouncement(btn) {
            var tieuDe = $('input[name="tieuDe' + btn.id + '"]').val();
            var noiDung = $('textarea[name="noiDung' + btn.id + '"]').val();
            var thoiGian = $('input[name="thoiGian' + btn.id + '"]').val();

            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "editAnnouncement",
                    id: btn.name,
                    tieuDe: tieuDe,
                    noiDung: noiDung,
                    thoiGian: thoiGian,
                },
                success: function(data) {
                    renderAnnounment();
                }
            });
        };

        function deleteAnnouncement(btn) {
            if (!confirm('Bạn có chắc muốn xóa thông báo này'))
                return;
            var id = btn.getAttribute('name');
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "deleteAnnouncement",
                    id: id,
                },
                success: function(data) {
                    renderAnnounment();
                }
            });
        }

        function addListStudent() {
            let listId = $("#txtListstudent").val();
            let sep = /\r\n|\n/;
            let arrayId = listId.split(sep);
            let idClass = $("#idClassCurent").val();
            if (idClass == null) {
                idClass = infoClassCurent['maLop'];
            }
            console.log(arrayId);
            console.log(idClass);
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "addListstudenttoclass",
                    arrayStudentId: JSON.stringify(arrayId),
                    idClass: idClass,
                },
                success: function(data) {
                    console.log(data);
                    showNotice(JSON.parse(data)['notice']);
                    renderInfoclass(idClass);
                }
            })
        }

        function createQuestion() {
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
                    console.log(data);
                    showNotice(JSON.parse(data)['notice']);
                    renderBankQuestion();
                    if (JSON.parse(data)['status'] == 'success') {
                        $('#txtQuestion').val("");
                        $('#txtCauA').val("");
                        $('#txtCauB').val("");
                        $('#txtCauC').val("");
                        $('#txtCauD').val("");
                        $('#inputNameGroup').css('display', 'none');
                    }
                }
            })
        }

        function renderMember() {
            studentArr_detele = [];
            renderContainerInfoClass();
            let idClass = $("#idClassCurent").val();
            if (idClass == null) {
                idClass = infoClassCurent['maLop'];
            }
            if (idClass == "")
                return;

            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: 'renderMember',
                    idClass: idClass,
                },
                success: function(data) {
                    // console.log(data);
                    // console.log(JSON.parse(data));
                    $("#content").html(JSON.parse(data));
                    $("#right_content").html("");
                }
            });
        }

        function deleteClass() {
            if (!confirm('Bạn có chắc muốn xóa lớp này'))
                return;
            let idClass = $("#idClassCurent").val();
            if (idClass == null) {
                idClass = infoClassCurent['maLop'];
            }
            console.log(idClass);
            if (idClass == "")
                return;
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: 'deleteClass',
                    idClass: idClass
                },
                success: function(data) {
                    console.log(idClass);
                    console.log(data);
                    showNotice(JSON.parse(data)['notice']);
                    if (JSON.parse(data)['status'] == 'success') {
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    }
                }
            });
        }

        function renderContainerbankquestion() {
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "renderContainerbankquestion",
                },
                success: function(data) {
                    // console.log(data);
                    $('#container').html(JSON.parse(data));
                }
            });
            renderBankQuestion();
            renderListclass();
            $('#tabs').find('a.menuClass').addClass('disabled');
        }

        function renderBankQuestion() {
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "renderBankQuestion",
                },
                success: function(data) {
                    // console.log(data);
                    // console.log(JSON.parse(data)['question']);
                    $('#bangCauHoi').html(JSON.parse(data)['question']);
                    $('#sltGroupQuestion').html(JSON.parse(data)['groupQuestion']);
                }
            });
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "renderSltGroupQuestion",
                },
                success: function(data) {
                    // console.log(data);
                    $('#sltQuestionGroup').html(JSON.parse(data));
                }

            });
        }



        function renderInfoTest(idTest) {
            console.log(idTest);
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    idTest: idTest,
                    act: "renderInfoTest",
                },
                success: function(data) {
                    // console.log(data);
                    $('#right_content').html(JSON.parse(data));
                }

            })
        }

        function renderSettingTest_default() {
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: 'renderQuestionInSettingTest',
                },
                success: function(data) {
                    // console.log(data);
                    $('#listQuestioninfrom').html(JSON.parse(data)['question']);
                    $('#sltGroupQuestionInFormCreateTest').html(JSON.parse(data)['groupQuestion']);
                    for (var i = 0; i < questionArr.length; i++) {
                        $('#' + questionArr[i]).attr('checked', 'checked');

                    }
                }
            })
        }

        function renderSettingTest_PDF(){
            let html='';
            for (var i = 0; i < questionArr.length; i++) {
                html+= addCard(i+1, questionArr[i]);
            }
            $('#soCauhoi').val(questionArr.length);
            document.getElementById('containerCardQuestion').innerHTML = html;
        }

        function renderListTest() {
            let idClass = $("#idClassCurent").val();
            if (idClass == null) {
                idClass = infoClassCurent['maLop'];
            }
            console.log(idClass);
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "renderListTest",
                    idClass: idClass,

                },
                success: function(data) {
                    // console.log(data);
                    $('#content').html(JSON.parse(data));
                    $("#right_content").html("  ");
                }
            })
        }

        function renderListclass() {
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: 'renderListClass',
                },
                success: function(data) {
                    $("#class").html(JSON.parse(data));
                    // console.log(data);
                }
            });
        }

        function deleteTest(idTest) {
            if (!confirm('Bạn có chắc muốn xóa đề thi này'))
                return;
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: 'deleteTest',
                    idTest: idTest
                },
                success: function(data) {
                    // console.log(idClass);
                    // console.log(data);
                    showNotice(JSON.parse(data)['notice']);
                    if (JSON.parse(data)['status'] == 'success') {
                        setTimeout(() => {
                            renderListTest();
                            $('.modal').modal('hide');
                        }, 2000);
                    }
                }
            });
        }

        function showSettingTest(idTest, loaiDe) {
            questionArr = [];
            if (loaiDe == 'default') {
                renderSettingTest_default();
                $('#form_createDetailTest_default').modal('show');
            } else {
                // renderSettingTest_default();
                $('#form_createDetailTest_PDF').modal('show');
                $('#idTest_form_createDetailTest_PDF').val(idTest);
                $('#soCauhoi').val(1);
                capnhatCauhoi();
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

        var infoClassCurent;

        function renderInfoclass(idClass) {
            $('#tabs').find('a.menuClass').removeClass('disabled');
            $('#tabs').find('a.active').addClass('link-dark');
            $('#tabs').find('a.active').removeClass('active');
            $('a[name="tongQuan"]').addClass('active');
            $('a[name="tongQuan"]').removeClass('link-dark');
            // $('#class').find('a.active').removeClass('active');
            // $('#class a').removeClass('link-dark');

            renderContainerInfoClass();
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "getClassforteacher",
                    id: idClass,
                },
                success: function(data) {
                    data = JSON.parse(data);
                    console.log(data);
                    infoClassCurent = data;
                    $("#nameClass").html(data['tenLop']);
                    $("#infoClass").html(data['ThongTin']);
                    $("#idClass").html("Mã lớp: " + data['0']);
                    $("#soHs").html(data['soLuong']);
                    $("#idClassCurent").val(data['0']);
                    console.log($('#idClassCurent').val());
                    // console.log(data["soLuongbaikt"]);
                    $("#soBaikt").html(data["soLuongbaikt"]);
                    renderListTest();
                }
            })
        }

        function renderContainerInfoClass() {
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "renderContainerInfoClass",
                },
                success: function(data) {
                    // console.log(data);
                    $('#container').html(JSON.parse(data));
                    if (infoClassCurent != null) {
                        $("#nameClass").html(infoClassCurent['tenLop']);
                        $("#infoClass").html(infoClassCurent['ThongTin']);
                        $("#idClass").html("Mã lớp: " + infoClassCurent['0']);
                        $("#soHs").html(infoClassCurent['soLuong']);
                        $("#idClassCurent").val(infoClassCurent['0']);
                        console.log($('#idClassCurent').val());
                        // console.log(data["soLuongbaikt"]);
                        $("#soBaikt").html(infoClassCurent["soLuongbaikt"]);
                    }
                }
            })
        }

        function timCauhoi() {
            // tạo biến
            var input, filterByinput, filterByradio, table, tr, td, i, txtValue;
            input = document.getElementById("searchCauhoi");
            radio = document.getElementsByName("loaiCauhoi");
            filterByinput = input.value.toUpperCase();
            filterByradio = radio.value;
            console.log(filterByinput);
            table = document.getElementById("bangCauHoi");
            tr = table.getElementsByTagName("tr");

            // lọc câu hỏi
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
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

        function timCauhoiRadio(loai) {
            console.log(loai.value);

            // tạo biến
            var filterByradio, table, tr, td, i, txtValue;

            radio = document.getElementsByName("loaiCauhoi");
            filterByradio = loai.value.toUpperCase();
            table = document.getElementById("bangCauHoi");
            tr = table.getElementsByTagName("tr");

            // lọc câu hỏi
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filterByradio) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function deleteStudent(idStudent) {
            if (!confirm('Bạn có chắc muốn xóa học sinh này'))
                return;
            let idClass = $("#idClassCurent").val();
            if (idClass == null) {
                idClass = infoClassCurent['maLop'];
            }
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "removeStudentsfromclass",
                    mail: idStudent,
                    idClass: idClass,
                },
                success: function(data) {
                    console.log(data);
                    showNotice(JSON.parse(data)['notice']);
                    renderMember();
                }
            })
        }

        function showTest(idTest) {
            //  console.log(idTest);
            let idClass = $("#idClassCurent").val();
            if (idClass == null) {
                idClass = infoClassCurent['maLop'];
            }
            $('#idTestcurent').val(idTest);
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "showTestscores",
                    idTest: idTest,
                    idClass: idClass,
                },
                success: function(data) {
                    // console.log(data);
                    $('#listTestscores').html(JSON.parse(data));
                    $('#formShowtestscores').modal('show');
                }
            })
        }

        function showDetails(idStudent, idTest, diem) {
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "showDetailstestscores",
                    idTest: idTest,
                    idStudent: idStudent,
                },
                success: function(data) {
                    console.log(data);
                    console.log(JSON.parse(data));
                    $('#chiTietbailam').html(JSON.parse(data)['html']);
                    $('#soCaudung_formDetails').html(JSON.parse(data)['soCaudung']);
                    $('#soCausai_formDetails').html(JSON.parse(data)['soCausai']);
                    $('#soCauchualam_formDetails').html(JSON.parse(data)['soCauchualam']);
                    $('#diem_formDetails').html(diem);
                    $('#formShowtestscores').modal('hide');
                    $('#formShowdetailstestscores').modal('show');
                }
            })
        }

        function cancelShowdetails() {
            $('#formShowdetailstestscores').modal('hide');
            $('#formShowtestscores').modal('show');
        }

        function showFormaltertest() {
            let idTest = $('#idTestcurent').val();
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "getTest",
                    idTest: idTest,
                },
                success: function(data) {
                    console.log(data);
                    let infoTest = JSON.parse(data);
                    $('#txtNameTest_alter').val(infoTest['tenDe']);
                    $('#thoiGianLamBai_alter').val(infoTest['thoiGianLamBai']);
                    let now = new Date();
                    let thoiGianLamBai = Date.parse(infoTest['ngayThi']);
                    if (now > thoiGianLamBai) {
                        // $('.modal').modal('hide');
                        showNotice("Không thể thay đổi do đã qua thời gian làm bài");
                        $('#form_alterTest').modal('hide');
                        $('#formShowtestscores').modal('show');
                        return;
                    }
                    console.log(infoTest['ngayThi']);
                    if(infoTest['loaiDe']=="pdf"){
                        $('#inputSuf_formAlterTest').addClass('d-none');
                        $('input[name=loaiDe_alter][value="pdf"]').prop("checked", true);
                    }
                    else{
                        $('input[name=loaiDe_alter][value="default"]').prop("checked", true);
                        $('#inputSuf_formAlterTest').removeClass('d-none');
                    }
                    const offset = new Date().getTimezoneOffset() * 1000 * 60
                    const offsetDate = new Date(infoTest['ngayThi']).valueOf() - offset;
                    const date = new Date(offsetDate).toISOString().slice(0, -1);
                    $('input[name=daoCauHoi_alter][value=' + infoTest['daoCauHoi'] + ']').prop("checked", true);
                    $('#ngayThi_alter').val(date);
                }
            })
        }

        function alterInfoTest() {
            let idTest = $('#idTestcurent').val();
            let nameTest = $('#txtNameTest_alter').val();
            let thoiGianlambai = $('#thoiGianLamBai_alter').val();
            let daoCauHoi = $('input[name="daoCauHoi_alter"]:checked').val();
            let ngayThi = $('#ngayThi_alter').val();
            let loaiDe = $('input[name="loaiDe_alter"]:checked').val();
            if (nameTest.trim() == "") {
                showNotice("Vui lòng nhập tên bài kiểm tra");
                return;
            }
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "alterInfoTest",
                    idTest: idTest,
                    nameTest: nameTest,
                    thoiGianlambai: thoiGianlambai,
                    daoCauHoi: daoCauHoi,
                    ngayThi: ngayThi,
                    loaiDe: loaiDe,
                },
                success: function(data) {
                    console.log(data);
                    // console.log(JSON.parse(data));
                    renderListTest();
                    console.log("Loai de",loaiDe);
                    questionArr = JSON.parse(data);
                    if(loaiDe=="default"){
                        renderSettingTest_default();
                        $('.modal').modal('hide');
                        $('#form_createDetailTest_default').modal('show');
                    }
                    else{
                        $('.modal').modal('hide');
                        renderSettingTest_PDF();
                        $('#form_createDetailTest_PDF').modal('show');
                    }
                }

            })
        }

        async function exportToExcel2(fileName, sheetName, myData, idTest) {
            if (myData.length === 0) {
                console.error('Chưa có data');
                return;
            }
            let wb;
            const ws = XLSX.utils.json_to_sheet(myData);
            // console.log('ws', ws);
            wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, sheetName);
            console.log('exportToExcel', myData);
            if (idTest != null) {
                console.log("idTest", idTest);
                await $.ajax({
                    type: "POST",
                    url: "./Controller/controller.php",
                    data: {
                        act: "getDetialtest",
                        idTest: idTest,

                    },
                    success: function(data) {
                        console.log(data);
                        let deThi
                        if(JSON.parse(data)['loaiDe']=='default'){
                            deThi = JSON.parse(data)['data'].map((d) => {
                                return {
                                    "Mã câu hỏi": d.maCau,
                                    "Nội dung câu hỏi": d.noiDungcauhoi,
                                    "Đáp án": d.dapAn,
                                    "Nội dung đáp án": d.noiDungluachon,
                                };
                            });
                        }
                        else{
                            deThi = JSON.parse(data)['data'].map((d) => {
                                return {
                                    "Mã câu hỏi": d.maCau,
                                    "Đáp án": d.dapAn,
                                };
                            });
                        }
                        const wsDethi = XLSX.utils.json_to_sheet(deThi);
                        XLSX.utils.book_append_sheet(wb, wsDethi, "Chi tiết đề thi");
                    }

                })
                // Chưa xuất danh sách làm bài đè thi pdf
                for (i = 0; i < myData.length; i++) {
                    if (myData[i].Điểm != "Chưa làm") {
                        email = myData[i].Email;
                        await $.ajax({
                            type: "POST",
                            url: "./Controller/controller.php",
                            data: {
                                act: "getDetailstestscores",
                                Email: email,
                                idTest: idTest,
                            },
                            success: function(data) {
                                // console.log(data);
                                data = JSON.parse(data);
                                console.log("getDetailstestscores", data);

                                let detailsTestscores = Object.keys(data).map((key) => [String(key), data[key]]);
                                console.log("detailsTestscores", detailsTestscores);
                                let wsTmp = XLSX.utils.json_to_sheet(detailsTestscores);
                                XLSX.utils.sheet_add_aoa(wsTmp, [
                                    ["Chi tiết bài làm", ""]
                                ], {
                                    origin: "A1"
                                });
                                console.log('ws', wsTmp);
                                XLSX.utils.book_append_sheet(wb, wsTmp, email);

                            }
                        })
                    }
                }
            }

            console.log('wb', wb);
            XLSX.writeFile(wb, `${fileName}.xlsx`);
        }

        // function exportToExcel1(fileName, sheetName, table) {
        //     let wb;
        //     if (table && table !== '') {
        //         wb = XLSX.utils.table_to_book($('#' + table)[0]);
        //     }
        //     console.log('wb', wb);
        //     XLSX.writeFile(wb, `${fileName}.xlsx`);
        // }


        // function exportExcelscorce1() {
        //     let idTest = $('#idTestcurent').val();
        //     $.ajax({
        //         type: "POST",
        //         url: "./Controller/controller.php",
        //         data: {
        //             act: "getTest",
        //             idTest: idTest,
        //         },
        //         success: function(data) {
        //             console.log(data);
        //             let infoTest = JSON.parse(data);
        //             console.log(idTest);
        //             exportToExcel1("Bảng điểm: " + infoTest['tenDe'], "bangDiem", "listTestscores");
        //         }
        //     })
        // }

        function exportExcelscorce2() {
            let idTest = $('#idTestcurent').val();
            let idClass = infoClassCurent['maLop'];
            console.log(idClass);
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "getTestscores",
                    idTest: idTest,
                    idClass: idClass,
                },
                success: function(data) {
                    // console.log(data);
                    console.log(JSON.parse(data));
                    let infoTest = JSON.parse(data)['infoTest'];
                    let scorce = JSON.parse(data)['scorce'];
                    let myData = scorce.map((s) => {
                        return {
                            Email: s.mail,
                            'Mã sinh viên': s.maCanhan,
                            'Họ và Tên': s.hoten,
                            'Ngày Sinh': s.ngaysinh,
                            'Điểm': s.diem != null ? s.diem : "Chưa làm",
                        }
                    });
                    console.log(myData);
                    exportToExcel2("Bảng điểm: " + infoTest['maDe'], "Bảng Điểm", myData, infoTest['maDe']);
                }
            })
        }

        function exportMember() {
            idClass = infoClassCurent['maLop'];
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "getStudentInClass",
                    idClass: idClass,
                },
                success: function(data) {
                    console.log(data);
                    console.log(JSON.parse(data));
                    let myData = JSON.parse(data).map((s) => {
                        return {
                            Email: s.mail,
                            'Mã sinh viên': s.maCanhan,
                            'Họ và Tên': s.hoTen,
                            'Ngày Sinh': s.ngaysinh,

                        }
                    });
                    console.log(myData);
                    exportToExcel2("Danh sách học sinh lớp " + infoClassCurent['tenLop'], infoClassCurent['tenLop'] + " - " + infoClassCurent['maLop'], myData);
                }
            })
        }

        async function handleFileAsync(e) {
            // const file = e.target.files[0];
            const file = e.files[0];
            const data = await file.arrayBuffer();
            /* data is an ArrayBuffer */
            const workbook = XLSX.read(data);
            console.log(workbook);
            // console.log(workbook['SheetNames'][0]);
            // console.log(workbook['Sheets'][workbook['SheetNames'][0]]);
            // console.log(workbook['Sheets'][workbook['SheetNames'][0]]['A1']);
            // console.log(workbook['Sheets'][workbook['SheetNames'][0]]['A1']['v']);
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            let textListStudent = "";
            for (let i = 0; i < workbook['SheetNames'].length; i++) {
                let sheet = workbook['Sheets'][workbook['SheetNames'][i]];
                // console.log(sheet);
                for (key in sheet) {
                    // console.log(sheet[key]['v']);
                    var email = sheet[key]['v'];
                    if (filter.test(email)) {
                        textListStudent += email + '\n';
                    }
                }
            }
            // console.log(textListStudent);
            $('#txtListstudent').val(textListStudent);
            /* DO SOMETHING WITH workbook HERE */
        }
        var studentArr_detele = [];

        function taoMangxoahocsinh(maSinhvien) {
            // console.log(macauhoi);
            let flag = 1;
            for (let i = 0; i < studentArr_detele.length; i++) {
                if (studentArr_detele[i] == maSinhvien) {
                    studentArr_detele.splice(i, 1);
                    flag = 0;
                }
            }
            if (flag == 1) {
                studentArr_detele.push(maSinhvien);
            }

            console.log(studentArr_detele);
        }

        function delete_listStudent() {
            idClass = infoClassCurent['maLop'];
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "delete_listStudent",
                    listIdstudent: JSON.stringify(studentArr_detele),
                    idClass: idClass,
                },
                success: function(data) {
                    console.log(data);
                    renderMember();
                }

            })
        }

        function hienThicheckbox() {
            $(".checkboxDelete,.btnDeleteList").toggle();
        }

        function changeTypetest(obj) {
            console.log(obj.value);
            if (obj.value == 'default') {
                $('#shuffleQuestion').removeClass("visually-hidden");
            } else {
                $('#shuffleQuestion').addClass("visually-hidden");

            }
        }
    </script>
</head>

<body>
    <!-- Header -->
    <?php require("./View/_partial/Header_Footer/Header_Footer.php");
    head($teacherPage);
    include "./View/form/form_create_class.php";
    include "./View/_partial/popup/notice.php";
    include "./View/form/taoCautrucde_windows.php";
    include "./View/form/form_create_question.php";
    include "./View/hienThiDiem/hienThiDiem.php";
    include "./View/chiTietdiem/chitietdiem.php";
    include "./View/form/form_addStudent.php";
    include "./View/form/form_createNotice.php";
    include "./View/form/form_createReport.php";
    include "./View/form/form_alterTest.php";
    include "./View/form/form_createDetailTest_default.php";
    include "./View/form/form_createDetailTest_PDF.php";
    ?>

    <!-- Side Navigation -->
    <div class="d-flex flex-column fixed-top flex-shrink-0 p-2 overflow-auto" style="height:93%; width: 280px; margin-top: 60.2px; background-color: #82dda5; z-index: 1;">
        <!-- Tính năng -->
        <?php require("./View/_partial/TeacherAndStudent_Component/Sidebar.php");
        Sidebar($teacherPage); ?>
        <!-- Danh sách lớp -->
        <span class="fs-3 fw-bold">Danh sách lớp</span>
        <ul id="class" class="nav nav-pills flex-column mb-5 border-top border-dark pt-2">

        </ul>
    </div>

    <!-- Content -->

    <div id="body" style="margin-left: 280px; margin-top: 0px;">
        <div class="row" style="margin-left: 0; margin-right: 0;" id="container">

        </div>
    </div>
</body>

</html>