<div class="modal" id="form_createReport" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="popupLabel">Báo cáo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Nội dung của pop-up -->
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="txtTitlereport">
                    <label for="txtTitlereport">Tiêu đề</label>
                </div>
                <l abel for="txtReport">Nội dung</l>
                    <div class="form-group">
                        <textarea class="form-control" id="txtReport" rows="3"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <!-- data-bs-dismiss="modal" - đóng cửa sổ popup -->
                <button type="button" class="btn btn-primary" id="btnSummitreport">Gửi báo cáo</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
            </div>
        </div>
    </div>
</div>