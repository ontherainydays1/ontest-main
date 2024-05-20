<?php
class phieutraloiCauhoi
{
    // trả về chuỗi html
    public static function taoCheckbox($socau, $macau)
    {
        return '
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="' . $macau . '" onclick="return false;">
                <label class="form-check-label" for="cauhoi1">
                    Câu ' . $socau . '
                </label>
            </div>
        </div>
        ';
    }
}
