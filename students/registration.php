<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include 'plugins.php';?>
</head>

<body>
<div class="container">

    <?php include 'header.php';?>

    <div id="main">

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-group">
                <label for="txtName">Name:</label>
                <input class="form-control" type="text" name="txtname" id="txtname">
            </div>

                <div class="form-group">
                    <label>EMAIL:</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                
   
   
                    <div class="form-group">
                        <label for="txtName">PASSWORD:</label>
                        <input class="form-control" type="password" name="password" id="password">
                    </div>
                    
   
   
                        <div class="form-group">
                            <label for="txtName">CONFIRM PASSWORD:</label>
                            <input class="form-control" type="password" name="confirm" id="confirm">
                        </div>
   
                        <div class="form-group">
                            <label for="txtName">Class</label>
                            <input class="form-control" type="text" name="class" id="class">
                        </div>
   
   
                           <div class="form-group">
                            <label for="txtName">Contact No:</label>
                            <input class="form-control" type="text" name="contno" id="contno">
                        </div>
                        <div class="form.group">
                            <input class="btn btn-success" type="submit" value="register"
                            name="btn-register" id="btn-register">
                        </div>
                        
                    </form>


    
   
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
  {

  $servername="localhost";
    $username="root";
    $password="";
    $dbname="summertraining";

    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn)
    {
        die("connection failed".mysqli_connect_error());

    }
   
    $Sname = $_POST['txtname'];
    $Semail = $_POST['email'];
    $Spassword = $_POST['password'];
   // $Sconfirmpassword = $_POST['txtname'];
    $Sclass= $_POST['class'];
    $ScontactNo = $_POST['contno'];
    $sql="INSERT INTO studentsprofile(Sname,Semail,Spassword,Sclass,ScontactNo)
          VALUES ('$Sname','$Semail','$Spassword','$Sclass','$ScontactNo')";
     
    if(mysqli_query($conn,$sql))
    {
        echo "<script>swal('registration successful');</script>";
    }
    else
    {
        echo "Error :".mysqli_error($conn);
    }


   mysqli_close($conn);
}
   ?>
   </div>
   </div>
</body>

</html>