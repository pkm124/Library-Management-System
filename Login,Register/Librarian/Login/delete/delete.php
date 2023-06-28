<?php require_once("config.php"); ?>
<html>
<head>
    <title>Librarian | Delete Book</title>
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
            <div class="colnav"><a href="">Book Delete</a></div>
            <div class="colnav"><a href="../showbook/show.php">Show Books</a></div>
            <div class="colnav"><a href="../userdata/data.php">Users</div>
            <div class="colnav"><a href="../logout.php">Logout</a></div>
        </div>
        <div class="row3">
        <form method="POST" action="">
  <br>
  <input type="text" name="bookid" placeholder="Enter Book ID to Delete">
  <input type="submit" value="Delete" class="btn">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$bookid = $_POST['bookid'];


$query = "DELETE FROM `books` WHERE book_id='$bookid'";
$data=mysqli_query($dbc,$query);
if($data)
{?>
    <script>alert("Book Deleted");</script>
<?php
}
else{
    echo "Book not Found to Delete";
}
}

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