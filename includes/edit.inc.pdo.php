<?php
require 'dbh.inc.php';


// Check if its a get request and if so, display the form
if (isset($_GET['edit_list'])) {  
  // Set the param variable
  $listNameRatings = $_GET['edit_list'];

  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  // Define query
  $stmt = $mysqli->prepare("SELECT * FROM ratings WHERE listNameRatings=?");
  // Bind the parameter
  $stmt->bind_param("s", $listNameRatings);
  // Execute the query
  $stmt->execute();
  // Fetch the result in an array
  $resultArray = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  // Check if the resulted array has data, else exit with a message
  if(!$resultArray){
    echo "No results";
    exit;
  } else {
      // Show the form
      ?>
      <form action="/" method="post" class="form-width-md">
        <div class="form-row">
          <?php foreach($resultArray as $row): ?>
            <div class="form-group col-md-3">
              <input class="form-control form-control-sm" type="text" name="idRatings" value="<?= $row['idRatings'] ?>">
            </div>
            <div class="form-group col-md-3">
              <input class="form-control form-control-sm" type="text" name="listNameRatings" value="<?= $row['listNameRatings'] ?>">
            </div>
            <div class="form-group col-md-3">
              <input class="form-control form-control-sm" type="text" name="itemRatings" value="<?= $row['itemRatings'] ?>">
            </div>
            <div class="form-group col-md-2">
              <input class="form-control form-control-sm" type="number" name="ratingRatings" value="<?= $row['ratingRatings'] ?>">
            </div>
          <?php endforeach; ?>
          <button class="btn btn-success btn-sm" type="submit" name="btn-update" id="btn-update">Update</button>
          <a class="btn btn-secondary btn-sm ml-3" role="button" href="yourlists.php">Cancel</a>
        </div>
      </form>
      <?php
  }
}


// Check if its a POST request

if (isset($_POST['btn-update'])) {

    $idRatings = $_POST['idRatings'];
    $listNameRatings = $_POST['listNameRatings'];
    $itemRatings = $_POST['itemRatings'];
    $ratingRatings = $_POST['ratingRatings'];
    

    $update = "UPDATE ratings SET listNameRatings=?, itemRatings=?, ratingRatings=? WHERE idRatings=?";
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // Define query
    $stmt = $mysqli->prepare("SELECT * FROM ratings WHERE listNameRatings=?");
    // Bind the parameter
    $stmt->bind_param("sssi", $listNameRatings, $itemRatings, $ratingRatings, $idRatings);
    // Execute the query
    $stmt->execute();

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    // Redirect
    header("Location: ../yourlists.php?edit=success");
    exit();
}