<?php  
			include 'config.php';
		?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>BookClub</title>
	</head>

<body>
	<div class="wrappper">
	<header>
		<ul class="main_menu">
			<li>
				<a class="<?php echo ($current_page == 'start.php' || $current_page == '') ? 'active' : NULL; ?>" href="start.php">Home</a>
			</li>
			<li>
				<a class="<?php echo ($current_page == 'about.php') ? 'active' : NULL; ?>" href="about.php">About</a>
			</li>
			<li>
				<a class="<?php echo $current_page == 'browse.php' ? 'active' : NULL; ?>" href="browse.php">Browse Books</a>
			</li>
			<li>
				<a class="<?php echo $current_page == 'my_books.php' ? 'active' : NULL; ?>" href="my_books.php">My Books</a>
			</li>
			<li>
				<a class="<?php echo $current_page == 'gallery.php' ? 'active' : NULL; ?>" href="login.php">Gallery</a>
			</li>
			<li>
				<a class="<?php echo $current_page == 'contact.php' ? 'active' : NULL; ?>" href="contact.php">Contact</a>
			</li>
		</ul>
	</header>
 
