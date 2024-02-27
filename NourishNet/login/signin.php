<?php
include '../connection.php';
session_start();

if(isset($_POST['sign']))
{
    $msg=false;
    $email=$_POST['email'];
    $password=$_POST['password']; // Plain text password

    $sql="select * from login where email='$email'" ;
    $result= mysqli_query($connection, $sql);
    $num=mysqli_num_rows($result);

    if($num==1){
        $row = mysqli_fetch_assoc($result);
        $hash = $row['password'];
        $type = $row['type'];
        // echo "hase: ",$hash;
        // echo "hase2:",password_hash($password, PASSWORD_DEFAULT);
        $verify = password_verify($password,$hash);
        if(password_verify($password,$hash)){
            

            if(type=="ngo"){
                echo "<script> console.log(verify:);</script>";
                $_SESSION['username']= $row['username'];
                header("Location: ../ngo/home.html");
                echo "<h1><center>You Login...</center></h1>";
            }
            else{
                echo "<script> console.log(verify:);</script>";
                $_SESSION['username']= $row['username'];
                header("Location: ../home.html");
                echo "<h1><center>You Login...</center></h1>";
            }

        }
        else{
            $msg=true;
        }
    } else {
        $msg=true;
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/loginstyle.css">
    <link rel="stylesheet" href="formstyle.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>

<body>
    <style>
    .uil {

        top: 42%;
    }
    </style>
    <div class="container">
        <div class="regform">

            <form action=" " method="post">

                <p class="logo" style=""><b style="color:#230EBA; ">NourishNet</b></p>
                <p id="heading" style="padding-left: 1px;"> Welcome back ! <img src="" alt=""> </p>

                <div class="input">
                    <input type="email" placeholder="Email address" name="email" value="" required />
                </div>
                <div class="password">
                    <input type="password" placeholder="Password" name="password" id="password" required />

                    <!-- <i class="fa fa-eye-slash" aria-hidden="true" id="showpassword"></i> -->
                    <!--<i class="bi bi-eye-slash" id="showpassword"></i>-->
                    <i class="uil uil-eye-slash showHidePw"></i>
                    <!-- <p class="error">Password don't match.</p> -->
                    <?php
                    global $msg;
                    if($msg){
                        echo ' <i class="bx bx-error-circle error-icon"></i>';
                        echo '<p class="error">Password not match......</p>';
                    }
                    ?>
                
                </div>


                <div class="btn">
                    <button type="submit" name="sign"> Sign in</button>
                </div>
                
                <div class="signin-up">
                    <p id="signin-up">Don't have an account? <a href="signup.php">Register</a></p>
                </div>
            </form>
        </div>


    </div>
</body>

</html>
