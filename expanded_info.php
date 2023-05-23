<?php
    global $connection;
    include_once "./connection.php";
    $id = $_GET['id'];

    function get_item_status($barcode) {
        global $connection;
        $query = "SELECT * FROM checkouts WHERE item_barcode='$barcode'";
        $result = mysqli_query($connection, $query);
        if ($result->num_rows > 0) {
            return "Checked Out";
        }
        else {
            return "Available";
        }
    }

//    if (session_status() === PHP_SESSION_NONE) {
//        header('Location: ./login.php');
//    }

?>

<html lang="us">

    <head>
        <title>hammer</title>
    </head>

    <body>
        <?php
            include_once "./navigation_bar.php";
            echo "<input type=\"button\" value=\"Manage Record\" onclick=\"location.href='./record_manage.php?id=$id'\"";
        ?>

        <div class="item_information_expanded">
            <?php
            $query = "SELECT *, count(*) FROM item_record WHERE id='$id'";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $title = $row['title'];
                $author = $row['author'];
                $publish_date = $row['publish_date'];
                $type = $row['type'];

                $count = count($row);

                echo <<<_END
                <div>
                    <h2>$title</h2>
                    <p><b>Creator: </b>$author</p>
                    <p><b>Publish Date: </b>$publish_date</p>
                    <p><b>Item Type: </b>$type</p>
                </div>
                <div>
                    <p><b>Items: </b>$count</p>
                </div>

_END;
            }

            ?>


        </div>

        <div class="information_table">
            <table>
                <tr>
                    <th>Barcode</th>
                    <th>Location</th>
                    <th>Item Description</th>
                    <th>Status</th>
                </tr>
                <?php

                $query = "SELECT * FROM items WHERE id='$id'";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $barcode = $row['barcode'];
                    $location = $row['location_barcode'];
                    $item_description = $row['description'];
                    $status = get_item_status($barcode);

                    echo <<<_END
                        <tr>
                            <td>$barcode</td>
                            <td>$location</td>
                            <td>$item_description</td>
                            <td>$status</td>
                        </tr>

_END;
                }
                ?>
            </table>
        </div>
    </body>
</html>
