<head>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Tạo đề với PDF</title> -->
    <!-- <script>

    </script> -->
    <!-- <style>
        .left-content {
            border-right: 10px outset whitesmoke;
            height: 80vh;
        }
    </style> -->
</head>

<body>
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form_createDetailTest_PDF">
        Tạo câu hỏi
    </button> -->
    <div class="modal" id="form_createDetailTest_PDF" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popupLabel">Tạo đề kiểm tra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Nội dung của pop-up -->
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col ">
                                <div class="row align-items-start mb-3">
                                    <!-- Hiển thị số câu -->
                                    <div class="col">
                                        <div class="row justify-content-between">
                                            <div class="col-4">
                                                <form id="form_uploadFile">
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="fileToUpload">Tải đề lên</label>
                                                        <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" accept="application/pdf,application/vnd.ms-excel">
                                                    </div>
                                                    <input type="hidden" id="idTest_form_createDetailTest_PDF" name="idTest" value="123">
                                                </form>
                                            </div>
                                            <div class="col-4">
                                                <label for="soCauhoi" class="form-label fw-bold">Số câu</label>
                                                <!-- </br> -->
                                                <input type="number" min=1 id="soCauhoi" name="soCauhoi" onchange="capnhatCauhoi()">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Vùng tạo câu hỏi -->
                                <div class=" row row-cols-1 row-cols-md-5 g-4 mb-3 overflow-auto mt-3" style="max-height:60vh" id="containerCardQuestion">
                                    <!-- Thẻ tạo câu hỏi đặt ở đây -->
                                    
                                    <div class="col" id="buttonAddCard">
                                    </div>
                                </div>
                                <!-- Nút -->
                                <!-- <div class="d-grid gap-2 d-md-block text-center mb-4">
                                    <button class="btn btn-primary" type="button" onclick="createTestPDF()">Tiếp tục</button>
                                    <button class="btn btn-outline-danger" type="button" onclick="xoaCard();">Xóa câu cuối</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- data-bs-dismiss="modal" - đóng cửa sổ popup -->
                    <div class="d-grid gap-2 col-2 mx-auto">
                        <button class="btn btn-primary mt-3" type="button" onclick="createTestPDF()">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>