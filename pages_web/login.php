<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <title>BaleeKun-Digital</title>
</head>

<body>
    <br>
    <div class="col-xl-4 col-lg-8 col-md-10 mx-auto">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Card Body -->
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="font-weight-bold text-gray-900 mb-4">Login</h1>
                        <h3 class="h6 text-gray-500 mb-1">Enter Find Your Product</h3>
                    </div>
                    <hr>
                    <form class="user" action="pages/login/proses/proses_login.php" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                aria-describedby="emailHelp" placeholder="Email" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                placeholder="Password" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-warning btn-user btn-block">Login</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <p>Belum punya akun? <a href="pages/register/register.php" class="text-primary">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>