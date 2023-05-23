<?php
    global $connection;
    include "./connection.php";
    $id = $_GET["id"];

    //
    if (isset($_POST["manage_record"])) {
        $query = $connection->prepare("UPDATE item_record SET title=?, author=?, description=?, publish_date=?, type=? WHERE id=$id");
        $query->bind_param("sssss", $_POST["title"], $_POST["author"], $_POST["description"], $_POST["publish_date"], $_POST["type"]);
        $query->execute();
    }
    else {
        $query = "SELECT * FROM item_record WHERE id=$id";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['title'];
            $author = $row['author'];
            $description = $row['description'];
            $publish_date = $row['publish_date'];
            $item_type = $row['type'];
        }
    }

?>


<html lang="en">

    <body>

        <?php
            include "./navigation_bar.php";
        ?>

        <div class="creation_frame">
            <h3>Manage Item Record</h3>
            <form action="./record_manage.php" method="post">
                <table>
                    <tr>
                        <td><label for="title">Title</label></td>
                        <td><input type="text" id="title" name="title" value="<?php echo (isset($title))?$title:'' ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="author">Author</label></td>
                        <td><input type="text" id="author" name="author" value="<?php echo (isset($author))?$author:'' ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="description">Description</label></td>
                        <td><input type="text" id="description" name="description" value="<?php echo (isset($description))?$description:'' ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="publish_date">Publish Date:</label></td>
                        <td><input type="text" id="publish_date" name="publish_date" value="<?php echo (isset($publish_date))?$publish_date:'' ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="item_type">Item Type:</label></td>
                        <td><input type="text" id="item_type" name="item_type" value="<?php echo (isset($item_type))?$item_type:'' ?>"></td>
                    </tr>
                </table>
                <input type="submit" value="Save Record" name="manage_record">
            </form>
        </div>
    </body>
</html>

