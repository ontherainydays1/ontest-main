<head>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <style>
        .btn-success {
            background-color: #42b72a;
            border-color: #42b72a;
        }

        #dangkyText {
            text-align: center;
        }
    </style>
</head>

<body>
    
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form_findClass">
        Tìm lớp
    </button> -->
    <div class="modal" id="form_findClass" tabindex="-1" aria-labelledby="popUpFindClass" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popUpFindClass">Tham gia lớp mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="txtIdClass" >
                            <label for="txtIdClass">Mã lớp</label>
                        </div>
                    <br>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-success" type="button" id="btnFindClass">Tham gia lớp</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>