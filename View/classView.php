
<?php

// include '../Controller/classController.php';

class ClassView
{

    public static function rederClass($data)
    {
        $result = "";
        while ($row = mysqli_fetch_array($data)) {
            $result .= '            <li>
            <a href="#" class="nav-link link-dark" onclick="renderInfoclass(\'' . $row['maLop'] . '\')">'

                . $row['tenLop'] .
                '</a>
        </li>';
        }

        return $result;
    }   
    public static function renderMember($data)
    {
        $result = '
        <div class="d-flex justify-content-end" id="btnFunctionMember">
            <button type="button" class="btn btn-primary mb-2 me-2" onclick="exportMember()" >Xuất danh sách học sinh</button>
            <button type="button" class="btn btn-secondary mb-2 me-2 btnToggleDeleteList" onclick="hienThicheckbox()">Xóa theo danh sách</button>
            <button type="button" class="btn btn-warning mb-2 btnDeleteList" onclick="delete_listStudent()" style="display: none;">Xóa</button>
        </div>
        <div class="card "><div class="card-body scrollClass"><div class="">
        ';
        while ($row = mysqli_fetch_array($data)) {
            $result .= ' 
            <div class ="hstack gap-3">
                <input type="checkbox" name="'.$row['mail'].'" onchange="taoMangxoahocsinh(this.name)" class="form-check-input checkboxDelete" style="display: none;">
                <label class="form-check-label fs-4" for="">
                ' . $row['hoTen'] . '
                </label>
                <button class ="col-1 offset-3 btn btn-danger ms-auto" onclick="deleteStudent(\''.$row['mail'].'\')"> Xóa</button>
            </div>
            <hr>
            ';
        }
        $result .= '</div></div></div>';
        return $result;
    }

    public static function renderContainerInfoClass(){
        $result='
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
            <div class="col justify-content-between">
                <button type="button" class="btn btn-info text-center fw-bold" data-bs-toggle="modal" data-bs-target="#formAddstudent" id="btnAddstudent">
                    <i class="fa-solid fa-plus"></i>Thêm học sinh</button>
            </div>
            <div class="col justify-content-between">
                <button type="button" class="btn btn-warning text-center fw-bold" id="btnDeleteClass" onclick="deleteClass()">
                    <i class="fa-solid fa-trash"></i> Xóa Lớp</button>
            </div>
        </div>
    </div>
    <!-- Statistical Card -->
    <div class="row gap-5 justify-content-center mt-5" style="margin-left: 0; margin-right: 0;">
        <div class="card bg-primary bg-gradient col-sm-4" style="padding-right:0px;">
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

        <div class="card bg-danger bg-gradient col-sm-4" style="padding-right:0px;">
            <div class="card-body" style="padding-left: 0; padding-right: 0;">
                <div class="card-content">
                    <div class="media d-flex row">
                        <div class="align-self-center col-sm-3">
                            <i class="fas fa-book fs-1"></i>
                        </div>
                        <div class="media-body text-end col-sm-8" style="padding-right:0px;">
                            <h3 id="soBaikt">3</h3>
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

</div>';
        return $result;
    }


    public static function createTableAnnouncement($head, $data)
    {
        // table head
        $table='<div class="container">
                <div class="d-flex justify-content-center"><button id="" type="button" class="btn btn-info mx-auto" style="margin-top:80px;"   data-bs-toggle="modal" data-bs-target="#form_createNotice">Tạo thông báo</button></div>
                <table id="table-type" class="table align-middle my-5 bg-white">
                    <thead class="bg-success bg-opacity-25">
                        <tr>';
        for ($i = 2; $i < sizeof($head); $i++) {
            $table .= ' <th>' . $head[$i] . '</th>';
        }
        $table .= '        <th class="text-center">Hành động</th>
                    </thead>
                <tbody>';
        // table body
        $i = 2;
        while ($row = mysqli_fetch_array($data)) {
            $table .= ' <tr>';
            for ($j = 2; $j < mysqli_num_fields($data); $j++) {
                if($j==3)
                {
                    $table .=
                    '<td >
                        <textarea  style="width:40vw" disabled >'.$row[$j] .'</textarea>
                    </td>';
                    
                }
                else{
                    $table .= '<td style="width:10vw" >' . $row[$j] . '</td>';
                }
            }
            $table .= '<td class="text-center" style="width:10vw">
                        <button class="btn btn-success" name="' . $row[0] . '"  data-bs-target="#a' . $i . '" data-bs-toggle="collapse">
                            Sửa
                        </button>
                        <button class="btn btn-danger" name="' . $row[0] . '" onclick="deleteAnnouncement(this)">
                            Xoá
                        </button>
                    </td>   
                    </tr>
                    <tr class="collapse" id="a' . $i . '">
                        <td colspan="12">
                            <div class="collapse multi-collapse" id="a' . $i . '">
                                ' . self::createInputannouncement($row, $i) . '
                            </div>
                        </td>
                    </tr>';
            $i++;
        }
        $table .= '</tbody>
                </table></div>';
        return $table;
    }

    public static function createInputannouncement($row, $i)
    {
        $date=date("Y-m-d\TH:i",strtotime($row['date']));
        $input = '
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Tiêu đề</span>
                        <input type="text" name="tieuDe' . $i . '" class="form-control" placeholder="Nhập tiêu đề mới">
                    </div>

                    <div class="input-group mb-1">
                        <span class="input-group-text">Nội dung</span>
                        <textarea name="noiDung' . $i . '" class="form-control" placeholder="Nhập nội dung mới" aria-label="Nội dung"></textarea>
                    </div>
                    <div class="input-group mb-1 d-none">
                        <span class="input-group-text col-2">Thời gian</span>
                        <input type="datetime-local" value="'.$date.'" name="thoiGian' . $i . '" class="form-control">
                    </div>
                    <div class="input-group mb-1 d-flex justify-content-end">
                        <button name="' . $row['idNotice'] . '" id="' . $i . '" type="button" onclick="editAnnouncement(this)" class="btn btn-primary">Lưu</button>
                    </div>';
        return $input;
    }
}

