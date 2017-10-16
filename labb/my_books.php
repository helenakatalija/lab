<?php include 'header.php'; ?>

	<?php

include("config.php");

?>


<h3>Your reserved books</h3>




<?php

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}


$query = " select ISBN, author, title from Book where onloan is true";

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

<?php include 'footer.php'; ?>

