
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <?php include 'plugins.php';?>
    
    <style>
   h1{
       background-color:lightblue;
   }
   body{
       background-color:lightslategray;

   }
   
   </style>
   
    
   </head>
   <body>
   <div class="container">
   
    <?php include 'header.php';?>

    <?php
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="summertraining";
            //create connection
            $conn=mysqli_connect($servername,$username,$password,$dbname);
            //check connection
            if(!$conn){
                die("connection failed:" . mysqli_connect_error());
            }

            $regid="";
            $Sname="";
            $Semail="";
            $Sclass="";
            $ScontactNo="";
            
            $sql = "SELECT * FROM studentsprofile where regid=?";
            
            $stmt = $conn->stmt_init();
            $stmt->prepare($sql);
            $stmt->bind_param("i", $regID);
            $stmt->execute();
            $result = $stmt->get_result();
            $resultArray = $result->fetch_assoc();
            if($resultArray)
            {
                $Sname= $resultArray['Sname'];
                $Semail=  $resultArray['Semail'];
                $Sclass=  $resultArray['Sclass'];
                $ScontactNo= $resultArray['ScontactNo'];
            }
            else
            {
                echo "<script>swal('Updated Successfully');</script>";
            }
            
            mysqli_close($conn);
    ?>

    <div id="main">
    <form action="<?php $_SERVER['PHP_SELF'];?>" METHOD ="POST">
        <div class="form-group">
            <label for="txtRegID">RegID:</label>
            <input class="form-control" type="text" value='<?php echo $regid; ?>' name="txtRegID" id="txtRegID">
        </div>
        <div class="form-group">
            <label for="txtName">Name:</label>
            <input class="form-control" type="text" value='<?php echo $Sname; ?>' name="txtName" id="txtName">
        </div>
        <div class="form-group">
            <label for="Email">Email:</label>
            <input class="form-control" type="text" value='<?php echo $Semail; ?>' name="txtEmail" id="txtEmail">
        </div>
        <div class="form-group">
            <label for="class">Class:</label>
            <input class="form-control" type="text" value='<?php echo $Sclass; ?>' name="txtClass" id="txtClass">
        </div>
        <div class="form-group">
            <label for="contactno">Contact no:</label>
            <input class="form-control" type="text" value='<?php echo $ScontactNo; ?>' name="txtContact" id="txtContact">
        </div>
        <div class="form-group">
            <input type="submit" value="Update">
        </div>
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="summertraining";

            //create connection
            $conn=mysqli_connect($servername,$username,$password,$dbname);

            //check connection
            if(!$conn){
                die("connection failed:" . mysqli_connect_error());
            }

            $regid = $_POST['txtRegID'];
            $Sname=$_POST['txtName'];
            $Semail=$_POST['txtEmail'];
            $Sclass=$_POST['txtClass'];
            $ScontactNo=$_POST['txtContact'];

            $sql="update studentsprofile set Sname='$Sname', Semail='$Semail', Sclass='$Sclass', ScontactNo='$ScontactNo' where regid='$regid'";
            if (mysqli_query($conn,$sql))
            {
                echo "<script>swal('Record Updated.').then(() => {window.location.href='profile.php';});</script>";
            }
            else
            {
                echo"Error:" .mysqli_error($conn);
            }

        mysqli_close($conn);
    }
 
    ?>
    </div>

    <?php include 'footer.php';?>
    
    </div>
</body>
</html>