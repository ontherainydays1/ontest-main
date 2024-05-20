<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formShowtestscores">
    Đăng nhập
</button> -->


<div class="modal fade" id="formShowtestscores" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="popupLabel">Điểm bài kiểm tra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Nội dung của pop-up -->
            <div class="modal-body scrollClass">
                <table id="listTestscores" name="listTestscores" class="table align-middle my-5 bg-white">

                </table>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="" id="idTestcurent" value="">
                <button type="button" class="btn btn-info" onclick="exportExcelscorce2()">Xuất excel</button>
                <button type="button" class="btn btn-secondary" onclick="showFormaltertest()" data-bs-toggle="modal" data-bs-target="#form_alterTest" >Sửa đề</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Trở về</button>
            </div>
        </div>
    </div>
</div>