<?php session_start(); 
$conn=mysqli_connect('localhost','root','','moula');
$em=$_SESSION['email'];
$show="select * from mbank where email_id='$em'";
$get=mysqli_query($conn,$show);
if($row=mysqli_fetch_array($get)){
    $a_no=$row['A_c_no'];
    $a_bal=$row['a_bal'];
    $_SESSION['bal']=$a_bal;
    $_SESSION['a_no']=$a_no;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        .bn{
            padding-left:520px;
        }
        p{
            padding-left:490px;
        }
        </style>
</head>
<body>
    <header>
        <div class="row bg-dark text-white" style="height:200px">
            <div class="col-sm-12">
                <h2 class="pt-4 bn"><span class="bg-danger">M</span>BANK</h2>
                <p>Save Money Save Future</p>
            </div>
        </div>
          </header>   <h2>Welcome <?php if(isset($_SESSION['email'])) :
            echo $_SESSION['name'];  ?>
        </h2>
            <?php endif ?>


            <button class="btn btn-primary" type="button"><a href="withdrawl.php" class="text-white">Withdrawl</a></button>
            <button class="btn btn-primary" type="button"><a href="depoist.php" class="text-white">Depoist</a></button>
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample">
    check balance
  </button>
            <div class="collapse" id="collapseExample">
  <div class="card card-body">
  <p class="h2">Available balance :<span class="text-success h2 ms-2"><?php echo $a_bal; ?></span></p>
  </div>
</div>
</body>
</html>
