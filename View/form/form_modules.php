<?php
class FormBootstrap
{
    public static $inputType;
    public static $id;
    public static $labelName;

    public static function horizontalInput($inputType, $labelName, $id)
    {
        // Horizontal Form input
        echo '
        <div class="row mb-3">
            <label for="' . $id . '" class="col-sm-2 col-form-label">' . $labelName . '</label>
            <div class="col-sm-10">
                <input type="' . $inputType . '" class="form-control" id="' . $id . '" required>
                <div class="invalid-feedback">Vui lòng điền số điện thoại.</div>
            </div>
        </div>
        ';
    }

    public static function horizontalInputrequired($inputType, $labelName, $id)
    {
        // Horizontal Form input
        if($labelName == "Họ và tên")
            $type="Vui lòng nhập họ và tên";
        if($labelName == "Email")
            $type="Vui lòng nhập Email và phải có dạng @example.com";
        if($labelName == "Nhập mật khẩu")
            $type="Vui lòng nhập mật khẩu không được chứa kí tự đặt biệt và phải hơn 8 kí tự";
        if($labelName == "Nhập lại mật khẩu")
            $type="Vui lòng nhập lại mật khẩu phải trùng khớp";
        else
            $type="Vui lòng nhập mã cá nhân";
        echo '
        <div class="row mb-3">
            <label for="' . $id . '" class="col-sm-2 col-form-label">' . $labelName . '</label>
            <div class="col-sm-10">
                <input type="' . $inputType . '" class="form-control" id="' . $id . '" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">'.$type.'.</div>
            </div>
        </div>
        ';
    }
}
