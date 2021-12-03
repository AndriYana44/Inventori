<?php
require_once "./connection.php";

$sql = "SELECT * FROM users";
$query = $conn->query($sql);
$data = $query->fetch_assoc();

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $password = $_POST['password'];

    if(md5($password) != $data['password']) {
        $_SESSION['ERROR'] = time();
        $flash_error = "Password yang anda masukan salah!";
    }else if(md5($password) == $data['password']) {
        $sql_update = "UPDATE users SET username='$username', email='$email', city='$city'";
        $query_update = $conn->query($sql_update);

        if($query_update) {
            $_SESSION['SUCCESS'] = time();
            $flash_success = "Data berhasil diubah";
        }
    }

    if (isset($_SESSION['ERROR']) && (time() - $_SESSION['ERROR'] > 3)) {
        unset($_SESSION['ERROR']);
    }

    if (isset($_SESSION['SUCCESS']) && (time() - $_SESSION['SUCCESS'] > 3)) {
        unset($_SESSION['SUCCESS']);
    }
}

?>

<div class="col-sm-12 p-md-0">
    <!-- flash message if success -->
    <?php if(isset($_SESSION['SUCCESS'])) { ?>
    <div class="alert alert-success text-dark flash" role="alert">
        <?= $flash_success ?>
    </div>
    <?php } ?>

    <!-- flash message if error -->
    <?php if(isset($_SESSION['ERROR'])) { ?>
    <div class="alert alert-danger text-dark flash" role="alert">
        <?= $flash_error ?>
    </div>
    <?php } ?>
</div>
<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="profile">
            <div class="profile-head">
                <div class="photo-content">
                    <div class="cover-photo shadow">
                        <div class="row page-titles mx-0">
                            <div class="col-sm-6 p-md-0">
                                <div class="welcome-text">
                                    <h4 class="text-dark">Hi <?= $data['username'] ?> , welcome back!</h4>
                                    <p class="mb-0">Profile</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-photo">
                        <img src="../asset/images/logo-polres.png" class="img-fluid rounded-circle" alt="">
                    </div>
                </div>
                <div class="profile-info">
                    <div class="row justify-content-center">
                        <div class="col-xl-8">
                            <div class="row">
                                <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                    <div class="profile-name">
                                        <h4 class="text-primary"><?= $data['username'] ?></h4>
                                        <p>Username</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                    <div class="profile-email">
                                        <h4 class="text-muted"><?= $data['email'] ?></h4>
                                        <p>Email</p>
                                    </div>
                                </div>
                                <!-- <div class="col-xl-4 col-sm-4 prf-col">
                                    <div class="profile-call">
                                        <h4 class="text-muted">(+1) 321-837-1030</h4>
                                        <p>Phone No.</p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="profile-tab">
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link active show py-3">About Me</a>
                            </li>
                            <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link py-3">Setting</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="about-me" class="tab-pane active show fade">
                                <div class="profile-personal-info pt-4">
                                    <h4 class="text-primary mb-4">Personal Information</h4>
                                    <div class="row mb-4">
                                        <div class="col-3">
                                            <h5 class="f-w-500">Website <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-9"><span>Logistik Polres</span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-3">
                                            <h5 class="f-w-500">Username <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-9"><span><?= $data['username'] ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-3">
                                            <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-9"><span><?= $data['email'] ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-3">
                                            <h5 class="f-w-500">Availability <span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-9"><span>-</span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-3">
                                            <h5 class="f-w-500">Location <span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-9"><span><?= $data['city'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="profile-settings" class="tab-pane fade">
                                <div class="pt-3">
                                    <div class="settings-form">
                                        <h4 class="text-primary">Account Setting</h4>
                                        <form action="" method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Username</label>
                                                    <input type="text" name="username" class="form-control" value="<?= $data['username'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" value="<?= $data['email'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>City</label>
                                                    <input type="text" name="city" class="form-control" value="<?= $data['city'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Password</label>
                                                    <input type="password" name="password" class="form-control" placeholder="*****">
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>