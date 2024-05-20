<?php
class reportView {
    public static function createReport($data)
    {
        $firstContent = '';
        $result = '
                <div class="card py-2">
                    <div class="row px-3">
                        <ul id="reportUl" class="col text-center">
                            <p class="fs-5 fw-bold">Báo cáo</p>';
        $i = 0;
        while($row = mysqli_fetch_array($data)) {
            $result .= '
                            <li name="'.$row['trangThai'].'" class="list-group px-5">
                                <button id="btn'.$i.'" name="'.$row['maReport'].'" type="button" class="list-group-item list-group-item-action row d-flex justify-content-between" aria-current="true" onclick = "renderReportContent(this)">
                                    <div class="col">'.$row['tieuDe'].'</div>
                                    <div class="col">'.$row['thoiGian'].'</div>
                                </button>
                                <hr>
                            </li>
                        ';
            if ($i == 0) {
                $firstContent = self::createFirstReportContent($row['tieuDe'], $row['noiDung'], $row['maGv'], $row['maReport'], $row['trangThai']);
            }
            $i++;
        }
        $result .= '</ul>' . $firstContent;
        return $result;
    }
    public static function createReportContent($data)
    {   
        $result = '';
        while ($row = mysqli_fetch_array($data)) {
            $status = $row['trangThai'] == 1 ? 'checked' : '';
            $trangThai = $row['trangThai'] == 1 ? 'Đã xác thực' : 'Chưa xác thực';
            $result .= '
                    <p class="text-center fs-5 fw-bold">'.$row['tieuDe'] .'</p>
                    <hr>
                    <div>
                        <p class="text-lg-start">Giảng viên: '.$row['maGv'].'</p>
                        <p class="text-lg-start">Nội dung: '.$row['noiDung'].'</p>
                        <p class="text-lg-start">Trạng thái: '.$trangThai.'</p>
                    </div>
                    <hr>
                    <div class="form-check form-switch d-flex justify-content-center"><input name="'.$row['maReport'].'" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" ' . $status . ' onclick="verify(this)" style="width: 50px; height: 25px;"></div>';
        }
        return $result;
    }
    public static function createFirstReportContent($tieuDe, $noiDung, $maGv, $maReport, $trangThai)
    {
        $status = $trangThai == 1 ? 'checked' : '';
        $a = $trangThai == 1 ? 'Đã xác thực' : 'Chưa xác thực';
        return '
        <div id="reportContent" class="col-6 border py-3">
            <p class="text-center fs-5 fw-bold">'.$tieuDe.'</p>
            <hr>
            <div>
                <p class="text-lg-start">Giảng viên: '.$maGv.'</p>
                <p class="text-lg-start">Nội dung: '.$noiDung.'</p>
                <p class="text-lg-start">Trạng thái: '.$a.'</p>
            </div>
            <hr>
            <div class="form-check form-switch d-flex justify-content-center"><input name="'.$maReport.'" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" ' . $status . ' onclick="verify(this)"style="width: 50px; height: 25px;"></div>
        </div>
        </div>
        </div>';
    }
}