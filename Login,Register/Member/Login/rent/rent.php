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
    <title>Member | Rent Book</title>
    <link rel="icon" href="../logo.PNG" type="image/icon type">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet" />
    <link href="css/common.css" rel="stylesheet" />
    <link href="css/dashboard.css" rel="stylesheet" />
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
            <li class="breadcrumb-item active" aria-current="page">
                <a href="../dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="">Rent books</a>               
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="../available/available.php">Available books</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="../history/history.php">History</a>
            </li>
        </ol>
    </nav>

    <div style="padding: 50px 600px;">
        <h1>Rent&nbsp;Books</h1>
        <div class="row" style="padding-left:0px;">
        <form action="" method="POST">
            <input type="text" name="book_id" placeholder="Enter Book ID to Rent" value=""><br>
            <input type="submit" name="submit" value="Rent" class="btn">
        </form>

        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$bookid = $_POST['book_id'];


$query = "SELECT * FROM books where book_id=$bookid";
$data=mysqli_query($dbc,$query);
if($data=mysqli_fetch_row($data))
{
    echo "hi";
    if($result = mysqli_query($dbc, $query)){
        if(mysqli_num_rows($result) > 0){
            if(isset($_POST['submit'])){
                $book_id=$_POST['book_id'];
                $date=date('Y-m-d');
        
                $insertquery="INSERT INTO `rent`(`username`,`book_id`,`date`) VALUES ('$username','$book_id','$date')";
                $res=mysqli_query($dbc,$insertquery);
                if($res){
                    ?>
                    <script>
                        alert("Book Rented Successfully!!!");
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script>
                        alert("Book is not available in Library");
                    </script>
                    <?php
                }
            }
        
            // Free result set
            mysqli_free_result($result);
        } 
}
}
else
{
    ?>
                    <script>
                        alert("Book is not available in Library");
                    </script>
                    <?php
}
}


?>
        </div>
        
        </div>
        <div>
</div>
<br><br><br><br><br>
        
        <!-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb py-2" style="background-color: black; font-size:14px;">
            <li class="breadcrumb-item active" aria-current="page">
            ©
            </li>
        </ol>
</nav> -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>
