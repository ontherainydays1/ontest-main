<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<?php include './phieutraloiCauhoi_modules.php'; ?>
<title>Phiếu trả lời câu hỏi</title>


<body>
    <!-- <div class="container mt-3"> -->
    <div class="d-grid gap-2 col-6 mx-auto mb-3 text-center">
        <div class="p-2 fw-bold fs-4 bg-primary bg-gradient bg-opacity-75 text-white rounded-2 shadow-sm">Phiếu trả lời câu hỏi</div>
    </div>
    <div class="fw-bold fs-5 mb-5 text-center">Thời gian làm bài còn lại <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
        </svg></div>
    <!-- div chia cột làm 3  -->
    <div class="row row-cols-3 w-50 g-3 mx-auto bg-white shadow-sm mb-4">
        <!-- mỗi 1 câu là 1 col (colum) -->
        <?php
        echo
        // sử dụng mã câu sao cho phù hợp với bên phần làm bài
        // dấu chấm = nối chuỗi
        phieutraloiCauhoi::taoCheckbox(1, 'cauhoi1') .
            phieutraloiCauhoi::taoCheckbox(2, 'cauhoi2') .
            phieutraloiCauhoi::taoCheckbox(3, 'cauhoi3') .
            phieutraloiCauhoi::taoCheckbox(4, 'cauhoi4') .
            phieutraloiCauhoi::taoCheckbox(5, 'cauhoi5') .
            phieutraloiCauhoi::taoCheckbox(6, 'cauhoi6') .
            phieutraloiCauhoi::taoCheckbox(7, 'cauhoi7') .
            phieutraloiCauhoi::taoCheckbox(8, 'cauhoi8') .
            phieutraloiCauhoi::taoCheckbox(9, 'cauhoi9') .
            phieutraloiCauhoi::taoCheckbox(10, 'cauhoi10') .
            phieutraloiCauhoi::taoCheckbox(11, 'cauhoi11') .
            phieutraloiCauhoi::taoCheckbox(12, 'cauhoi12') .
            phieutraloiCauhoi::taoCheckbox(13, 'cauhoi13') .
            phieutraloiCauhoi::taoCheckbox(14, 'cauhoi14') .
            phieutraloiCauhoi::taoCheckbox(15, 'cauhoi15') .
            phieutraloiCauhoi::taoCheckbox(16, 'cauhoi16') .
            phieutraloiCauhoi::taoCheckbox(17, 'cauhoi17') .
            phieutraloiCauhoi::taoCheckbox(18, 'cauhoi18') .
            phieutraloiCauhoi::taoCheckbox(19, 'cauhoi19') .
            phieutraloiCauhoi::taoCheckbox(20, 'cauhoi20') .
            phieutraloiCauhoi::taoCheckbox(21, 'cauhoi21') .
            phieutraloiCauhoi::taoCheckbox(22, 'cauhoi22') .
            phieutraloiCauhoi::taoCheckbox(23, 'cauhoi23') .
            phieutraloiCauhoi::taoCheckbox(24, 'cauhoi24') .
            phieutraloiCauhoi::taoCheckbox(25, 'cauhoi25') .
            phieutraloiCauhoi::taoCheckbox(26, 'cauhoi26') .
            phieutraloiCauhoi::taoCheckbox(27, 'cauhoi27') .
            phieutraloiCauhoi::taoCheckbox(28, 'cauhoi28') .
            phieutraloiCauhoi::taoCheckbox(29, 'cauhoi29') .
            phieutraloiCauhoi::taoCheckbox(30, 'cauhoi30');
        ?>
    </div>
    <div class="d-grid gap-2 col-3 mx-auto">
        <button class="btn btn-success fs-5" type="button">Nộp bài</button>
    </div>
    <!-- </div> -->
</body>