<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "trip";
$con = mysqli_connect($host,$user,$password,$dbname);
if (!$con){
 die("Could not connect to" . mysqli_connect_error());   
}
echo "Connection established";

$name = "nice";
if(isset($_POST['login'])){
    $uname = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    session_start();
    $_SESSION['is_login'] = true;
    $_SESSION['username'] = $uname;
    $_SESSION['password'] = $pass;
    if($uname == null || $uname == ''){
        header('Location: m_registration.php');
        echo "<script>alert('Bsdk');</script>";
        exit();
    }
    $sql = " INSERT INTO login_vms (Name,Email,Password) VALUES ('$uname','$email','$pass') ";
    $sql_2 = "SELECT * FROM login_vms where Email = '$email' "; 

    $result_2 = mysqli_query($con,$sql_2);
    if(mysqli_num_rows($result_2) == 1){
        echo"Email already exists";  
        $name = "nonice";
    }
    else{

        $result = mysqli_query($con,$sql);
            if($result){
                echo "\naccepted";
                $name = "nice";
                echo "<script>confirm('User Created');</script>";
                // header("Location: m_login.php");
            }
            else{    
                echo "\nfailed"; 
                $name = "nonice"; 
                session_destroy();
             }
    }
   
    
}


?>

<!Doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0">
    <link rel="stylesheet" href="../CSS/login.css">
    <script type="text/javascript" src="../JS/main.js"></script>
    <title>
        Login
    </title>
    
</head>
<body style="background-color:whitesmoke">
<!-- php to js interface -->
<input id = "disp" type = "hidden" value = "<?= $name  ?>">
<!--  end    -->
<div class="l-form">
            <form action="#" method ="POST" class="form">
                <h1 class="form__title">Register<br><span style="font-size:1.4rem">Fellow User &#9201;</span></h1>
                
                <div class="form__div">
                    <input type="text" class="form__input" name="name" placeholder="e.g xyz">
                    <label for="" class="form__label">Name</label>
                </div>

                <div class="form__div">
                    <input type="email" class="form__input" name="email" placeholder="e.g xyz@gmail.com">
                    <label for="" class="form__label">Email</label>
                </div>

                <div class="form__div">
                    <input type="password" class="form__input" name="password" placeholder="e.g xyz@1234">
                    <label for="" class="form__label">Password</label>
                </div>
                <div class = "form__msg"  style="display: block">
                    <code class = "form__msg__txt" id = "demo">User already exists.</code>
                </div>
                <input type="submit" class="form__button" value="Register" name="login" style="float:right" >
                <a href="m_login.php" style="float:left;background-color:white;color:#006eff;font-weight:bold;text-decoration:none;padding:1rem;">Go to Login</a>
                
            </form>
        </div>
        <script type="text/javascript">
        const x = document.getElementById("disp").value;
        console.log(x);
        if(x == "nice"){
      
        document.getElementById("demo").style.display = "none";
        }
        else{
      
        document.getElementById("demo").style.display = "block";
        }
    </script>

  

</body>
<script type="text/javascript">
        
    </script>

</html>

