<?php require_once("config.php"); ?>
<html>
<head>
    <title>Librarian | Search Book</title>
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
            <div class="colnav"><a href="">Book Search</a></div>
            <div class="colnav"><a href="../delete/delete.php">Book Delete</a></div>
            <div class="colnav"><a href="../showbook/show.php">Show Books</a></div>
            <div class="colnav"><a href="../userdata/data.php">Users</a></div>
            <div class="colnav"><a href="../logout.php">Logout</a></div>
        </div>
        <div class="row3">
        <form action="" method="POST">
            <br>
            <input type="text" name="book_id" placeholder="Enter Book ID to Search" value="">
            <input type="submit" name="update" value="Search" class="btn">
        </form>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$bookid = $_POST['book_id'];


$query = "SELECT * FROM books where book_id=$bookid";
$data=mysqli_query($dbc,$query);
$i=1;
if($data=mysqli_fetch_row($data))
{
    if($result = mysqli_query($dbc, $query)){
        if(mysqli_num_rows($result) > 0){?>
            <table id="customers">
            <?php
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
        } 
}
}
else
{?>
    <script>
        alert("Book not Found!!!");
    </script>
    <?php
}

}

?>
    
    
    
    </div>

    <div class="col11">
    </div>

    </div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>