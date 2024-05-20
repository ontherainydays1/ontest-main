<head>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signin">
        Đăng nhập
    </button> -->
    <div class="modal" id="form_signIn" tabindex="-1" aria-labelledby="popUpSigin" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popUpSigin">Đăng nhập</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="signinEmail" placeholder="name@example.com">
                        <label for="signinEmail">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="siginPassword" placeholder="Password">
                        <label for="siginPassword">Password</label>
                    </div>
                    <div class="d-grid gap-2">
                        <!-- Đăng nhập -->
                        <button class="btn btn-primary" type="button" id="btnFormSignIn">Đăng nhập</button>
                    </div>
                    <hr>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <div id="dangkyText">Bạn chưa có tài khoản?</div>
                        <!-- Btn chuyển sang form đăng ký -->
                        <button class="btn btn-success" type="button" data-bs-target="#form_signUp" data-bs-toggle="modal">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>