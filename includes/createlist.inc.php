<?php
if (isset($_POST['createlist-submit'])) {

    require 'dbh.inc.php';

    session_start();
    $user = $_SESSION['userId'];
    $listNameRatings = $_POST['listNameRatings'];
    $itemRatings = $_POST['itemRatings[]'];
    $ratingRatings = $_POST['ratingRatings[]'];

    if (empty($listNameRatings)) {
        header("Location: ../createlist.php?error=emptyfield");
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9 .,_'\"!?()+\/@#$%^&*=:;<>|{}-]*$/", $listNameRatings)) {
        header("Location: ../createlist.php?error=invalidlistNameRatings=".$listNameRatings);
        exit();
    }
    else {
        foreach( $_POST['itemRatings'] as $key => $value ) {
            $itemRatings = $value;
            $ratingRatings = $_POST['ratingRatings'][ $key ];

            if (!preg_match('/^([1-9]|10)$/', $ratingRatings)) {
                header("Location: ../createlist.php?error=invalidratingRatings");
                exit();

            }
            else if (!preg_match("/^[a-zA-Z0-9 .,_'\"!?()+\/@#$%^&*=:;<>|{}-]*$/", $itemRatings)) {
                header("Location: ../createlist.php?error=invaliditemRatings=".$itemRatings);
                exit();
            }
            else {

                $sql = "INSERT INTO ratings (idUsersRatings, listNameRatings, itemRatings, ratingRatings) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../createlist.php?error=sqlerror");
                    exit();
                }
                else {
                    
                    mysqli_stmt_bind_param($stmt, "ssss", $user, $listNameRatings, $itemRatings, $ratingRatings);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../yourlists.php?createlist=success");
                }

            }

            
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../index.php");
    exit();
}