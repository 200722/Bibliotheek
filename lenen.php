<!-- lennen book -->
<?php
session_start();
require_once('connection.php');
include_once('header.php');
include_once('link.php');
$bookid = $datum = $id = "";
//book
$bookid = $_GET['id'];
//user
$id = $_SESSION['id'];

// echo $bookid;
// echo $_SESSION['id'];
// exit;

$sql = "INSERT INTO `uitlenen` (`bookid`,`userId`, `datum`) VALUES ('" . $bookid . "','" . $id . "', '2021-09-30')";
$result = mysqli_query($conn, $sql);
if ($result) {
	echo "gelukt";
} else {
	echo " ";
	echo " Je hebt dit boek uitgeleend. Kies een andere boek of kun je hem inleveren via dit knop";
}

echo '<button type="button"><a href="inleverbook.php?action=delete&bookid=' . $bookid . '">inleverbook</a></button>';
