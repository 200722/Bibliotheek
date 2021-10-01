<?php
include_once('link.php');
include_once('header.php');

require_once('connection.php');
$sql = $conn->prepare("SELECT bibliotheekid, title, author, isbn13, format, publisher, pages, dimensions, overview FROM bibliotheek");
if ($sql === false) {
  echo mysqli_error($conn);
} else {
  $sql->bind_result($id, $title, $author, $isbn13, $format, $publisher, $pages, $dimensions, $overview);
  if ($sql->execute()) {
    $sql->store_result();
?>
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Dropdown button
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <?php
      while ($sql->fetch()) {
      ?>

        <a class="dropdown-item" href="?id=<?php echo $id; ?>"><?php echo $id; ?></a>
  <?php


      }
    }
  }
  ?>
  <nav class="nav flex-column">
    <?php
    $edit = $_GET["id"];
    ?>
    <p>Currently edditing: <?php echo $edit; ?></p>
    <a class="nav-link" href="updatebook.php?update=<?php echo $edit; ?>">Update</a>

  </nav>


  <?php

  if (isset($_GET['id'])) {

    $sql2 = $conn->prepare("SELECT `bibliotheekid`, `title`, `author`, `isbn13`, `format`, `publisher`, `pages`, `dimensions`, `overview` FROM `bibliotheek` WHERE id = " . $_GET['id']);

    if ($sql2 === false) {
      echo mysqli_error($conn);
    } else {
      $sql2->bind_result($id, $title, $author, $isbn13, $format, $publisher, $pages, $dimensions, $overview);
      if ($sql2->execute()) {
        $sql2->store_result();
      }
    }
  }
  ?>

  <div id="frmRegistration">
    <form class="form-horizontal" action="updatebook.php?id=<?php echo $_GET['id']; ?>" method="POST">
      <h1>Update book data</h1>
      <div class="form-group">

        <label class="control-label col-sm-2" for="title">Title:</label>
        <div class="col-sm-6">
          <input type="text" name="title" class="form-control" id="title" placeholder="Enter the title of your book" value='<?php echo $title; ?>'>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="author">Author:</label>
        <div class="col-sm-6">
          <input type="text" name="author" class="form-control" id="author" placeholder="author" value='<?php echo $author; ?>'>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="isbn13">Isbn:</label>
        <div class="col-sm-6">
          <input type="number" name="isbn13" class="form-control" id="isbn13" placeholder="Enter isbn" value='<?php echo $isbn13; ?>'>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="format">format:</label>
        <div class="col-sm-6">
          <input type="text" name="format" class="form-control" id="format" placeholder="format" value='<?php echo $format; ?>'>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="publisher">Publisher:</label>
        <div class="col-sm-6">
          <input type="text" name="publisher" class="form-control" id="publisher" placeholder="publisher" value='<?php echo $publisher; ?>'>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pages">Pages:</label>
        <div class="col-sm-6">
          <input type="number" name="pages" class="form-control" id="pages" placeholder="pages" value='<?php echo $pages; ?>'>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="dimensions">Dimensions:</label>
        <div class="col-sm-6">
          <input type="text" name="dimensions" class="form-control" id="dimensions" placeholder="dimensions" value='<?php echo $dimensions; ?>'>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="overview">Overview:</label>
        <div class="col-sm-6">
          <input type="text" name="overview" class="form-control" id="overview" placeholder="overview" value='<?php echo $overview; ?>'>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="update" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
  <?php

  ?>