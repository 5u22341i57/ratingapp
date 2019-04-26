<?php
    if (isset($_SESSION['userId'])) {

        require 'dbh.inc.php';

        $sql = "SELECT listNameRatings FROM ratings WHERE idUsersRatings='$_SESSION[userId]' GROUP BY listNameRatings";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                    <tr>
                        <td><a href="view.php?view_list='.$row['listNameRatings'].'">'.$row['listNameRatings'].'</a></td>
                        <td><a class="text-secondary ml-3" role="button" href="edit.php?edit_list='.$row['listNameRatings'].'">Edit</a></td>
                        <td>
                            <a class="text-danger ml-2" role="button" href="yourlists.php?delete_list='.$row['listNameRatings'].'">Delete</a>
                        </td>
                    </tr>';
            }
        }

        if (isset($_GET['delete_list'])) {
            $delete_listname = $_GET['delete_list'];
            $sql = "DELETE FROM ratings WHERE listNameRatings='$delete_listname'";
            $result = mysqli_query($conn, $sql);
            header("Location: ../yourlists.php?delete=success");
            exit();
        }

        mysqli_close($conn);
    } else {
        header("Location: ../index.php?error=notloggedin");
    }