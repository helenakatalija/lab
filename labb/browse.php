<?php include("config.php");
$title = "Search books";
include("header.php"); ?>

<?php 
#prevent from running script in our forms Ex:( <script>alert("Spam");</script> )
    $stitle = htmlentities($_POST['searchtitle']); 
    $sauthor = mysqli_real_escape_string($_POST['searchauthor']);


    // echo "SELECT * FROM Book WHERE searchtitle = '{$stitle}' "."AND searchauthor = '{$sauthor}'";
    // $query = ("SELECT * FROM Book WHERE searchtitle = '{$stitle}' "."AND searchauthor = '{$sauthor}'");
?>

	<form action="browse.php" method="POST">
		<p>Title</p>
		<input type="text" name="searchtitle">

		<p>Author</p>
		<input type="text" name="searchauthor">
		<br>
		<input type="submit" value="Search" name="submit">
	</form>

	<br>

<h3>Book List</h3>
<hr>
<?php


$searchtitle = "";
$searchauthor = "";

if (isset($_POST) && !empty($_POST)) {

    $searchtitle = trim($_POST['searchtitle']);
    $searchauthor = trim($_POST['searchauthor']);
}


$searchtitle = addslashes($searchtitle);
$searchauthor = addslashes($searchauthor);

# Open the database
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}



$query = " select ISBN, author, title, onloan from Book";
if ($searchtitle && !$searchauthor) { // Title search only
    $query = $query . " where title like '%" . $searchtitle . "%'";
}
if (!$searchtitle && $searchauthor) { // Author search only
    $query = $query . " where author like '%" . $searchauthor . "%'";
}
if ($searchtitle && $searchauthor) { // Title and Author search
    $query = $query . " where title like '%" . $searchtitle . "%' and author like '%" . $searchauthor . "%'"; // unfinished
}


    $stmt = $db->prepare($query);
    $stmt->bind_result($bookid, $author, $title, $onloan);
    $stmt->execute();

    echo $query;    

    echo '<table bgcolor="#dddddd" cellpadding="6">';
    echo '<tr><b><td>ID</td> <td>Title</td> <td>Author</td> <td>Reserved?</td><td>Reserve</td> </b> </tr>';
    while ($stmt->fetch()) {
        echo "<tr>";
        echo "<td> $bookid </td><td> $title </td><td> $author </td><td> $onloan </td>";
        echo '<td><a href="reserveBook.php?bookid=' . urlencode($bookid) . '"> Reserve </a></td>';
        echo "</tr>";
    }
    echo "</table>";
    ?>
    
<br>
<br>

<?php include 'footer.php'; ?>