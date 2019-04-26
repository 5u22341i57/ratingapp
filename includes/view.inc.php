<?php

        if (isset($_GET['view_list'])) {
            require 'dbh.inc.php';

            $listname = $_GET['view_list'];

            $sql = "SELECT * FROM ratings WHERE listNameRatings='$listname';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            echo "
            <h1>".$_GET['view_list']."</h1>
            <table>
                    <tbody>
                        <tr>
                            <th>Item</th>
                            <th>Rating</th>
                        </tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['itemRatings'] . "</td>";
                echo "<td>" . $row['ratingRatings'] . "</td>";
                echo "</tr>";
            }

            echo "</tbody>
            </table>";

            mysqli_close($conn);
        }
        
    