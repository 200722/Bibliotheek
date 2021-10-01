<!--
in this file we write code for connection with database.
-->
<?php
// session_start();
$conn = mysqli_connect("localhost", "root", "", "opdracht1-bib");

if (!$conn) {
	echo "Database connection faild...";
}
?>