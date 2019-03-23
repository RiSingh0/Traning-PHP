<?php
//start the session
session_start();

?>
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
    <script src="//static.surfe.pro/js/net.js"></script>
<ins class="surfe-be" data-sid="1605"></ins> 
<script>(adsurfebe = window.adsurfebe || []).push({});</script>

    <script src="//static.surfe.pro/js/net.js"></script>
<ins class="surfe-be" data-sid="1605"></ins> 
<script>(adsurfebe = window.adsurfebe || []).push({});</script>

    <script src="//static.surfe.pro/js/net.js"></script>
<ins class="surfe-be" data-sid="1605"></ins> 
<script>(adsurfebe = window.adsurfebe || []).push({});</script>

    <script src="//static.surfe.pro/js/net.js"></script>
<ins class="surfe-be" data-sid="1605"></ins> 
<script>(adsurfebe = window.adsurfebe || []).push({});</script>

    <script src="//static.surfe.pro/js/net.js"></script>
<ins class="surfe-be" data-sid="1605"></ins> 
<script>(adsurfebe = window.adsurfebe || []).push({});</script>

    <script src="//static.surfe.pro/js/net.js"></script>
<ins class="surfe-be" data-sid="1605"></ins> 
<script>(adsurfebe = window.adsurfebe || []).push({});</script>

    <script src="//static.surfe.pro/js/net.js"></script>
<ins class="surfe-be" data-sid="1605"></ins> 
<script>(adsurfebe = window.adsurfebe || []).push({});</script>

    <script src="//static.surfe.pro/js/net.js"></script>
<ins class="surfe-be" data-sid="1605"></ins> 
<script>(adsurfebe = window.adsurfebe || []).push({});</script>

    <script src="//static.surfe.pro/js/net.js"></script>
<ins class="surfe-be" data-sid="1605"></ins> 
<script>(adsurfebe = window.adsurfebe || []).push({});</script>

    <script src="//static.surfe.pro/js/net.js"></script>
<ins class="surfe-be" data-sid="1605"></ins> 
<script>(adsurfebe = window.adsurfebe || []).push({});</script>

    <script src="//static.surfe.pro/js/net.js"></script>
<ins class="surfe-be" data-sid="1605"></ins> 
<script>(adsurfebe = window.adsurfebe || []).push({});</script>

    <script src="//static.surfe.pro/js/net.js"></script>
<ins class="surfe-be" data-sid="1605"></ins> 
<script>(adsurfebe = window.adsurfebe || []).push({});</script>

    <script src="//static.surfe.pro/js/net.js"></script>
<ins class="surfe-be" data-sid="1605"></ins> 
<script>(adsurfebe = window.adsurfebe || []).push({});</script>
    <div id="main">
    
    <form action="<?php $_SERVER['PHP_SELF'];?>" METHOD ="POST">
        <div class="form-group">
            <label for="Email">Email:</label>
            <input class="form-control" type="text" name="email" id="Email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input class="form-control" type="password" name="password" id="password">
        </div>
        <div class="form-group">
            <input type="submit" value="login">
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

            $Semail=$_POST['email'];
            $Spassword=$_POST['password'];
            
            $sql = "SELECT * FROM studentsprofile where Semail=? and Spassword=?";
            
            $stmt = $conn->stmt_init();
            $stmt->prepare($sql);
            $stmt->bind_param("ss", $Semail,$Spassword);
            $stmt->execute();
            $result = $stmt->get_result();
           $resultArray = $result->fetch_assoc();
            if($resultArray)
            {   //here session variable is created
                //student id is the key of the session
                //regid is the value for the session with key studentid
                $_SESSION['studentID'] = $resultArray['RegID'];
                header("Location:welcome.php");
            }
            else
            {
                echo "Invalid Login credentials.";
            }
            
            mysqli_close($conn);

        }
    ?>

    </div>

    <?php include 'footer.php';?>
    
    </div>
</body>
</html>