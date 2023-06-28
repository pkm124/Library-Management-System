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
    <title>Member | Available Books</title>
    <link rel="icon" href="../logo.PNG" type="image/icon type">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet" />
    <link href="css/common.css" rel="stylesheet" />
    <link href="css/dashboard.css" rel="stylesheet" />
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
            <li class="breadcrumb-item active" aria-current="page">
                <a href="../dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="../rent/rent.php">Rent books</a>               
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="">Available books</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="../history/history.php">History</a>
            </li>
        </ol>
    </nav>

    <div class="my-profile page-container">
        <h1 style="padding-left: 230px;">Available Books</h1>
        <div class="row">
        
    <table id="customers">
    <?php
// Attempt select query execution
$sql = "SELECT * FROM books";
$i=1;
if($result = mysqli_query($dbc, $sql)){
    if(mysqli_num_rows($result) > 0){
        //echo "<table>";
            echo "<tr>";
                echo "<th>Sr No.</th>";
                echo "<th>Book ID</th>";
                echo "<th>Title</th>";
                echo "<th>Author</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $row['book_id'] . "</td>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['author'] . "</td>";
            echo "</tr>";
            $i++;
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($dbc);
?>
</table>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>
