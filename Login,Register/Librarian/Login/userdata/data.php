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
    <title>Librarian | User Data</title>
    <link rel="stylesheet" href="librarian.css">
    <script src="https://smtpjs.com/v3/smtp.js"></script>  
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
            <div class="colnav"><a href="../showbook/show.php">Show Books</a></div>
            <div class="colnav"><a href="">Users</a></div>
            <div class="colnav"><a href="../logout.php">Logout</a></div>
        </div>
        <div class="row3">
        <?php
?>
<table id="customers">
<?php
// Attempt select query execution
$i=1;
$sql = "SELECT * FROM users";
$query="select r.*,u.* from rent r, users u where (u.username=r.username)";
if($result = mysqli_query($dbc, $query)){
    if(mysqli_num_rows($result) > 0){
        //echo "<table>";
            echo "<tr>";
                echo "<th>Sr&nbsp;No.</th>";
                echo "<th>First&nbsp;Name</th>";
                echo "<th>Last&nbsp;Name</th>";
                echo "<th>Username</th>";
                echo "<th>Email</th>";
                echo "<th>Book&nbsp;ID</th>";
                echo "<th>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
                echo "<th>Delete</th>";
                echo "<th>Reminder</th>";
                echo "<th>Due&nbsp;Expired</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" .$i. "</td>";
                //echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['lname'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['book_id'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                $email=$row['email'];
                ?>
                <script>
                    var name = '<?=$email ?>';
                    console.log(name);
                </script>
                <?php
                echo "<td><a href='deleterent.php?rn=$row[username]'>Delete</a></td>";
                ?>
                <td><form method='post'>
                <input type='button' value='Send Email' onclick='sendEmail()'/>
            </form>
            <script type="text/javascript">
		function sendEmail() {
            /*e.preventDefault();
            const form = document.querySelector('.contact_form');
             name = document.querySelector('.name'); 
             email = document.querySelector('.email');
            msg = document.querySelector('.msg'); */
            var name = '<?=$email ?>';
                    console.log(name);
			Email.send({

				Host: "smtp.gmail.com",
				Username : "miniprojecthost989@gmail.com",
				Password : "Mini@123",
				//SecureToken : "aba7a08a-0077-41e6-9160-1970d8ffc5b2",
				To : name,
				From : "miniprojecthost989@gmail.com",
				Subject : "Reminder",
				Body : "Dear Member, ",
			})
			.then(function(message){
				alert("mail sent successfully")
			});
		}
	</script>
            
            
            
            
            </td>
            <td><form method='post'>
                <input type='button' value='Send Email' onclick='sendEmaill()'/>
            </form>
            <script type="text/javascript">
		function sendEmaill() {
            /*e.preventDefault();
            const form = document.querySelector('.contact_form');
             name = document.querySelector('.name'); 
             email = document.querySelector('.email');
            msg = document.querySelector('.msg'); */
            var name = '<?=$email ?>';
                    console.log(name);
			Email.send({

				Host: "smtp.gmail.com",
				Username : "miniprojecthost989@gmail.com",
				Password : "Mini@123",
				//SecureToken : "aba7a08a-0077-41e6-9160-1970d8ffc5b2",
				To : name,
				From : "miniprojecthost989@gmail.com",
				Subject : "Test Due",
				Body : "Test body2",
			})
			.then(function(message){
				alert("mail sent successfully")
			});
		}
	</script>
            
            
            
            
    </td>
            <?php
            echo "</tr>";
            $i++;
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No Records Found!!!";
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