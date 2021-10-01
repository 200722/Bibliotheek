<!--
Here, we write code for toevoegen van een boek.
-->
<?php
include_once('header2.php');
include_once('link.php');
require_once('connection.php');
$title = $author = $isbn13 = '';

// var_dump($_POST);
$id = $_GET["bibliotheekid"];

// exit;
$sql = "SELECT * FROM bibliotheek WHERE bibliotheekid='$id' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$id = $row["bibliotheekid"] . " ";
		$title = $row["title"] . " ";
		$author = $row["author"] . " ";
		$isbn13 = $row["isbn13"];
		session_start();
		$_SESSION['bibliotheekid'] = $id;
		$_SESSION['isbn13'] = $isbn13;
		echo $id . $title . $author . $isbn13;
	}
}

?>