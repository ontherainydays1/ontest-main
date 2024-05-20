<!-- <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head> -->
<script>
    function timCauhoiinfrom() {
        // tạo biến
        var input, filterByinput, filterByradio, table, tr, td, i, txtValue;
        input = document.getElementById("searchCauhoiinfrom");
        radio = document.getElementsByName("loaiCauhoi");
        filterByinput = input.value.toUpperCase();
        filterByradio = radio.value;
        table = document.getElementById("bangCauhoiinfrom");
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

    function timCauhoiRadioinfrom(loai) {
        console.log(loai.value);

        // tạo biến
        var filterByradio, table, tr, td, i, txtValue;

        radio = document.getElementsByName("loaiCauhoi");
        filterByradio = loai.value.toUpperCase();
        table = document.getElementById("bangCauhoiinfrom");
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
    // tạo mảng câu hỏi đã chọn
    var questionArr = [];

    function taoMangcauhoi(macauhoi) {
        // console.log(macauhoi);
        var checkBox = document.getElementById(macauhoi);
        if (checkBox.checked == true) {
            questionArr.push(macauhoi);
        } else {
            for (let i = 0; i < questionArr.length; i++) {
                if (questionArr[i] == macauhoi) {
                    questionArr.splice(i, 1);
                }
            }
        }
        console.log(questionArr);
    }
</script>
<style>
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

<body>
    <div class="modal" id="form_createDetailTest_default" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popupLabel">Tạo đề kiểm tra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Nội dung của pop-up -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row align-items-start" style="height:730px" >
                            <div class="col">
                                <div class="row align-items-start">
                                    <div class="text-center fw-bold fs-2 mb-3">Ngân hàng câu hỏi</div>
                                    <div class="col" id="sltGroupQuestionInFormCreateTest">
                                        <!-- select chọn thể loại (nhóm câu hỏi) -->
                                        <select class="form-select" aria-label="Loại câu hỏi" onchange="timCauhoiRadioinfrom(this)">
                                            <option hidden value="" selected>Loại câu hỏi</option>
                                            <option value="">Tất cả</option>

                                            <option value="Nông nghiệp">Nông nghiệp</option>
                                            <option value="Công nghệ thông tin">Công nghệ thông tin</option>
                                            <option value="Hài hước">Hài hước</option>
                                        </select>
                                    </div>
                                    <!-- Filter lọc tìm câu hỏi -->
                                    <div class="col-sm-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="timCauhoi"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                </svg></span>
                                            <input type="text" class="form-control" placeholder="Tìm câu hỏi" aria-label="searchCauhoi" aria-describedby="timCauhoi" id="searchCauhoiinfrom" onkeyup="timCauhoiinfrom()">
                                        </div>
                                    </div>
                                </div>
                                <!-- Bảng câu hỏi -->
                                <div class="table-responsive" style="height: 650px;">
                                    <table class="table table-hover align-middle" id="bangCauhoiinfrom">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" width="9%">Mã</th>
                                                <th scope="col" width="70%">Câu hỏi</th>
                                                <th scope="col" width="20%">Loại</th>
                                                <th scope="col" width="2%">Chọn</th>
                                            </tr>
                                        </thead>
                                        <tbody id="listQuestioninfrom">
                                        </tbody>
                                    </table>
                                </div>

                                <!-- nút -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- data-bs-dismiss="modal" - đóng cửa sổ popup -->
                    <div class="d-grid gap-2 col-2 mx-auto">
                        <button class="btn btn-primary mt-3" type="button" id="btnSaveQuestionInTest">Lưu lại</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>