<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
        <form action="" method="post" class="w-50 m-5 bg-dark text-white">
            <span class="h1 m-5"><i class="bi bi-arrow-left-circle-fill pt-5"></i></span>
           <h2 class="ms-5 pt-5 ps-5">Welcome to <span class="bg-danger">M</span>BANK</h2>
            <h2 class="ms-5 pt-2 ps-5">Register page </h2>
            <label class="form-label m-2 mt-2 ps-3">Enter your full name:</label>
            <input class="form-control w-50 ms-4" type="text" name="first">
            <label class="form-label m-2 mt-2 ps-3">Enter your mobile number :</label>
            <input class="form-control w-50 ms-4" type="text" name="num">
            <label class="form-label m-2 mt-2 ps-3">select your date of birth :</label>
            <input class="form-control w-50 ms-4" type="date" name="dob">
            <label class="form-label m-2 mt-2 ps-3">Enter your mail id :</label>
            <input class="form-control w-50 ms-4" type="email" name="em">
            <label class="form-label m-2 ps-3">Enter your password :</label>
            <input class="form-control w-50 ms-4" type="password" name="pass">
            <div class="form-check"><input class="form-check-input ms-0 mt-3" type="checkbox"><label class="form-label mt-2 ps-1">Accept terms & conditions.</label></div>
            <p class="text-secondary ps-4">*Initial depoist 10,000 mandotory</p>
            <button class="btn btn-primary ms-5 mb-5" name="submit">Sign up</button>
        </form>
    </div>
</body>
</html>
<?php
$conn=mysqli_connect('localhost','root','','moula');
if(isset($_POST['submit'])){
    $us = $_POST['first'];
    $num = $_POST['num'];
    $dob =$_POST['dob'];
    $em=$_POST['em'];
   $pass = $_POST['pass'];
   $bal=10000;
   $acc=strrev($num);
   $ins ="insert into mbank (A_c_no,full_name,m_num,dob,email_id,pass,a_bal) values('$acc','$us','$num','$dob','$em','$pass','$bal')";
   if(mysqli_query($conn,$ins)){
    echo "Account credited succesfully with depoist of 10,000";
   }
}
?>