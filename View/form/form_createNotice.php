<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form_createTest">
        Tạo câu hỏi
    </button> -->
<!-- Kiểm tra lại id của modal để thiết kế nút -->
<div class="modal" id="form_createNotice" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="popupLabel">Tạo thông báo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Nội dung của pop-up -->
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="txtTitle">
                    <label for="txtTitle">Tiêu đề</label>
                </div>
                <l abel for="txtNotice">Nội dung</l>
                    <div class="form-group">
                        <textarea class="form-control" id="txtNotice" rows="3"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <!-- data-bs-dismiss="modal" - đóng cửa sổ popup -->
                <button type="button" class="btn btn-primary" id="btnCreatenotice">Tạo thông báo</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
            </div>
        </div>
    </div>
</div>