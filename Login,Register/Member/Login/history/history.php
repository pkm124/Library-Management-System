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
    <title>Member | Rented Books</title>

    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet" />
    <link href="css/common.css" rel="stylesheet" />
    <link href="css/dashboard.css" rel="stylesheet" />
    <link rel="icon" href="../logo.PNG" type="image/icon type">
</head>

<body>
<div class="header sticky-top" style="background-color:whitesmoke;">
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
                        <a class="nav-link" href="../dashboard.php">
                            <i class="fas fa-user"></i>Dashboard
                        </a>
                    </li>
                    <div class="nav-vl"></div>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">
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
            <!-- <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li> -->
            <li class="breadcrumb-item active" aria-current="page">
                <a href="../dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="../rent/rent.php">Rent books</a>               
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="../available/available.php">Available books</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="">History</a>
            </li>
        </ol>
    </nav>

    <div class="my-profile page-container">
        <h1 style="text-align:center;">History</h1>
        <div class="row">
        
    <table id="customers">
        <tr>
            <th>Sr No.</th>
            <th>Username</th>
            <th>Date</th>
            <th>Book ID</th>
            <th>Title</th>
            <th>Author</th>
</tr>
        <?php
            //$queryy="select r.username from rent r where '$username'=r.username";
            //$resultt=mysqli_query($dbc,$queryy);
            //$row=mysqli_fetch_assoc($resultt);
            //$user=$row['username'];
            $query="select r.*,b.book_id,b.title,b.author from rent r, books b where ('$username'=r.username)&&(r.book_id=b.book_id)";
            $result=mysqli_query($dbc,$query);
            //echo $row['username'];
            //while($row=mysqli_fetch_assoc($result))
            $i=1;
            while($row=mysqli_fetch_assoc($result))
            {
                ?>
                <tr>
                <td><?php echo $i?></td>
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['date']?></td>
                <td><?php echo $row['book_id']?></td>
                <td><?php echo $row['title']?></td>
                <td><?php echo $row['author']?></td>
            </tr>
                <?php
                $i++;
            }
?>
</table>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>
