<?php
class TestView
{
    public static function renderSettingTest($question)
    {
        $result = "";
        while ($row = mysqli_fetch_array($question)) {
            $result .= '        <tr>
            <th scope="row">' . $row['maCau'] . '</th>
            <td>' . $row['noiDung'] . '</td>
            <td>' . $row['tenNhomCauHoi'] . '</td>
            <td><input class="form-check-input" type="checkbox" value="' . $row['maCau'] . '" id="' . $row['maCau'] . '" onchange="taoMangcauhoi(this.value)"></td>
        </tr>';
        }
        return $result;
    }

    public static function renderListTest($data)
    {
        $result = "";
        while ($row = mysqli_fetch_array($data)) {
            $d=strtotime($row['ngayThi']);
            $ngayThi=date('d-m-Y',$d);
            $result .= '        <div class="mt-4 border-top border-2" style="transform: rotate(0); cursor:pointer;">
            <a class="stretched-link" onclick="renderInfoTest(' . $row['maDe'] . ')"></a>
            <div class="d-flex justify-content-between">
                <p class="mt-3 fs-5 fw-bold">' . $row['tenDe'] . '</p>
                <p class="mt-3 fs-7 fw-light">Thời gian làm bài: '.$ngayThi.' </p>
            </div>
            ';
            if ($row['diemtb'] != null) {
                $diemtb = $row['diemtb'] * 10;
                $result .=
                    '<p>Điểm trung bình:</p>
                <div class="progress bg-danger bg-opacity-25">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: ' . $diemtb . '%" aria-valuenow="' . $diemtb . '" aria-valuemin="0" aria-valuemax="100">' .round($row['diemtb'],2) . '</div>
                </div>';
            }
            $result .= '</div>';
        }
        return $result;
    }

    public static function renderInfoTest($data)
    {
        $row = mysqli_fetch_array($data);
        $xemDiem=$row['xemDiem']=='true'?'Có':'Không';
        $xemDapAn=$row['xemDapAn']=='true'?'Có':'Không';
        $daoCauHoi=$row['daoCauHoi']=='true'?'Có':'Không';
        $d=strtotime($row['ngayThi']);
        $ngayThi=date('d-m-Y',$d);
        $gioThi=date('h:i:s A',$d);
        $result = '    <div class="border-start">
                            <p>Thông tin</p>
                            <h4>'.$row['tenDe'].'</h4>
                            <div class="ps-3 text-start row" style="margin:0; padding:0;">
                                <div class="col-sm-6">
                                    <p>Ngày làm bài</p>
                                    <p>Giờ làm bài</p>
                                    <p>Đã nộp</p>
                                    <p>Thời gian</p>
                                    <p>Đảo đề</p>
                                    <div class="col justify-content-end">
                                    <button type="button" class="btn btn-warning text-center fw-bold" onclick="showTest('.$row['maDe'].')">
                                        <i class="fa-solid fa-eye"></i> Xem bài kiểm tra</button>
                                </div>
                                </div>
                                <div class="col-sm-6 fw-bold">
                                    <p>'.$ngayThi.'</p>
                                    <p>'.$gioThi.'</p>
                                    <p>'.$row['slBai'].'    </p>
                                    <p>'.$row['thoiGianLamBai'].' phút</p>
                                    <p>'.$daoCauHoi.'</p>
                                    <div class="col justify-content-end">
                                    <button type="button" class="btn btn-warning text-center fw-bold" onclick="deleteTest('.$row['maDe'].')">
                                        <i class="fa-solid fa-trash"></i> Xóa bài kiểm tra</button>
                                </div>
                                </div>

                            </div>

                        </div>';



        return $result;
    }

