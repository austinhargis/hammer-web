<?php
    global $connection;
    include_once "connection.php";

//    echo session_id();
//    if (session_status() === PHP_SESSION_NONE) {
//        header('Location: ./login.php');
//    }

?>

<html lang="en">

    <head>
        <title>hammer</title>
    </head>

    <body>
        <?php
            include_once "./navigation_bar.php";
        ?>

        <div class="home_features">
            <h3>Checkout</h3>
            <a href="check_in.php">Check In</a>
            <a href="check_out.php">Check Out</a>
            <a href="check_out_view_all.php">View All Checkouts</a>

            <h3>Locations</h3>
            <a href="location_create.php">Create Location</a>
            <a href="location_manage.php">Manage Location</a>

            <h3>Message of the Day</h3>
            <a href="motd_create.php">Create MOTD</a>
            <a href="motd_manage.php">Manage MOTD</a>

            <h3>Records</h3>
            <a href="record_create.php">Create Record</a>
            <a href="record_manage.php">Manage Record</a>

            <h3>Users</h3>
            <a href="user_create.php">Create User</a>
            <a href="user_view_specific.php">View User</a>
            <a href="user_view_all.php">View All Users</a>
        </div>

        <div class="information_table">
            <table>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publish Date</th>
                    <th>Type</th>
                </tr>
                <?php

                $query = "SELECT * FROM item_record";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $author = $row['author'];
                    $publish_date = $row['publish_date'];
                    $type = $row['type'];

                    echo <<<_END
                        <tr onclick="window.location='expanded_info.php?id=$id'">
                            <td>$title</td>
                            <td>$author</td>
                            <td>$publish_date</td>
                            <td>$type</td>
                        </tr>

_END;
                }
                ?>
            </table>
        </div>



    </body>

    <footer>
    </footer>

</html>
