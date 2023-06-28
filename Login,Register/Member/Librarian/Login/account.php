<!DOCTYPE html>
<?php require_once("config.php");
if(!isset($_SESSION["login_sess"])) 
{
    header("location:login.php"); 
}
  $email=$_SESSION["login_email"];
  $findresult = mysqli_query($dbc, "SELECT * FROM librarian WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult))
{
$username = $res['username']; 
$fname = $res['fname'];   
$lname = $res['lname'];  
$email = $res['email'];  
}
 ?> 
<html>
<head>
    <title> My Account - Techno Smarter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="ahttps://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css1212"> 
    <link rel="stylesheet" href="librarian.css">
</head>
<body>
    <div class="mainrow">

    <div class="col1">
    </div>

    <div class="col2">
        <div class="row1"></div>
        <div class="row2">
            <div class="colnav"><a href="Login/account.php">Home</a></div>
            <div class="colnav">Add Books</div>
            <div class="colnav">Book Search</div>
            <div class="colnav">Book Update</div>
            <div class="colnav">Show Books</div>
            <div class="colnav">Users</div>
            <div class="colnav">Logout</div>
        </div>
        
    </div>

    <div class="col1">
    </div>

    </div>
     
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>