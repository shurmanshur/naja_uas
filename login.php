<?php
session_start();
require 'functions.php';
if (isset($_POST['loginButton'])) {
    if (login($_POST) == true) {
        echo "<script>alert('Selamat Datang !')
        document.location.href = 'home.php';
        </script>";
        $_SESSION['username'] = $_POST['username'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <h3 class="mb-5">Sign in</h3>
                    <form action="" method="post">
                    <label class="form-label" for="typeEmailX-2">Username</label>
                    <div data-mdb-input-init class="form-outline mb-4">
                    <input type="username" id="typeEmailX-2" class="form-control form-control-lg" name="username" />
                    </div>

                    <label class="form-label" for="typePasswordX-2">Password</label>
                    <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password" />
                    </div>

                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" type="submit" name="loginButton">Login</button>

                    </form>
                    <hr class="my-4">
                    <a href="register.php" class="text-primary">Belum Punya Akun ? Register</a>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

</html>