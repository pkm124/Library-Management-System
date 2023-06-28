<?php require_once("config.php"); ?>
<html>
<head>
    <title>Librarian | Add Books</title>
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
            <div class="colnav"><a href="">Add Books</a></div>
            <div class="colnav"><a href="../search/search.php">Book Search</a></div>
            <div class="colnav"><a href="../delete/delete.php">Book Delete</a></div>
            <div class="colnav"><a href="../showbook/show.php">Show Books</a></div>
            <div class="colnav"><a href="../userdata/data.php">Users</a></div>
            <div class="colnav"><a href="../logout.php">Logout</a></div>
        </div>
        <div class="row3">
        <form action="" method="POST">
        <br>
            <input type="text" name="book_id" placeholder="Enter Book ID" value="" class="input">
            <input type="text" name="title" placeholder="Enter Title" value="" class="input">
            <input type="text" name="author" placeholder="Enter Author Name" value="" class="input">
            <input type="submit" name="submit" value="Add Book" class="btn">
        </form>
    </div>

    <div class="col11">
    </div>

    </div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
<?php
    if(isset($_POST['submit'])){
        $book_id=$_POST['book_id'];
        $title=$_POST['title'];
        $author=$_POST['author'];

        $insertquery="INSERT INTO `books`(`book_id`, `title`, `author`) VALUES ('$book_id','$title','$author')";
        $res=mysqli_query($dbc,$insertquery);
        if($res){
            ?>
            <script>
                alert("Book Added Successfully!!!");
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Book Not Added!!!");
            </script>
            <?php
        }
    }
?>