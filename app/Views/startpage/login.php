<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">

    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <!-- Style -->
    <link rel="stylesheet" href="/css/login.css" />

    <title>Login Gardeny</title>
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="/img/logindraw.svg" alt="Image" class="img-fluid" />
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <div class="row mb-3">
                                    <div class="col-md-1">
                                        <img src="/icon/gardeny.svg" alt="gardeny" class="icon-1 mt-1">
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="color-1 fw-bolder"> GARDENY</h3>
                                    </div>
                                </div>
                                <h3>Log In</h3>
                                <p class="mb-4">Login dan kelola tanaman dan tamanmu dengan gardeny</p>
                            </div>

                            <!-- Form Login -->
                            <form action="login/auth" method="post">
                                <?php if(session()->getFlashdata('gagal')) : ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <?= session()->getFlashdata('gagal'); ?>
                                </div>
                                <?php endif; ?>
                                <div class="row">
                                    <label for="email" class="fs-6">Email</label>
                                </div>
                                <div class="form-group first">
                                    <input type="email" class="form-control" id="email" name="email" />
                                </div>
                                <div class="row">
                                    <label for="password" class="fs-6">Password</label>
                                </div>
                                <div class="form-group last mb-4">
                                    <input type="password" class="form-control" id="password" name="password" />
                                </div>
                                <input type="submit" value="Log In" class="btn btn-block btn-success" />
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>