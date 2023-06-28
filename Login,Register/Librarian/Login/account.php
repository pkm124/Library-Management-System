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
    <title>Librarian | Dashboard</title>
    <link rel="stylesheet" href="librarian.css">
    <link rel="icon" href="logo.PNG" type="image/icon type">
</head>
<body>
    <!-- <div class="mainrow">

    <div class="col1">
    </div> -->

    <div class="col2">
        <div class="row1">
            <img src="logo.jpeg" width="100%">
        </div>
        <div class="row2">
            <div class="colnav"><a href="">Home</a></div>
            <div class="colnav"><a href="add/lib.php">Add Books</a></div>
            <div class="colnav"><a href="search/search.php">Book Search</a></div>
            <div class="colnav"><a href="delete/delete.php">Book Delete</a></div>
            <div class="colnav"><a href="showbook/show.php">Show Books</a></div>
            <div class="colnav"><a href="userdata/data.php">Users</a></div>
            <div class="colnav"><a href="logout.php">Logout</a></div>
        </div>
        <div class="row3">
        <form action="login_process.php" method="POST">
           <p>Welcome! <span style="color: chocolate"><?php echo $username; ?></span></p>
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
            </form>
    </div>

    <!-- <div class="col11">
    </div> -->

    </div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>