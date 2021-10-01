<!--
Here, we write code for registration.
-->
<?php
require_once('connection.php');
$title = $author = $isbn13 = $format = $publisher = $pages = $dimensions = $overview = '';

$title = $_POST['title'];
$author = $_POST['author'];
$isbn13 = $_POST['isbn13'];
$format = $_POST['format'];
$publisher = $_POST['publisher'];
$pages = $_POST['pages'];
$dimensions = $_POST['dimensions'];
$overview = $_POST['overview'];



$sql = "INSERT INTO bibliotheek (title, author, isbn13, format, publisher, pages, dimensions, overview) VALUES ('$title','$author','$isbn13','$format','$publisher','$pages', '$dimensions','$overview')";
$result = mysqli_query($conn, $sql);
// echo " last toegevoegd " . mysqli_insert_id($conn);
if ($result) {
	header("Location: toegevoegedbook.php?bibliotheekid=" . mysqli_insert_id($conn));
	// header("Location: toegevoegedbook.php");
} else {
	echo "Error :" . $sql;
}
?>