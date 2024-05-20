<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<title>Chấm điểm</title>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formShowdetailstestscores">
    Đăng nhập
</button> -->


<div class="modal fade" id="formShowdetailstestscores" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="popupLabel">Chi tiết điểm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Nội dung của pop-up -->
            <div class="modal-body">
                <div class="container">
                    <!-- 1 dòng -->
                    <div class="hstack gap-3">
                        <div class="fs-4 fw-bold">Điểm:</div>
                        <div class="ms-auto fs-4 fw-bold" style="width: 3rem;" id="diem_formDetails">10</div>
                    </div>
                    <hr>
                    <!-- số câu đúng -->
                    <div class="hstack gap-3">
                        <div class="fs-5 fw-bold">Số câu đúng:</div>
                        <div class="ms-auto fs-5 fw-bold" style="width: 3rem;" id="soCaudung_formDetails">0</div>
                    </div>
                    <!--  -->
                    <div class="hstack gap-3">
                        <div class="fs-5 fw-bold">Số câu sai:</div>
                        <div class="ms-auto fs-5 fw-bold" style="width: 3rem;" id="soCausai_formDetails">0</div>
                    </div>
                    <!--  -->
                    <div class="hstack gap-3 mb-4">
                        <div class="fs-5 fw-bold">Số câu chưa làm:</div>
                        <div class="ms-auto fs-5 fw-bold" style="width: 3rem;" id="soCauchualam_formDetails">0</div>
                    </div>

                    <!-- đáp án -->
                    <div class="text-center fw-bold fs-4 mb-3">Bài làm</div>
                    <div style="height: 500px; overflow-y: scroll;" class="mb-3" id="chiTietbailam">
                        <!-- 1 dòng dáp án -->
                        <div class="hstack gap-3 mb-2 bg-success bg-opacity-25 text-black p-3">
                            <div class="fs-4 fw-bold">Câu $socau:</div>
                            <div class="ms-auto fs-5 fw-bold" style="width: 3rem;">$luachon</div>
                            <!-- icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                            </svg>
                        </div>
                        <div class="hstack gap-3 mb-2 bg-danger bg-opacity-25 text-black p-3">
                            <div class="fs-4 fw-bold">Câu $socau:</div>
                            <div class="ms-auto fs-5 fw-bold" style="width: 3rem;">$luachon</div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z" />
                                <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z" />
                            </svg>
                        </div>
                        <div class="hstack gap-3 mb-2 bg-secondary bg-opacity-25 text-black p-3">
                            <div class="fs-4 fw-bold">Câu $socau:</div>
                            <div class="ms-auto fs-7 fw-bold" style="width: 3rem;">Chưa làm</div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4.475 5.458c-.284 0-.514-.237-.47-.517C4.28 3.24 5.576 2 7.825 2c2.25 0 3.767 1.36 3.767 3.215 0 1.344-.665 2.288-1.79 2.973-1.1.659-1.414 1.118-1.414 2.01v.03a.5.5 0 0 1-.5.5h-.77a.5.5 0 0 1-.5-.495l-.003-.2c-.043-1.221.477-2.001 1.645-2.712 1.03-.632 1.397-1.135 1.397-2.028 0-.979-.758-1.698-1.926-1.698-1.009 0-1.71.529-1.938 1.402-.066.254-.278.461-.54.461h-.777ZM7.496 14c.622 0 1.095-.474 1.095-1.09 0-.618-.473-1.092-1.095-1.092-.606 0-1.087.474-1.087 1.091S6.89 14 7.496 14Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="cancelShowdetails()">Trở về</button>
            </div>
        </div>
    </div>
</div>