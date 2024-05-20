        <!-- Script and sytle for Ngân Hàng Câu hỏi -->
        <script>
            window.onload = function() {
                renderBankQuestion();
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
                $('#tabs').find('a.menuClass').addClass('disabled');
                
            }

            function renderBankQuestion(){
                $.ajax({
                    type: "POST",
                    url: "./Controller/controller.php",
                    data:{
                        act:"renderBankQuestion",
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
                data:{
                    act:"renderSltGroupQuestion",
                },
                success: function(data) {
                    // console.log(data);
                    $('#sltQuestionGroup').html(JSON.parse(data));
                }

            });
            }
            $(document).ready(function() {
                
                $('#btnCreateQuestion').click(function(){
                    let noidung=$('#txtQuestion').val();
                    let cauA=$('#txtCauA').val();
                    let cauB=$('#txtCauB').val();
                    let cauC=$('#txtCauC').val();
                    let cauD=$('#txtCauD').val();
                    let idGroup=$('#sltQuestionGroup').val();
                    let dapAn=$('#sltAnswer').val();
                    let tenNhom=$('#txtNewGroup').val();
                    console.log(noidung);
                    console.log(cauA);
                    console.log(cauB);
                    console.log(cauC);
                    console.log(cauD);
                    console.log(idGroup);
                    console.log(dapAn);
                    console.log(tenNhom);
                    if(noidung==""){
                        showNotice("Vui lòng nhập nội dung câu hỏi");
                        return;
                    }
                    if(cauA==""){
                        showNotice("Vui lòng nhập nội dung đáp án A");
                        return;
                    }
                    
                    if(cauB==""){
                        showNotice("Vui lòng nhập nội dung đáp án B");
                        return;
                    }
                    
                    if(cauC==""){
                        showNotice("Vui lòng nhập nội dung đáp án C");
                        return;
                    }
                    
                    if(cauD==""){
                        showNotice("Vui lòng nhập nội dung đáp án D");
                        return;
                    }
                    if(idGroup==null){
                        showNotice("Vui lòng chọn nhóm câu hỏi");
                        return;
                    }
                    if(idGroup=="newGroup" &&tenNhom==""){
                        showNotice("Vui lòng nhập tên nhóm muốn tạo");
                        return;
                    }

                    if(dapAn==null){
                        showNotice("Vui lòng chọn đáp án");
                        return;
                    }
                    $.ajax({
                        type: "POST",
                        url: "./Controller/controller.php",
                        data: {
                            act:'createQuestion',
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
                            renderBankQuestion();
                        }
                    })
                })
            })
            function timCauhoi() {
                // tạo biến
                var input, filterByinput, filterByradio, table, tr, td, i, txtValue;
                input = document.getElementById("searchCauhoi");
                radio = document.getElementsByName("loaiCauhoi");
                filterByinput = input.value.toUpperCase();
                filterByradio = radio.value;
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
                // console.log(questionArr);
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
    <?php
        include "./View/_partial/form/form_create_question.php";
    ?>
<div class="col-sm-12 mt-3 px-5">
    <!-- Bự quá chỉnh lại col-8 -->
    <!-- Ngân hàng câu hỏi -->
    <div class="p-3 pb-5 border">
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form_createQuestion" >Tạo câu hỏi</button>
        </div>
        <div class="row align-items-start">
            <div class="text-center fw-bold fs-2 mb-3">Ngân hàng câu hỏi</div>
            <div class="col" id="sltGroupQuestion">
            </div>
            <!-- Filter lọc tìm câu hỏi -->
            <div class="col-sm-6">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="timCauhoi"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg></span>
                    <input type="text" class="form-control" placeholder="Tìm câu hỏi" aria-label="searchCauhoi" aria-describedby="timCauhoi" id="searchCauhoi" onkeyup="timCauhoi()">
                </div>
            </div>
        </div>
        <!-- Bảng câu hỏi -->
        <div class="table-responsive">
            <table class="table table-hover align-middle" id="bangCauHoi">
            </table>
        </div>
    </div>
</div>