<head>
    <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <script>
        function closeBackdrop(modalID) {
            $(modalID).modal('hide');
            // $('body').removeClass('modal-open');
        }

        function hileNotificationSignUp()
        {
            let dangki = document.querySelector('.frmSignUp');
            dangki.classList.remove('was-validated');
        }
    </script>
</head>

<?php include 'form_modules.php';
?>
<div class="modal" id="form_signUp" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="popupLabel">Đăng ký</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="hileNotificationSignUp()"></button>
            </div>
            <div class="modal-body">
                <div class="position-relative p-2">
                    <!-- <div class="mx-auto">Thông tin cá nhân</div> -->
                    <form class="position-relative frmSignUp" action="">
                        <!-- input text -->
                        <?php
                        FormBootstrap::horizontalInputrequired("text", "Họ và tên", "inputTen");
                        FormBootstrap::horizontalInputrequired("email", "Email", "inputEmail");
                        FormBootstrap::horizontalInputrequired("text", "Mã cá nhân", "inputMacn");
                        FormBootstrap::horizontalInput("text", "Số điện thoại", "inputSdt");
                        FormBootstrap::horizontalInputrequired("password", "Nhập mật khẩu", "inputPass1");
                        FormBootstrap::horizontalInputrequired("password", "Nhập lại mật khẩu", "inputPass2");
                        ?>
                        <!-- Ngày sinh -->
                        <div class="row g-3 mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Ngày sinh</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" id="inputDate" required>
                            </div>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                            <select class="form-select col-sm" name="inputGioitinh" aria-label="inputGioitinh" id="inputGioitinh" required>
                                <option selected disabled value="">Giới tính</option>
                                <option value="gtNam">Nam</option>
                                <option value="gtNu">Nữ</option>
                            </select>
                        </div>
                        <!-- Lựa chọn học sinh hay gv -->
                        <div class="position-absolute start-50 translate-middle-x">
                            <input type="radio" class="btn-check" name="chucvu" id="radioGV" autocomplete="off" value="gv" checked onclick="setCV(this.value)">
                            <label class="btn btn-outline-primary" for="radioGV">Giảng viên</label>
                            <input type="radio" class="btn-check" name="chucvu" id="radioHS" value="sv" autocomplete="off" onclick="setCV(this.value)">
                            <label class="btn btn-outline-primary" for="radioHS">Học sinh</label>
                        </div>
                        <br>
                        <!-- Check box điều khoản -->
                        <br>
                        <div class="form-check position-absolute start-50 translate-middle-x">
                            <input class="form-check-input" type="checkbox" value="check" id="checkCondition" required>
                            <label class="form-check-label" for="">
                                Đồng ý với các điều khoản của chúng tôi.
                            </label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <!-- data-bs-dismiss="modal" - đóng cửa sổ popup -->
                <button type="button" class="btn btn-primary" id="btnFormSignUp">Đăng ký</button>
                <button type="button" class="btn btn-success" data-bs-target="#form_signIn" data-bs-toggle="modal">Chuyển sang Đăng nhập</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="hileNotificationSignUp()">Thoát</button>
            </div>
        </div>
    </div>
</div>