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
    <div class="modal" id="form_createGroupQuestion" tabindex="-1" aria-labelledby="popUpCreateClass" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popUpCreateClass">Tạo nhóm câu hỏi mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-text">Tên nhóm câu hỏi</span>
                        <input class="form-control" id="tenNhomCauHoi" aria-label="Tên nhóm câu hỏi"></input>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-success mt-5" type="button" id="btnCreateGroupQuestion">Tạo nhóm câu hỏi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>