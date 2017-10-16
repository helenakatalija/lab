<?php 
include 'header.php'; 

include("config.php");

?>

<?php

            if (isset($totalcount)) {
                if ($totalcount == 0) {
                    echo '<h2>You got it wrong. You can\'t break in here!</h2>';
                } else {
                    echo '<h2>Welcome! Correct password.</h2>';
                    echo '<a href ="gallery.php">Welcome to the gallery</a>';
                }
            }
            ?>
<br>

<form method="POST" >
    <input type="text" name="username" placeholder="Username"><br><br>
    <input type="password" name="userpass" placeholder="Password"><br>
    <input type="submit" value="Go">
</form>


  <?php include 'footer.php'; ?>

