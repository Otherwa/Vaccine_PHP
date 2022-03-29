<?php
session_start();
// echo  $_SESSION['username'] ;
if (isset($_SESSION['username']) != null) {
    // echo  $_SESSION['username'] ;
    // echo $_SESSION['password'];
}
else{
    sleep(1);
    header('Location: m_login.php');
    
}
?>
<!Doctype html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0">
    <link rel="stylesheet" href="../CSS/userpage.css">
    <script type="text/javascript" src="../JS/main.js"></script>
<head>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0">
    <link rel="stylesheet" href="../CSS/userpage.css">
    <script type="text/javascript" src="../JS/main.js"></script>
    <title>
        Login
    </title>
</head>
<body>
<!-- nav -->
    <div class="sidebar">
      <a class="active" href="#home">Dashboard</a>
      <a href="#news">Vaccines</a>
      <a href="#contact">Management</a>
      <a href="#about">Records</a>
    </div>


    <div class="content">
    <p>Nothing to see here.</p>
    <p><?php echo $_SESSION['username']; ?></p>
    <p>Welcome.</p>
    <a href="logout.php"  style="float:left;background-color:white;color:#006eff;font-weight:bold;text-decoration:none;">Logout<a>
    </div>
</body>
</html>
<?php
session_destroy();
?>