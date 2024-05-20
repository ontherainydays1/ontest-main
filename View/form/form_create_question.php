<head>
    <style>
        .btn-success {
            background-color: #42b72a;
            border-color: #42b72a;
        }

        #dangkyText {
            text-align: center;
        }
    </style>
    <script>
        function createGroup(value) {
            if (value != 'newGroup')
                $('#inputNameGroup').css('display', 'none');
            else
                $('#inputNameGroup').css('display', 'block');
        }
    </script>
</head>

<body>

    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form_createQuestion">
        Tạo câu hỏi
    </button> -->
    <div class="modal" id="form_createQuestion" tabindex="-1" aria-labelledby="popUpCreateClass" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popUpCreateClass">Tạo câu hỏi mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-around">
                        <div class="col-8">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Đáp án: </label>
                                <select class="form-select col-sm" name="sltAnswer" aria-label="sltAnswer" id="sltAnswer" required>
                                    <option selected disabled value="">Đáp án:</option>
                                    <option value="a">A</option>
                                    <option value="b">B</option>
                                    <option value="c">C</option>
                                    <option value="d">D</option>
                                </select>
                            </div>
                            <select class="form-select col-sm" name="sltQuestionGroup" aria-label="sltQuestionGroup" id="sltQuestionGroup" required onchange="createGroup(this.value)">
                                <option selected disabled value="">Nhóm câu hỏi:</option>
                                <option value="newGroup">Tạo nhóm mới</option>
                                <option value="nhom1">Nhóm 1</option>
                                <option value="nhom2">Nhóm 2</option>
                                <option value="nhom3">Nhóm 3</option>
                                <option value="nhom4">Nhóm 4</option>
                            </select>
                            <br>
                            <div class="form-floating mb-3" style="display:none" id="inputNameGroup">
                                <input type="text" class="form-control" id="txtNewGroup">
                                <label for="txtNewGroup">Tên nhóm câu hỏi</label>
                            </div>
                        </div>
                    </div>
                    <l abel for="txtQuestion">Nội dung câu hỏi</l>
                    <div class="form-group">
                        <textarea class="form-control" id="txtQuestion" rows="3"></textarea>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Câu A</span>
                        <textarea class="form-control" id="txtCauA" aria-label="Câu A"></textarea>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Câu B</span>
                        <textarea class="form-control" id="txtCauB" aria-label="Câu B"></textarea>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Câu C</span>
                        <textarea class="form-control" id="txtCauC" aria-label="Câu C"></textarea>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Câu D</span>
                        <textarea class="form-control" id="txtCauD" aria-label="Câu D"></textarea>
                    </div>
                    <br>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-success" type="button" id="btnCreateQuestion">Tạo câu hỏi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>