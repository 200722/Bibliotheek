<!--
ingeleverd boek
-->

<?php
session_start();
require_once('connection.php');
include_once('header.php');
include_once('link.php');
$id = "";
$br = "<br>";

//user
$id = $_SESSION['id'];
// action van url
$action = $_GET["action"];

// delete from the database 
if ($action == "delete") {
    //  echo "test";
    $deleteBookId = $_GET["bookid"];
    $query = "DELETE FROM `uitlenen` WHERE bookid = $deleteBookId";

    $result = mysqli_query($conn, $query) or die('Cannot delete data from database. ' . mysqli_error($conn));


    if ($result) {
        echo ' <span style="color:#AAA;text-align:center;">' . "Data deleted from database." . $br;
        // echo 'Data deleted from database.' . $br;


    }
}

$sql = $conn->prepare("select uitlenen.bookid, uitlenen.userId, uitlenen.datum, bibliotheek.title, bibliotheek.isbn13 FROM uitlenen inner join bibliotheek ON bibliotheek.bibliotheekid = uitlenen.bookid WHERE userId = " . $_SESSION['id']);

// echo $sql;

if ($sql === false) {
    echo mysqli_error($conn);
} else {
    $sql->bind_result($bookid, $userId, $datum, $title, $isbn13);
    if ($sql->execute()) {
        $sql->store_result();
        // var_dump($sql);
        while ($sql->fetch()) {
            // var_dump($datum);

            echo $bookid;
            echo " - ";
            echo $datum;
            echo "-" . $title;
            echo "-";
            echo "-" . $isbn13;
            echo "<button class='btn btn-default'><a href='inleverbook.php?action=delete&bookid=$bookid'>Inleveren</a></button>";
            echo $br;
        }
    }
}
