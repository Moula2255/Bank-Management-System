<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="w-50 m-5 bg-dark text-white">
            <h2 class="ms-5 pt-5 ps-5">Welcome to <span class="bg-danger">M</span>BANK</h2>
            <h2 class="ms-5 pt-2 ps-5">Login Page</h2>
            <label class="form-label m-2 mt-2 ps-3">Enter your mail id :</label>
            <input class="form-control w-50 ms-4" type="email" name="em">
            <label class="form-label m-2 ps-3">Enter your password :</label>
            <input class="form-control w-50 ms-4" type="password" name="pass">
            <p class="ps-4 pt-2">Don't Havve An Account <a href="register.php">create an account</a></p>
            <button class="btn btn-primary ms-5 mb-5" name="submit">Login</button>
        </form>
    </div>
</body>
</html>
<?php
session_start();
$conn=mysqli_connect('localhost','root','','moula');
if(isset($_POST['submit'])){
    $em =$_POST['em'];
    $pass =$_POST['pass'];
    $get="select * from mbank where email_id='$em' and pass='$pass'";
    $result=mysqli_query($conn,$get);
    if(mysqli_num_rows($result)==1){
        if($row=mysqli_fetch_array($result)){
            $us=$row['full_name'];
            $pass=$row['pass'];
            $bal=$row['a_bal'];
            $_SESSION['pass']=$pass;
            $_SESSION['bal']=$bal;
            $_SESSION['name']=$us;
            $_SESSION['email']=$em;
            header("location:index1.php");
        }
    }
else{
    echo "you have duplicate values";
}
}
?>
