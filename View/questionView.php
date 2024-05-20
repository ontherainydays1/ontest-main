<?php

class QuestionView
{

    public static function renderBankQuestion($question, $answer)
    {
        $result = '                <thead class="table-light">
        <tr>
            <th scope="col" width="9%">Mã</th>
            <th scope="col" width="70%">Câu hỏi</th>
            <th scope="col" width="32%">Loại</th>
        </tr>
    </thead>
    <tbody>';
        while ($row = mysqli_fetch_array($question)) {
            $result .= ' <tr style="transform: rotate(0);">
                            <th scope="row">' . $row['maCau'] . '</th>
                            <td>' . $row['noiDung'] . '</td>
                            <td>' . $row['tenNhomCauHoi'] . '</td>
                            <td>
                                <a class="stretched-link" data-bs-toggle="collapse" href="#cau' . $row['maCau'] . '"></a>
                            </td>
                        </tr>
                        <tr class="collapse" id="cau' . $row['maCau'] . '">
                            <th scope="col" width="9%"></th>
                            <td scope="col" width="70%">
                                <ul class="collapse " id="cau' . $row['maCau'] . '" style="list-style-type:none; margin:0px; padding:0px;">';
            $cnt = 4;
            while ($cnt--) {
                $row2 = mysqli_fetch_array($answer);
                // if($row['maCau'] == $row2['maCau'])
                $result .= ' <li>
                                    <p style="margin:0;"><span class="fw-bold">Câu ' . $row2['maLuaChon'] . ' :</span>' . $row2['noiDung'] . '</p>
                                </li>';
            }
            $result .= '<li>
                             <p style="margin:0;"><span class="fw-bold">Đáp án: </span>' . $row['dapAn'] . '</p>
                       </li>
                       </ul>
                            </td>
                            <th scope="col" width="70%"></th>
                        </tr>';
        }
        return $result;
    }

    public static function renderQuestionGroup($data)
    {
        $result = '                <select class="form-select" aria-label="Loại câu hỏi" onchange="timCauhoiRadio(this)">
        <option hidden value="" selected>Loại câu hỏi</option>
        <option value="">Tất cả</option>';
        while ($row = mysqli_fetch_array($data)) {
            $result .= '<option value="' . $row['tenNhomCauHoi'] . '">' . $row['tenNhomCauHoi'] . '</option>';
        }
        return $result;
    }

    public static function renderQuestionGroupInFrom($data)
    {
        $result = '                <select class="form-select" aria-label="Loại câu hỏi" onchange="timCauhoiRadioinfrom(this)">
        <option hidden value="" selected>Loại câu hỏi</option>
        <option value="">Tất cả</option>';
        while ($row = mysqli_fetch_array($data)) {
            $result .= '<option value="' . $row['tenNhomCauHoi'] . '">' . $row['tenNhomCauHoi'] . '</option>';
        }
        return $result;
    }

    public static function renderSltQuestionGroup($data)
    {
        $result = '<option selected disabled value="">Nhóm câu hỏi:</option>
        <option value="newGroup">Tạo nhóm mới</option>';
        while ($row = mysqli_fetch_array($data)) {

            $result .= '<option value="' . $row['maNhomCauHoi'] . '">' . $row['tenNhomCauHoi'] . '</option>';
        }
        return $result;
    }

    public static function renderAllQuestionInSettingTest($question, $answer)
    {
        $result = "";
        while ($row = mysqli_fetch_array($question)) {
            $result .= '        <tr>
            <th scope="row"  >' . $row['maCau'] .  '</th>
            <td style="transform: rotate(0);" >' . $row['noiDung'] . '<a class="stretched-link" data-bs-toggle="collapse" href="#cau' . $row['maCau'] . '"></a></td>
            <td>' . $row['tenNhomCauHoi'] . '</td>
            <td><input class="form-check-input" type="checkbox" value="' . $row['maCau'] . '" id="' . $row['maCau'] . '" onchange="taoMangcauhoi(this.value)"></td>
        </tr>
        <tr class="collapse" id="cau' . $row['maCau'] . '">
                            <th scope="col" width="9%"></th>
                            <td scope="col" width="70%">
                                <ul class="collapse " id="cau' . $row['maCau'] . '" style="list-style-type:none; margin:0px; padding:0px;">';
            $cnt = 4;
            while ($cnt--) {
                $row2 = mysqli_fetch_array($answer);
                // if($row['maCau'] == $row2['maCau'])
                $result .= ' <li>
                                                        <p style="margin:0;"><span class="fw-bold">Câu ' . $row2['maLuaChon'] . ' :</span>' . $row2['noiDung'] . '</p>
                                                    </li>';
            }
            $result .= '<li>
                                                 <p style="margin:0;"><span class="fw-bold">Đáp án: </span>' . $row['dapAn'] . '</p>
                                           </li>
                                           </ul>
                                                </td>
                                                <th scope="col" width="70%"></th>
                                            </tr>';
        }
        return $result;
    }

    public static function renderListQuestionOfTest($question, $answer)
    {
        // $result="";
        // while ($row = mysqli_fetch_array($question)){
        //     $result.='
        //     <li class="list-group-item d-flex justify-content-between align-items-start">
        //         <div class="ms-2 me-auto">
        //             <div class="fw-bold">' . $row['noiDung'] . '</div>             
        //             <ul class="list-group list-group-flush">
        //                 ' . QuestionView::QuestionViewdisabled($cau1, $macauhoi, 'A', $booleanTocheckA) . '
        //                 ' . QuestionView::QuestionViewdisabled($cau2, $macauhoi, 'B', $booleanTocheckB) . '
        //                 ' . QuestionView::QuestionViewdisabled($cau3, $macauhoi, 'C', $booleanTocheckC) . '
        //                 ' . QuestionView::QuestionViewdisabled($cau4, $macauhoi, 'D', $booleanTocheckD) . '
        //             </ul>
        //         </div>
        //     </li>
        //     ';
        // }

    }

    public static function renderContainerbankquestion(){
        $result = '
        <div class="col-sm-12 mt-3 px-5">
    <!-- Bự quá chỉnh lại col-8 -->
    <!-- Ngân hàng câu hỏi -->
            <div class="p-3 pb-5 border">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#form_createReport" >Báo cáo</button>

                    <button class="btn btn-primary ms-1" data-bs-toggle="modal" data-bs-target="#form_createQuestion" >Tạo câu hỏi</button>
                </div>
                <div class="row align-items-start">
                    <div class="text-center fw-bold fs-2 mb-3">Ngân hàng câu hỏi</div>
                    <div class="col" id="sltGroupQuestion">
                    </div>
                    <!-- Filter lọc tìm câu hỏi -->
                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="timCauhoi"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg></span>
                            <input type="text" class="form-control" placeholder="Tìm câu hỏi" aria-label="searchCauhoi" aria-describedby="timCauhoi" id="searchCauhoi" onkeyup="timCauhoi()" value="">
                        </div>
                    </div>
                </div>
                <!-- Bảng câu hỏi -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="bangCauHoi">
                    </table>
                </div>
            </div>
        </div>';
        return $result;
    }
}
