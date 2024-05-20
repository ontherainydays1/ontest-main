<?php
$studentPage = "Student Page";
$teacherPage = "Teacher Page";
$admin = "Admin";
function sidebar($currentPage)
{
    global $studentPage, $admin;
    if ($currentPage == $studentPage) {
        echo '<ul id="tabs" class="nav nav-pills flex-column mt-2 mb-5">
                    <li class="nav-item">
                        <a href="#" class="nav-link active" onclick="renderListTest()">
                            <i class="fas fa-chart-bar"></i>
                            Tổng Quan
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link link-dark"  onclick="renderAnnounment()">
                            <i class="fas fa-bell"></i>
                            Thông báo
                        </a>
                    </li>
                
                </ul>';
    } else if ($currentPage == $admin) {
        echo '<ul id="tabs" class="nav nav-pills flex-column mt-2 mb-5">
                    <li class="nav-item">
                        <a href="#" id="account" class="nav-link active" style="padding-left: 20px;">
                            <i class="fas fa-users"></i>
                            Tài Khoản
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="#" id="class" class="nav-link link-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            width="25" height="25"
                            viewBox="0 0 50 50"
                            style=" fill:#000000;"><path d="M 6 5 C 3.792969 5 2 6.792969 2 9 L 2 41 C 2 43.207031 3.792969 45 6 45 L 44 45 C 46.207031 45 48 43.207031 48 41 L 48 9 C 48 6.792969 46.207031 5 44 5 Z M 7 9 L 43 9 C 43.554688 9 44 9.449219 44 10 L 44 40 C 44 40.554688 43.554688 41 43 41 L 7 41 C 6.449219 41 6 40.554688 6 40 L 6 10 C 6 9.449219 6.449219 9 7 9 Z M 8 11 L 8 39 L 29 39 L 29 37 L 38 37 L 38 39 L 42 39 L 42 11 Z M 25 18 C 26.65625 18 28 19.34375 28 21 C 28 22.65625 26.65625 24 25 24 C 23.34375 24 22 22.65625 22 21 C 22 19.34375 23.34375 18 25 18 Z M 17 22 C 18.105469 22 19 22.894531 19 24 C 19 25.105469 18.105469 26 17 26 C 15.894531 26 15 25.105469 15 24 C 15 22.894531 15.894531 22 17 22 Z M 33 22 C 34.105469 22 35 22.894531 35 24 C 35 25.105469 34.105469 26 33 26 C 31.894531 26 31 25.105469 31 24 C 31 22.894531 31.894531 22 33 22 Z M 25 27 C 27.125 27 28.941406 27.890625 30 28.5625 L 30 32 L 20 32 L 20 28.5625 C 21.058594 27.890625 22.875 27 25 27 Z M 17 28.65625 C 17.347656 28.65625 17.679688 28.71875 18 28.78125 L 18 32 L 13 32 L 13 30.1875 C 13 30.1875 14.742188 28.65625 17 28.65625 Z M 33 28.65625 C 35.257813 28.65625 37 30.1875 37 30.1875 L 37 32 L 32 32 L 32 28.78125 C 32.320313 28.71875 32.652344 28.65625 33 28.65625 Z"></path></svg>
                            Lớp
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" id="question" class="nav-link link-dark" style="padding-left: 20px;">
                            <i class="far fa-question-circle"></i>
                            Ngân hàng câu hỏi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" id="GroupQuestion" class="nav-link link-dark" style="padding-left: 20px;">
                            <i class="fas fa-layer-group"></i>
                            Nhóm câu hỏi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" id="report" class="nav-link link-dark" style="padding-left: 20px;">
                            <i class="far fa-flag"></i>
                            Báo cáo
                        </a>
                    </li>
                </ul>';
    } else {
        echo '<ul id="tabs" class="nav nav-pills flex-column mt-2 mb-5">
                    <li class="nav-item ">
                        <a href="#" class="nav-link active fw-bold" id="bankQuestion">
                            <i class="far fa-question-circle"></i>
                            Ngân hàng câu hỏi
                        </a>
                    </li>
                    <hr>
                    <li class="nav-item " id="btnTongQuan">
                        <a href="#" name="tongQuan" class="nav-link link-dark menuClass ">
                            <i class="fas fa-chart-bar"></i>
                            Tổng Quan
                        </a>
                    </li>
                   <li class="nav-item " >
                        <a href="#" name="thanhVien" id="btnRenderMember" class="nav-link link-dark menuClass">
                            <i class="fas fa-users"></i>
                            Thành Viên
                        </a>
                    </li>
                   <li class="nav-item " >
                        <a href="#" name="thanhVien" id="btnRenderAnnounment" class="nav-link link-dark menuClass">
                            <i class="fas fa-bell"></i>
                            Thông báo
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="#" name="taoDeKiemTra" class="nav-link link-dark menuClass" data-bs-toggle="modal" data-bs-target="#form_createTest" >

                            <i class="fas fa-book"></i>
                            Tạo đề kiểm tra
                        </a>
                    </li>
                </ul>';
    }
}
