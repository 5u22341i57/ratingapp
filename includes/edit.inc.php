<?php
        //Get and display data
        if (isset($_GET['edit_list'])) {

            require 'dbh.inc.php';

            $listNameRatings = $_GET['edit_list'];

            echo '
                <form method="post" class="form-width-md">
                    
                    <div class="form-row">';

            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

            $sql = "SELECT * FROM ratings WHERE listNameRatings=?";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../yourlists.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "s", $listNameRatings);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $sql);
                $result = mysqli_stmt_get_result($stmt);
                
                //Create array

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="form-group col-md-3"><input class="form-control form-control-sm" type="text" name="idRatings" value="'.$row['idRatings'].'"></div>';
                    echo '<div class="form-group col-md-3"><input class="form-control form-control-sm" type="text" name="listNameRatings" value="'.$row['listNameRatings'].'"></div>';
                    echo '<div class="form-group col-md-3"><input class="form-control form-control-sm" type="text" name="itemRatings" value="'.$row['itemRatings'].'"></div>';
                    echo '<div class="form-group col-md-2"><input class="form-control form-control-sm" type="number" name="ratingRatings" value="'.$row['ratingRatings'].'"></div>';
                }
            }
        }

            echo '
                </div>
                <button class="btn btn-success btn-sm" type="submit" name="btn-update" id="btn-update">Update</button>
                    <a class="btn btn-secondary btn-sm ml-3" role="button" href="yourlists.php">Cancel</a>
                    </div>
                </form>';

        // Update info

        if (isset($_POST['btn-update'])) {

            $idRatings = $_POST['idRatings'];
            $listNameRatings = $_POST['listNameRatings'];
            $itemRatings = $_POST['itemRatings'];
            $ratingRatings = $_POST['ratingRatings'];
            

            $update = "UPDATE ratings SET listNameRatings=?, itemRatings=?, ratingRatings=? WHERE idRatings=?";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $update)) {
                header("Location: ../yourlists.php?error=sqlerror");
                exit();
            }
            else
            {
                //Loop through array to update each row

                foreach ($row as $id) {
                    mysqli_stmt_bind_param($stmt, "sssi", $listNameRatings, $itemRatings, $ratingRatings, $idRatings);
                    mysqli_stmt_execute($stmt, [$idRatings => $id]);
                }
                header("Location: ../yourlists.php?edit=success");
                exit();
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }