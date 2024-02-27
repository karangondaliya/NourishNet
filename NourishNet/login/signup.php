<?php
session_start();
include "../connection.php";

$msg = 0;

if(isset($_POST['sign'])) {

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = $_POST['password']; // Plain text password
    $type = $_POST['user'];
    $mobile = $_POST['mobileno'];
    $username = $_POST['name'];
    $address = $_POST['address'];

    // Hash the password before storing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO login (username, email, Password, type, mobile, address) VALUES ('$username', '$email', '$hashed_password', '$type', '$mobile', '$address')";
    $query_run = mysqli_query($connection, $query);
    
    if($query_run) {
        header("location:signin.php");
        exit(); // Always exit after a header redirect
    } else {
        $msg = 1;
        echo '<script type="text/javascript">alert("Data not saved")</script>';
    }
}
?>

<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style/loginstyle.css">
    <link rel="stylesheet" href="formstyle.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    
</head>
<body style="background-color:#230EBA;">

    <div class="container">
    <div class="regform">
       
        <form action=" " method="post">
            <p class="logo"><b style="color: #230EBA;">NourishNet</b></p>
            
            <p id="heading">Create your account</p>

            <div class="input">
                <label for="cars">Choose a type:</label>
                <select name="user" id="cars">
                    <option value="restaurent">Restaurent</option>
                    <option value="ngo">NGO</option>
                    
                </select>
            </div>

            <div class="input">
                
                <label class="textlabel" for="name">User name</label><br>
                <input type="text" id="name" name="name" required/>

             </div>
             <div class="input">

                <label class="textlabel" for="email">Email</label>
                <input type="email" id="email" name="email" required/>

                <label class="textlabel" for="phoneno">Mobile No.</label>
                <input type="text" id="mobileno" name="mobileno" >

             </div>
             <label class="textlabel" for="password">Password</label>
             <div class="password">

                <input type="password" name="password" id="password" required/>
                <!-- <i class="fa fa-eye-slash" aria-hidden="true" id="showpassword"></i> -->
                <!-- <i class="bi bi-eye-slash" id="showpassword"></i>  -->
                <!-- <i class="uil uil-lock icon"></i> -->
                <i class="uil uil-eye-slash showHidePw" id="showpassword"></i>                
			
             </div>
             
             <div class="input">
                
                <label class="textlabel" for="address">Address</label><br>
                <input type="text" id="address" name="address" required/>

             </div>

             <div class="btn">
                <button type="submit" name="sign">Continue</button>
             </div>
            
           <!-- <button type="submit" style="background-color:white ;color: #000; margin-top:5px;  padding: 10px 25px;">
                 <img src="google.svg" style="width:22px" >
                 Continue With  Google </button>  -->
                
            <div class="signin-up">
                 <p style="font-size: 20px; text-align: center;">Already have an account? <a href="signin.php"> Sign in</a></p>
             </div>
         

        </form>
        </div>
        <!-- <div class="right">
            <img src="cover.jpg" alt="" width="800" height="700">
        </div> -->
       
    </div>
       
</body>
</html>
