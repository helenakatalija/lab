<?php include 'header.php'; ?>

<?php 
	$name = mysqli_real_escape_string($_GET['name']);
    $subject = mysqli_real_escape_string($_GET['subject']);
    $message = mysqli_real_escape_string($_GET['message']);

?>

<div class="main_content">
	<form method="GET">
		<p>Name</p>
		<input type="text" name="name">

		<p>Subject</p>
		<input type="text" name="subject">

		<p>Message</p>
		<textarea rows="6" cols="50" name="message"></textarea>
		<br>
		<input type="submit" value="Send">
	</form>

</div>

<?php include 'footer.php'; ?>