<?php require_once("config.php");
        $userdata=$_GET['rn'];
        $query = "DELETE FROM rent WHERE username='$userdata'";
        $data=mysqli_query($dbc,$query);
        if($data)
        {
            ?>
            <script>
                alert("Record Deleted");
            </script>
            <?php
            header("location:data.php");
        }
        else{
            ?>
            <script>
                alert("Record not Deleted");
            </script>
            <?php
        }
        
?>
