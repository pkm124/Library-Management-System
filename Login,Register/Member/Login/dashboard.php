<?php require_once("config.php");
if(!isset($_SESSION["login_sess"])) 
{
    header("location:login.php"); 
}
  $email=$_SESSION["login_email"];
  $findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult))
{
$username = $res['username']; 
$fname = $res['fname'];   
$lname = $res['lname'];  
$email = $res['email'];  
}
 ?> 
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member | Dashboard</title>

    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet" />
    <link href="css/common.css" rel="stylesheet" />
    <link href="css/dashboard.css" rel="stylesheet" />
    <link rel="icon" href="../logo.PNG" type="image/icon type">

</head>

<body>
<div class="header sticky-top" style="background-color: whitesmoke;">
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="index.html">
                <img src="logo1.png" style="box-shadow: 5px 5px 5px #ccc; border-radius: 7px; width: 130px;" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#my-navbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="my-navbar">
                <ul class="navbar-nav">
                    <div class='nav-name'>
                        Hi, <?php echo $fname; ?>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            <i class="fas fa-user"></i>Dashboard
                        </a>
                    </li>
                    <div class="nav-vl"></div>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="fas fa-sign-out-alt"></i>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div id="loading">
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb py-2" style="background-color: grey; font-size:14px;">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="rent/rent.php">Rent books</a>               
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="available/available.php">Available books</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="history/history.php">History</a>
            </li>
        </ol>
    </nav>

    <div class="my-profile page-container" style="background-color: whitesmoke;">
        <h1>My Profile</h1>
        <div class="row">
            <div class="col-md-3 profile-img-container">
                <i class="fas fa-user profile-img"></i>
            </div>
            <div class="col-md-9">
                <div class="row no-gutters justify-content-between align-items-end">
                    <div class="profile">
                    <p>Welcome! <span style="color:#33CC00"><?php echo $username; ?></span></p>
           <table id="customers">
          <tr>
              <th>First Name </th>
              <td><?php echo $fname; ?></td>
          </tr>
          <tr>
              <th>Last Name </th>
              <td><?php echo $lname; ?></td>
          </tr>
          <tr>
              <th>Username </th>
              <td><?php echo $username; ?></td>
          </tr>
           <tr>
              <th>Email </th>
              <td><?php echo $email; ?></td>
          </tr>
        </table>
                    
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>
