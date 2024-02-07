
<?php session_start(); 
if(isset($_SESSION['email'])) :
            $a_bal = $_SESSION['bal'];  
             $a_no = $_SESSION['a_no'];
             ?>
            <?php endif ?> 
<?php
$err="";
$conn=mysqli_connect('localhost','root','','moula');
if($_SERVER['REQUEST_METHOD']=="POST"){
    if($_POST['num']>$a_bal){
        $err="Insufficent Funds";
    }
    else{
         $am = $_POST['num'];
    }
$when = $_POST['date'];
   $a_no = $_SESSION['a_no'];
   $us = $_POST['first'];
   if(!empty($am)){
    $res=$a_bal-$am;
   $up="update mbank set a_bal='$res' where A_c_no='$a_no'";
   if(mysqli_query($conn,$up)){
    header("location:index1.php");
   }
   }
    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdrawl page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="border border-dark bg-dark">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="w-50 border border-bottom text-white m-5" method="post">
        <div class="w-75 m-5">
        <h2 class="responsive">Withdrawl form</h2>
        <p class="h2">Available balance :<span class="text-success h2 ms-2"><?php echo $a_bal; ?></span></p>
            <label for="" class="form-label mt-2">Today date :</label>
        <input type="date" class="form-control bg-dark  text-white" name="date" value="<?php
date_default_timezone_set('Asia/Kolkata');
echo $currentTime = date('Y-m-d') ; ?>" disabled>
        <label for="one" class="form-label">Enter your A/c No :</label>
        <input type="text" class="form-control" id="one" name="ac_no" value="<?php echo $a_no ?>" disabled>
        <label for="two" class="form-label">Enter your full name :</label>
        <input type="text" class="form-control" id="two" name="first">
        <label for="three" class="form-label">Amount in words(Rupees) :</label>
        <input type="text" class="form-control" id="three" name="num">
        <span class="error"><?php echo $err; ?></span><br>
        <button class="btn btn-primary " name="submit">Withdrawl</button>
    </div>
    </form>
    </div>
    </div>
</body>
</html>
