<!--
form add a book
-->
<?php
include_once('header.php');
include_once('link.php');
?>

<div id="frmRegistration">
  <form class="form-horizontal" action="boektoevoegen.php" method="POST">
    <h1>book data</h1>
    <div class="form-group">
      <label class="control-label col-sm-2" for="title">Title:</label>
      <div class="col-sm-6">
        <input type="text" name="title" class="form-control" id="title" placeholder="Enter the title of your book">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="author">Author:</label>
      <div class="col-sm-6">
        <input type="text" name="author" class="form-control" id="author" placeholder="author">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="isbn13">Isbn:</label>
      <div class="col-sm-6">
        <input type="number" name="isbn13" class="form-control" id="isbn13" placeholder="Enter isbn">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="format">format:</label>
      <div class="col-sm-6">
        <input type="text" name="format" class="form-control" id="format" placeholder="format">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="publisher">Publisher:</label>
      <div class="col-sm-6">
        <input type="text" name="publisher" class="form-control" id="publisher" placeholder="publisher">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pages">Pages:</label>
      <div class="col-sm-6">
        <input type="number" name="pages" class="form-control" id="pages" placeholder="pages">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="dimensions">Dimensions:</label>
      <div class="col-sm-6">
        <input type="text" name="dimensions" class="form-control" id="dimensions" placeholder="dimensions">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="overview">Overview:</label>
      <div class="col-sm-6">
        <input type="text" name="overview" class="form-control" id="overview" placeholder="overview">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="create" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>