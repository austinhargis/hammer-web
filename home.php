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
        <div id="body">
            <div id="home_features">
                <table>
                    <tr><td><h3>Checkout</h3></td></tr>
                    <tr><td><a href="check_in.php">Check In</a></td></tr>
                    <tr><td><a href="check_out.php">Check Out</a></td></tr>
                    <tr><td><a href="check_out_view_all.php">View All Checkouts</a></td></tr>

                    <tr><td><h3>Locations</h3></td></tr>
                    <tr><td><a href="location_create.php">Create Location</a></td></tr>
                    <tr><td><a href="location_manage.php">Manage Location</a></td></tr>

                    <tr><td><h3>Message of the Day</h3></td></tr>
                    <tr><td><a href="motd_create.php">Create MOTD</a></td></tr>
                    <tr><td><a href="motd_manage.php">Manage MOTD</a></td></tr>

                    <tr><td><h3>Records</h3></td></tr>
                    <tr><td><a href="record_create.php">Create Record</a></td></tr>
                    <tr><td><a href="record_manage.php">Manage Record</a></td></tr>

                    <tr><td><h3>Users</h3></td></tr>
                    <tr><td><a href="user_create.php">Create User</a></td></tr>
                    <tr><td><a href="user_view_specific.php">View User</a></td></tr>
                    <tr><td><a href="user_view_all.php">View All Users</a></td></tr>
                </table>
            </div>

            <div id="information_table">
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
        </div>

    </body>
    <footer>
    </footer>

</html>
