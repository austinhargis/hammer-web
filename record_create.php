<?php
    global $connection;
    include_once "./connection.php";
    if (isset($_POST["create_record"])) {
        $title = $_POST["title"];

        # TODO: check title to see if string is not blank

        $query = $connection->prepare("INSERT INTO item_record(title, author, description, publish_date, type) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param("sssss", $_POST["title"], $_POST["author"], $_POST["description"], $_POST["publish_date"], $_POST["item_type"]);
        $query->execute();
        if ($query->affected_rows == 0) {
            echo 'Failure';
        }
        else {
            echo "<script>alert('Record successfully created. Redirecting to the homepage.')</script>";
            header('Location: ./home.php');
        }
    }
?>

<html lang="en">

    <body>
        <?php
            include "./navigation_bar.php";
        ?>

        <div class="creation_frame">
            <h3>Create Item Record</h3>
            <form action="./record_create.php" method="post">
                <table>
                    <tr>
                        <td><label for="title">Title</label></td>
                        <td><input type="text" id="title" name="title"></td>
                    </tr>
                    <tr>
                        <td><label for="author">Author</label></td>
                        <td><input type="text" id="author" name="author"></td>
                    </tr>
                    <tr>
                        <td><label for="description">Description</label></td>
                        <td><input type="text" id="description" name="description"></td>
                    </tr>
                    <tr>
                        <td><label for="publish_date">Publish Date:</label></td>
                        <td><input type="text" id="publish_date" name="publish_date"></td>
                    </tr>
                    <tr>
                        <td><label for="item_type">Item Type:</label></td>
                        <td><input type="text" id="item_type" name="item_type"></td>
                    </tr>
                </table>
                <input type="submit" value="Create Record" name="create_record">
            </form>
        </div>
    </body>
</html>


