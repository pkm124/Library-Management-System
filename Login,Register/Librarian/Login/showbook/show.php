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
    <title>Librarian | Available Books</title>
    <link rel="stylesheet" href="librarian.css">
    <link rel="icon" href="../logo.PNG" type="image/icon type">

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
            <div class="colnav"><a href="../account.php">Home</a></div>
            <div class="colnav"><a href="../add/lib.php">Add Books</a></div>
            <div class="colnav"><a href="../search/search.php">Book Search</a></div>
            <div class="colnav"><a href="../delete/delete.php">Book Delete</a></div>
            <div class="colnav"><a href="">Show Books</a></div>
            <div class="colnav"><a href="../userdata/data.php">Users</a></div>
            <div class="colnav"><a href="../logout.php">Logout</a></div>
        </div>
        <div class="row3">
        <?php
?>
<table id="customers">
    <?php
// Attempt select query execution
$i=1;
$sql = "SELECT * FROM books";
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

                //echo "<td>" . $row['id'] . "</td>";
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
    </div>

    <div class="col11">
    </div>

    </div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>