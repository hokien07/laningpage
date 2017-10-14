<?php
if(isset($_SESSION)) {
    header("location: quantri.php");
}else{
    session_start();
}
include("../include/dbConnect.php");
include("../include/function.php");



if(isset($_POST['dang-nhap'])) {
    $email = mysqli_real_escape_string($dbc, $_POST['email']);
    $pass = mysqli_real_escape_string($dbc, $_POST['pass']);

    //check email and pass is full
    if(empty($email) || empty($pass)) {
        $mess = "chưa điền email hoặc mật khẩu";
        exit();
    }

    //check email is exeat from database
    $q = "SELECT * FROM user WHERE email = '{$email}'";
    $r = mysqli_query($dbc, $q);
    check_query($r, $q);

    if(mysqli_num_rows($r) == 1 ) {
        //da ton tai email.
        $row = mysqli_fetch_array($r);
        $_SESSION['dang_nhap'] = $row;

        //ve trang quan tri admin.
        header("location: quantri.php");
    }else {
        $mess = " sai  email  hoặc mật khẩu";
    }
}




?>
<style>
   <?php
    include("../css/admin.css");
   ?>
</style>
<div class="container">
    <div class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <div class="alert alert-warning" role="alert">
            <?php
                if(!empty($mess) )echo $mess;
            ?>

        </div>

        <form class="form-signin" method="post">
            <span id="reauth-email" class="reauth-email"></span>

            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>

            <div id="remember" class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="dang-nhap">Sign in</button>
        </form><!-- /form -->
        <a href="#" class="forgot-password">
            Forgot the password?
        </a>
    </div><!-- /card-container -->
</div><!-- /container -->
