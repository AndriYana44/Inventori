<?php
    session_start();
    require_once "./connection.php";

    if(isset($_SESSION['login'])) {
        header('location: index.php');
    }

    if(isset($_POST['login'])) {
        $user = $_POST['username'];
        $pass = md5($_POST['password']);

        $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();

        if($row > 0) {
            $_SESSION['login'] = 'login';
            header('location: index.php?page=dashboard');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
</head>

<style>
    .container {
        margin: 100px auto;
    }
</style>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card shadow rounded">
                    <form action="" method="post">
                        <div class="card-header text-center py-3">
                            <h3>Form Login</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <div class="input-group mb-3 my-2">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-pen"></i>
                                    </span>
                                    <input type="text" class="form-control" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group mb-3 my-2">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-grid gap-2 mb-2">
                                <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                            </div>
                            <a href=""><small>Lupa password?</small></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