    public static function renderListTestInStudent($listTestNoSubmit,$listTestSubmit){
        $result="";
        while ($row = mysqli_fetch_array($listTestNoSubmit)){
            $result .= '<button type="button" id="maDe'.$row['maDe'].'" class="list-group-item list-group-item-action row d-flex justify-content-between" aria-current="true" onclick="renderInfoTestNoSubmit('.$row['maDe'].',this)">
                            <div class="col">'.$row['tenDe'].'</div>
                            <div class="col">Chưa làm</div>
                        </button>
                        <hr>';
        }
        while ($row = mysqli_fetch_array($listTestSubmit)){
            $result .= '<button type="button" id="maDe'.$row['maDe'].'" class="list-group-item list-group-item-action row d-flex justify-content-between" aria-current="true" onclick="renderInfoTestSubmited('.$row['maDe'].',this)">
                            <div class="col">'.$row['tenDe'].'</div>
                            <div class="col">Đã làm</div>
                        </button>
                        <hr>';
        }
        return $result;
    }

    public static function renderInfoTestNoSubmit($data){
        $d=strtotime($data['ngayThi']);
        $ngayThi=date('d-m-Y',$d);
        $gioThi=date('h:i:s A',$d);
        $result='
                <div class="border p-3">
                    <p class="text-center fs-5 fw-bold">'.$data['tenDe'].'</p>
                    <div class="">
                        <p class="">Ngày làm bài: '.$ngayThi.'</p>
                        <p class="">Giờ làm bài: '.$gioThi.'</p>
                        
                        <p class="">Thời gian làm bài: '.$data['thoiGianLamBai'].'</p>
                        <hr>
                        <div class="text-center"><a href="#" class="btn btn-success text-center" onclick="takeATest(\''.$data['maDe'].'\')" >Làm bài</a></div>
                    </div>
                </div>';
                return $result;
    }

    public static function renderInfoTestSubmited($data){
        $d=strtotime($data['ngayThi']);
        $ngayThi=date('d-m-Y',$d);
        $gioThi=date('h:i:s A',$d);
        $result='
        
                <div class="border p-3">
                    <p class="text-center fs-5 fw-bold">'.$data['tenDe'].'</p>
                    <div class="">
                        <p class="">Ngày làm bài: '.$ngayThi.'</p>
                        <p class="">Giờ làm bài: '.$gioThi.'</p>
                        
                        <p class="">Thời gian làm bài: '.$data['thoiGianLamBai'].'</p>
                        <hr>
                        <div class="text-center"><p >Điểm: '.$data['diem'].'</p></a></div>
                    </div>
                </div>';
return $result;
    }

    public static function renderTestForStudent($question,$answer) {
        $result['deThi']='';
        $result['baiLam']='';
        for($i=0;$i<count($question);$i++){
            $result['deThi'].=
            '
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">' . $question[$i]['noiDung'] . '</div>
                    <ul class="list-group list-group-flush">';
                    foreach($answer as $A){
                        if($A['maCau']==$question[$i]['maCau'])
                        $result['deThi'].=
                        '<li class="list-group-item">
                            <input class="form-check-input me-1" name="' . $A['maCau'] . '" type="radio" value="' . $A['maLuaChon'] . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                            ' . $A['noiDung'] . '
                        </li>';
                    }
                    $result['deThi'].=
                    '</ul>
                </div>
            </li>
            ';
            $result['baiLam'].=
            '
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="'.$question[$i]['maCau'].'" onclick="return false;">
                    <label class="form-check-label" for="cauhoi1">
                        Câu ' . $i+1 . '
                    </label>
                </div>
            </div>
            ';
        }
        return $result;
    }

    public static function renderTestPDFForStudent($question,$idTest){
        $result['deThi']='./Assets/deThi/'.$idTest.'.pdf';
        $result['baiLam']='';
        for($i=1;$i<=count($question);$i++){
            $result['baiLam'].='
            <div class="col">
                <div class="form-check" style="padding-left: 0;">
                    <label class="form-check-label">
                        Câu '.$i.':
                    </label>
                    <select name="test">
                        <option hidden></option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
            </div>
            ';
        }
        return $result;

    }

