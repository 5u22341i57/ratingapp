<?php
        require 'dbh.inc.php';

        if (isset($_GET['delete_id'])) {
            $delete_id = $_GET['delete_id'];
            $sql = "DELETE FROM ratings WHERE idRatings='$delete_id'";
            $result = mysqli_query($conn, $sql);
            header("Location: ../yourlists.php");
        }