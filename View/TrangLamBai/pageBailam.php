<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formDoTest">
    Đăng nhập
</button> -->
<div class="modal" id="formDoTest" tabindex="-1" aria-labelledby="lable_DoTest" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lable_DoTest">Làm bài kiểm tra</h5>
            </div>
            <div class="modal-body bg-light">
                <div class="container bg-light  ">
                    <div class="row align-items-start">
                        <div class="col">
                            <!-- Chỉnh scroll o day -->
                            <ol class="list-group list-group-numbered list-group-flush shadow-sm" id="deThi" style="height: 800px; overflow-y: scroll;">
                                <!-- <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">' . $noidungcauhoi . '</div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="122" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="122" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="122" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="122" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">' . $noidungcauhoi . '</div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="123" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="123" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="123" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="123" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">' . $noidungcauhoi . '</div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="124" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="124" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="124" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="124" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                        </ul>
                                    </div>
                                </li> -->
                            </ol>
                        </div>
                        <div class="col-4">
                            <div class="d-grid gap-2 col-6 mx-auto mb-3 text-center">
                                <div class="p-2 fs-5 bg-primary bg-gradient text-white rounded-2 shadow-sm mt-2">Phiếu bài làm</div>
                            </div>
                            <div class="fw-bold fs-5 mb-5 text-center">Thời gian làm bài còn lại
                                <div>
                                    <span id="m1">Phút</span> :
                                    <span id="s1">Giây</span>
                                </div>
                            </div>
                            <div class="row row-cols-3 g-3 mx-auto bg-white shadow-sm" id="phieuLamBai">
                                <!-- <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="122" onclick="return false;">
                                        <label class="form-check-label" for="cauhoi1">
                                            Câu ' . $socau . '
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="123" onclick="return false;">
                                        <label class="form-check-label" for="cauhoi1">
                                            Câu ' . $socau . '
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="124" onclick="return false;">
                                        <label class="form-check-label" for="cauhoi1">
                                            Câu ' . $socau . '
                                        </label>
                                    </div>
                                </div> -->
                            </div>
                            <br>
                            <div class="d-grid gap-2 col-3 mx-auto">
                                <input type="hidden" name="" id="idTest" value="">
                                <button class="btn btn-success" type="button" onclick="submitTest()">Nộp bài</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
