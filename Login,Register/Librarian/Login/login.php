<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html>
    <head>
        <br>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.cssr"> 
        <link rel="stylesheet" href="login.css">
        <link rel="icon" href="logo.PNG" type="image/icon type">

    </head>
    <body>
        <form action="login_process.php" method="POST" class="login_box">
            <h1>Login</h1>
            <?php 
                if(isset($_GET['loginerror'])) {
                    $loginerror=$_GET['loginerror'];
                }
                if(!empty($loginerror)){  echo '<p class="errmsg">Invalid credentials</p>'; } 
            ?><br>
            <input type="text" name="login_var" value="<?php if(!empty($loginerror)){ echo  $loginerror; } ?>" required="" placeholder="Username/Email">
            <input type="password" name="password" required="" placeholder="Password">
            <button type="submit" name="sublogin" class="btn">Login</button>
        </form>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>