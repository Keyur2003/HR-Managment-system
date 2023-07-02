<?php
include("connect.php");

if (isset($_POST['apply'])) {
    $username = $_POST['username'];
    $password = $_POST['pwd'];
    $username = stripcslashes($username);
    $password = stripcslashes($password);

    $sql = "SELECT * FROM credentials WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (mysqli_num_rows($result) == 1) {
        ob_start();
        session_start();
        $_SESSION['admin_id'] = $row['id'];
        $_SESSION['user'] = $row['username'];
        $_SESSION['user_role'] = $row['user_role'];

        if ($row['user_role'] == '1') {
            header("Location: list_employee.php");
            exit;
        } else {
            header("Location: profile.php");
            exit;
        }
    } else {
        echo '<script>alert("Invalid Username or Password!")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mayur Polymers HRM</title>
    <!-- contains all header links -->
    <?php include '../core/header.php';?>
    <!-- contains all CSS files  -->
    <link rel="stylesheet" href="../assets/css/login.css">
    <script src="https://surveybaba.com/new/public/assets/js/jquery-1.11.1.min.js"></script>
    <script type='text/javascript' src='https://surveybaba.com/new/public/assets/js/jquery.validate.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover();
        });

        $(function() {
            $("#login_form").validate({
                rules: {
                    username: "required",
                    pwd: "required",
                },
                messages: {
                    username: "<p style='color:red;font-weight:100; font-size:14px'>Please Enter Username!</p>",
                    pwd: "<p style='color:red;font-weight:100; font-size:14px'>Please Enter Password!</p>",
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <!-- login card starts -->
        <div class="card mx-auto">
            <div class="card-title">
                <p class="nav">Login<button type="button" class="pop-btn" data-toggle="popover" data-placement="bottom" data-content="Enter your registered email and password.">?</button></p>
            </div>
            <form action="" method="POST" name="login_form" id="login_form">
                <div class="card-body">
                    <p>Username</p>
                    <input type="text" name="username" id="username" placeholder="Enter Username">
                    <p>Password</p>
                    <input type="password" name="pwd" id="pwd" placeholder="Enter Password">
                    <br>
                    <input type="submit" name="apply" class="apply" value="Apply">
                    <input type="submit" onclick="document.getElementById('myModal').style.display='block'" class="reset" value="Reset Password">
                </div>
            </form>
            <div>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class="card-head">Reset Password</p>
                            <span onclick="document.getElementById('myModal').style.display='none'" class="clbtn">&times;</span>
                        </div>
                        <div class="modal-body">
                            <p class="tag0">Username</p>
                            <input type="text" name="user" id="">
                            <p class="tag1">Password</p>
                            <input type="password" name="password0" id="">
                            <p class="tag2">Confirm Password</p>
                            <input type="password" name="password1" id="">
                            <div class="btn">
                                <button name="submit-btn" class="submit-btn btn-primary">Submit</button>
                                <button class="reset-btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login card ends  -->
    </div>
</body>

</html>
