<?php

$url = $_SERVER ['REQUEST_URI'];
$strings = explode('/', $url);
$current_page = end($strings);


$dbname = 'labb3';
$dbuser = 'root';
$dbpass = 'root';
$dbserver = 'localhost';


@ $db = new mysqli('localhost', 'root', 'root', 'labb3');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=start.php>Return to home page </a>");
    exit();
}



if (isset($_POST['username'], $_POST['userpass'])) {

    $uname = mysqli_real_escape_string($db, $_POST['username']);
    
    $upass = sha1($_POST['userpass']);
    
    // echo "SELECT * FROM user WHERE username = '{$uname}' "."AND userpass = '{$upass}'";
    $query = ("SELECT * FROM user WHERE username = '{$uname}' "."AND userpass = '{$upass}'");
       
    
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->store_result(); 
    
    $totalcount = $stmt->num_rows();
    
}

?>