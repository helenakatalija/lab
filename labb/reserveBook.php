<?php


include ("config.php");
include("header.php"); 


$bookid = trim($_GET['bookid']);
echo '<INPUT type="hidden" name="bookid" value=' . $bookid . '>';

$bookid = trim($_GET['bookid']);      
$bookid = addslashes($bookid);

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }
    
   echo "You are reserving book with the ID:"           .$bookid;


    $stmt = $db->prepare("UPDATE Book SET onloan=1 WHERE ISBN = ?");
    $stmt->bind_param('i', $bookid);
    $stmt->execute();
    printf("<br>Book Reserved!");
    printf("<br><a href=browse.php>Search for more Books </a>");
    printf("<br><a href=my_books.php>Return to Reserved Books </a>");
    printf("<br><a href=start.php>Return to home page </a>");
    exit;
    
?>

<?php include("footer.php"); ?>
