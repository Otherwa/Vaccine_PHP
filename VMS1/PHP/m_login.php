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
    $email = $_POST['email'];
    $pass = $_POST['password'];

    session_start();
    $_SESSION['is_login'] = true;
    $_SESSION['username'] = $email;
    $_SESSION['password'] = $pass;

    $sql = "SELECT * FROM login_vms WHERE Email = '$email' AND Password = '$pass' limit 1";
    
    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result) == 1){
        echo "\naccepted";
        sleep(1);
        header('Location: m_userpage.php');
        $name = "nice";
    }
    else{    
        echo "\nfailed"; 
        $name = "nonice"; 
        session_destroy();
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
                <h1 class="form__title">Sign In<br><span style="font-size:1.4rem">Fellow User &#128512;</span></h1>
                <div class="form__div">
                    <input type="text" class="form__input" name="email" placeholder="e.g xyz@gmail.com">
                    <label for="" class="form__label">Email</label>
                </div>

                <div class="form__div">
                    <input type="password" class="form__input" name="password" placeholder="e.g xyz@123">
                    <label for="" class="form__label">Password</label>
                </div>
                <div class = "form__msg"  style="display: block">
                    <code class = "form__msg__txt" id = "demo">Invalid username or password.</code>
                </div>
                <input type="submit" class="form__button" value="Sign In" name="login" style="float:right" onclick="verify()">
                <input type="button" class="form__button form_create" value="Create account" style="float:left;background-color:white;color:#006eff;font-weight:bold" onclick="redirect()">
            </form>
        </div>



</body>
<script type="text/javascript">
        const x = document.getElementById("disp").value;
        console.log(x);
        if(x == "nice"){
      
        document.getElementById("demo").style.display = "none";
        }
        else{
      
        document.getElementById("demo").style.display = "block";
        }
      
    function redirect(){
        window.location.replace("m_registration.php","_self");
    }
    </script>
<?php
// session_destroy();
?>
</html>

