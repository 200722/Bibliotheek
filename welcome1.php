<!--
Into this file, we create a layout for welcome page.
-->

<?php
include_once('link.php');
include_once('header1.php');
require_once('connection.php');

$id = $_SESSION['bibliotheekid'];
$title = $author = $isbn13 = $format = $publisher = $pages = $dimensions = $overview = '';
$sql = "SELECT * FROM bibliotheek WHERE bibliotheekid='$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
                $title = $_POST['title'];
                $author = $_POST['author'];
                $isbn13 = $_POST['isbn13'];
                $format = $_POST['format'];
                $publisher = $_POST['publisher'];
                $pages = $_POST['pages'];
                $dimensions = $_POST['dimensions'];
                $overview = $_POST['overview'];
        }
}

// echo""

?>
<div class="jumbotron">
        <center>
                <h1>Welcome <?php echo $title; ?></h1>
        </center>
</div>