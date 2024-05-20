<head>
    <?php include 'modal_modules.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<?php
popupModules::btnToCallpopup('Click toi di', 'modal1');
popupModules::twoButtons('Test', 'DỮ liệu', 'ok', 'tắt', 'modal1');

popupModules::btnToCallpopup('Click toi di 2', 'modal2');
popupModules::oneButtons('Test', 'DỮ liệu', 'ok', 'modal2');

$data = '
    <select class="form-select col-sm" name="inputGioitinh" aria-label="inputGioitinh">
        <option hidden selected>Giới tính</option>
        <option value="gtNam">Nam</option>
        <option value="gtNu">Nữ</option>
    </select>
';

popupModules::btnToCallpopup('Click toi di 3', 'modal3');
popupModules::onlyWindows('Test', $data, 'ok', 'modal3');
