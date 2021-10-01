<?php
// require_once("config/config.php");
include_once('header.php');
include_once('link.php');
require_once('connection.php');
?>


<div class="container">
    <div class="card-group">
        <div class='row'>
            <?php
            $sql = $conn->prepare("SELECT bibliotheekid, title, author, isbn13, format, publisher, pages, dimensions, overview FROM bibliotheek");
            if ($sql === false) {
                echo mysqli_error($conn);
            } else {
                $sql->bind_result($id, $title, $author, $isbn13, $format, $publisher, $pages, $dimensions, $overview);
                if ($sql->execute()) {
                    $sql->store_result();
                    while ($sql->fetch()) {
                        if ($pages == "") {
                            $pages = "undefined";
                        }
            ?>

                        <?php
                        $locationonclick = "' onclick='location.href=\"lenen.php?id=" . $id . "\"'";
                        ?>
                        <div class='col-md-3 '>
                            <div class='mr-2'>
                                <div class="row">
                                    <div class='card' <?php echo $locationonclick  ?>>
                                        <div class='card-body'>
                                            <h5 class='card-header'><?php echo $title ?></h5>
                                            <p class='card-text'>Author: <?php echo $author ?></p>
                                            <p class='card-text'>Pages: <?php echo $pages ?></p>

                                            <div class='read-more-place'>
                                                <button class='btn btn-primary btn-default'><b>Lenen</b></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>

            <?php
                    }
                }

                $sql->close();
            }

            ?>
        </div>
    </div>
</div>