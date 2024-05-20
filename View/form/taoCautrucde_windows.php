    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->


    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form_createTest">
        Tạo câu hỏi
    </button> -->
    <!-- Kiểm tra lại id của modal để thiết kế nút -->
    <div class="modal" id="form_createTest" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popupLabel">Tạo đề kiểm tra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Nội dung của pop-up -->
                <div class="modal-body">
                <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="txtNameTest" >
                        <label for="txtNameTest">Tên bài kiểm tra</label>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-3 col-form-label">Thời gian làm bài</label>
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" value="45" aria-label="setTime" name="thoiGianLamBai" id="thoiGianLamBai">
                                <span class="input-group-text">Phút</span>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="row mb-3">
                        <label for="ngayThi" class="col-sm-3 col-form-label">Ngày làm bài</label>
                        <div class="col-sm-6">
                            <input type="datetime-local" class="form-control" name="ngayThi" id="ngayThi">
                            <!-- <input type="date" class="form-control" name="ngayThi" id="ngayThi1">
                        <input type="time" class="form-control" name="ngayThi" id="ngayThi2"> -->

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-3 col-form-label">Loại đề</label>
                        <div class="col">
                            <input type="radio" class="btn-check" id="checkLoaiDe_default" name="loaiDe" autocomplete="off" value="default" checked onclick="changeTypetest(this)">
                            <label class="btn btn-outline-primary" for="checkLoaiDe_default">Chọn câu hỏi</label>
                            <input type="radio" class="btn-check" id="checkLoaiDe_pdf" name="loaiDe" autocomplete="off" value="pdf" onclick="changeTypetest(this)">
                            <label class="btn btn-outline-primary" for="checkLoaiDe_pdf">Upload file pdf</label>
                        </div>
                    </div>
                    <div class="row mb-3" id='shuffleQuestion'>
                        <label for="" class="col-sm-3 col-form-label">Đảo câu hỏi</label>
                        <div class="col">
                            <input type="radio" class="btn-check" id="checkDaocauHoi2" name="daoCauHoi" autocomplete="off" value="false" checked>
                            <label class="btn btn-outline-primary" for="checkDaocauHoi2">Không</label>
                            <input type="radio" class="btn-check" id="checkDaocauHoi1" name="daoCauHoi" autocomplete="off" value="true">
                            <label class="btn btn-outline-primary" for="checkDaocauHoi1">Có</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- data-bs-dismiss="modal" - đóng cửa sổ popup -->
                    <button type="button" class="btn btn-primary" id="btnCreateTest">Tiếp tục</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>