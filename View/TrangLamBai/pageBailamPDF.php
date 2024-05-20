<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<!-- 3 dòng trên là để test giao diện, khi ghép file thì nhớ xoá -->

<!-- script xử lý lấy đáp án, xuất ra console -->
<script>
    // function submitTestPDF() {
    //     var values = $("select[name='test']")
    //         .map(function() {
    //             return $(this).val();
    //         }).get();
    //     console.log(values);
    // }
</script>
<!-- nút bấm để hiện modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formDoTestPDF">
    Làm bài
</button> -->
<!-- Modal làm bài -->
<div class="modal" id="formDoTestPDF" tabindex="-1" aria-labelledby="lable_DoTest" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lable_DoTest">Làm bài kiểm tra</h5>
            </div>
            <div class="modal-body bg-light">
                <div class="container bg-light  ">
                    <div class="row align-items-start">
                        <div class="col border-end border-3">
                            <!-- Chỉnh scroll o day -->
                            <ol class="list-group list-group-numbered list-group-flush shadow-sm" id="deThiPDF" style="height: 85vh;">
                            
                                <!-- File PDF -->
                                <iframe id="ifrPDF" src="./Assets/deThi/test.pdf" title="" height="100%" frameborder="0"></iframe>
                            </ol>
                        </div>
                        <div class="col-6">
                            <div class="d-grid gap-2 col-6 mx-auto mb-3 text-center">
                                <div class="p-2 fs-5 bg-primary bg-gradient text-white rounded-2 shadow-sm mt-2">Phiếu bài làm</div>
                            </div>
                            <div class="fw-bold fs-5 mb-5 text-center">Thời gian làm bài còn lại
                                <div>
                                    <span id="m2">Phút</span> :
                                    <span id="s2">Giây</span>
                                </div>
                            </div>
                            <div class="row row-cols-5 g-3 mx-auto bg-white shadow-sm overflow-auto align-content-start justify-content-start" style="height: 50vh;" id="phieuLamBaiPDF">
                                <!-- <div class="col">
                                    <div class="form-check" style="padding-left: 0;">
                                        <label class="form-check-label">
                                            Câu 100:
                                        </label>
                                        <select name="test">
                                            <option hidden></option>
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>
                                        </select>
                                    </div>
                                </div> -->
                            </div>
                            <br>
                            <div class="d-grid gap-2 col-3 mx-auto">
                                <!-- <button class="btn btn-success" type="button" onclick="submitTestPDF()">Nộp bài</button> -->
                                <button class="btn btn-success" type="button" onclick="submitTest()">Nộp bài</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>