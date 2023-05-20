<?php
    global $connection;
    include_once "connection.php";
?>

<html lang="en">

    <head>
        <title>hammer</title>
    </head>

    <body>
        <?php
            include_once "./navigation_bar.php";
        ?>
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
