<div class="col-sm-8 mt-5 ">
    <!-- Classroom information -->

    <div class="container border border-3">
        <h4 id="nameClass"></h4>
        <h4>Mô tả:</h4>
        <!-- p for chú thích -->
        <p class="ps-3" id="infoClass"></p>
        <div class="row py-2">
            <div class="col">
                <h4 id="idClass">Mã lớp:</h4>
                <input type="hidden" name="" value="" id="idClassCurent">
            </div>
            <div class="col">
            </div>
            <div class="col justify-content-end">
                <button type="button" class="btn btn-warning text-center fw-bold" id="btnDeleteClass">
                    <i class="fa-solid fa-trash"></i> Xóa Lớp</button>
            </div>
        </div>
    </div>
    <!-- Statistical Card -->
    <div class="row gap-5 justify-content-center mt-5" style="margin-left: 0; margin-right: 0;">
        <div class="card bg-primary bg-gradient col-sm-3" style="padding-right:0px;">
            <div class="card-body" style="padding-left: 0; padding-right: 0;">
                <div class="card-content">
                    <div class="media d-flex row">
                        <div class="align-self-center col-sm-3">
                            <i class="far fa-user fs-1"></i>
                        </div>
                        <div class="media-body text-end col-sm-8" style="padding-right:0px;">
                            <h3 id="soHs">40</h3>
                            <span>Số học sinh</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-warning bg-gradient col-sm-3" style="padding-right:0px;">
            <div class="card-body" style="padding-left: 0; padding-right: 0;">
                <div class="card-content">
                    <div class="media d-flex row">
                        <div class="align-self-center col-sm-3">
                            <i class="far fa-star fs-1"></i>
                        </div>
                        <div class="media-body text-end col-sm-8" style="padding-right:0px;">
                            <h3>8</h3>
                            <span>Điểm trung bình</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-danger bg-gradient col-sm-3" style="padding-right:0px;">
            <div class="card-body" style="padding-left: 0; padding-right: 0;">
                <div class="card-content">
                    <div class="media d-flex row">
                        <div class="align-self-center col-sm-3">
                            <i class="fas fa-book fs-1"></i>
                        </div>
                        <div class="media-body text-end col-sm-8" style="padding-right:0px;">
                            <h3>3</h3>
                            <span>Bài kiểm tra</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Average grade -->
    <!-- Nhấp vào sẽ hiện thông tin của bài ktra ở phần information -->
    <div class="mt-5 pb-5" id="content">

    </div>
</div>
<div class="container col-sm-3 overflow-auto text-center fixed-top bg-light" style="margin-right:0px; margin-top:70px; height:90%; z-index: 1;" id="right_content">
    <!-- <div class="border-start">
        <p>Thông tin</p>
        <h4>Bài kiểm tra 1</h4>
        <div class="ps-3 text-start row" style="margin:0; padding:0;">
            <div class="col-sm-6">
                <p>Ngày làm bài</p>

                <p>Đã nộp</p>
                <p>Thời gian</p>
                <p>Đảo đề</p>
                <p>Xem đáp án</p>
                <div class="col justify-content-end">
                    <button type="button" class="btn btn-warning text-center fw-bold" onclick="showTest(52001)">
                        <i class="fa-solid fa-trash"></i> Xem bài kiểm tra</button>
                </div>
            </div>
            <div class="col-sm-6 fw-bold">
                <p>14-5-2022</p>
                <p>14/40</p>
                <p>45 phút</p>
                <p>Có</p>
                <p>Có</p>
                <div class="col justify-content-end">
                    <button type="button" class="btn btn-warning text-center fw-bold" onclick="deleteTest(52001)">
                        <i class="fa-solid fa-trash"></i> Xóa bài kiểm tra</button>
                </div>
            </div>

        </div>
    </div>' -->
</div>