    public static function showTestscores($data){
        $result='
        <thead class="bg-success bg-opacity-25">
            <tr>
                <th>Email</th>
                <th>Tên</th>
                <th>Ngày sinh</th>
                <th>Điểm</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
        ';
        while ($row = mysqli_fetch_array($data)) {
            $diem=$row['diem'];
            $disabled="";
            if($row['diem']==null){
                $diem="Chưa làm bài";
                $disabled="disabled";
            }
            $result .= '
            <tr>
                <td>'.$row['mail'].'</td>
                <td>'.$row['hoten'].'</td>
                <td>'.$row['ngaysinh'].'</td>
                <td>'.$diem.'</td>
                <td class="text-center">
                    <button class="btn btn-success" onclick="showDetails(\''.$row['mail'].'\',\''.$row['maDe'].'\','.$diem.')" '.$disabled.'>
                        Chi Tiết
                    </button>
                </td>
            </tr>
            ';
        }
        return $result;
    }

    public static function showDetailstestscores($listAnswer,$baiLam){
        $html='';
        $soCaudung=0;
        $soCausai=0;
        $soCauchualam=0;
        $test=0;
        while ($row = mysqli_fetch_array($baiLam)){
            if($row['dapAnChon']==''){
                $soCauchualam++;
                $html.=
                '
                <div class="hstack gap-3 mb-2 bg-secondary bg-opacity-25 text-black p-3">
                    <div class="fs-4 fw-bold">Câu '.$row['maCau'].':</div>
                    <div class="ms-auto fs-7 fw-bold" style="width: 3rem;">Chưa làm</div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.475 5.458c-.284 0-.514-.237-.47-.517C4.28 3.24 5.576 2 7.825 2c2.25 0 3.767 1.36 3.767 3.215 0 1.344-.665 2.288-1.79 2.973-1.1.659-1.414 1.118-1.414 2.01v.03a.5.5 0 0 1-.5.5h-.77a.5.5 0 0 1-.5-.495l-.003-.2c-.043-1.221.477-2.001 1.645-2.712 1.03-.632 1.397-1.135 1.397-2.028 0-.979-.758-1.698-1.926-1.698-1.009 0-1.71.529-1.938 1.402-.066.254-.278.461-.54.461h-.777ZM7.496 14c.622 0 1.095-.474 1.095-1.09 0-.618-.473-1.092-1.095-1.092-.606 0-1.087.474-1.087 1.091S6.89 14 7.496 14Z" />
                    </svg>
                </div>
                ';
            }else{
                // $test++;
                foreach($listAnswer as $answer){
                    if($row['maCau']==$answer['maCau']){
                        if($row['dapAnChon']==$answer['dapAn']){
                            $soCaudung++;
                            $html.=
                            '
                            <div class="hstack gap-3 mb-2 bg-success bg-opacity-25 text-black p-3">
                                <div class="fs-4 fw-bold">Câu '.$row['maCau'].':</div>
                                <div class="ms-auto fs-5 fw-bold" style="width: 3rem;">'.$row['dapAnChon'].'</div>
                                <!-- icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                </svg>
                            </div>
                            ';
                        }else{
                            $soCausai++;
                            $html.=
                            '
                            <div class="hstack gap-3 mb-2 bg-danger bg-opacity-25 text-black p-3">
                            <div class="fs-4 fw-bold">Câu '.$row['maCau'].':</div>
                            <div class="ms-auto fs-5 fw-bold" style="width: 3rem;">'.$row['dapAnChon'].'</div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z" />
                                <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z" />
                            </svg>
                        </div>
                            ';
                        }
                    }
                }
            }
        }
        $result['html']=$html;
        $result['soCausai']=$soCausai;
        $result['soCaudung']=$soCaudung;
        $result['soCauchualam']=$soCauchualam;
        // $result['test']=$test;
        return $result;
    }

}
