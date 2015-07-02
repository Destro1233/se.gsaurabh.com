<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15-06-2015
 * Time: 18:10
 */
?>
<html>
<head lang="en">
    <script>
        function cancelAction() {
            var cancel=confirm("Are you sure you want to cancel?")
            if (cancel==true)
            {
                history.back(1);
            }
            else
            {
                <!--  nothing happens-->
            }
        }
    </script>
    <meta charset="UTF-8">
    <title>
        <b>
            Delete Functional area
        </b>
    </title>

</head>
<body id="body-color">
<form method="POST" action="delete_functional_area_db.php">
    <div id="Delete a Functional area">
        Select the Functional area to be deleted
        <td class="dropdown">
            <select class="dropdown-menu" name="dd_functional_area">
                <?php
                require "db/db.php";
                $sql = "SELECT * FROM Functional_area";
                $result = db($sql);
                while ($row = $result->fetch_assoc()) {
                    $func_name = $row['func_name'];
                    echo '<option name ="'. $func_name .'">'. $func_name .'</option>';
                }
                ?>
            </select>
            <br>

        <td>
            <input id="add_button" type="submit" name="submit" value="Delete">
            <input id="cancel_button" type="submit" name="cancel" value="Cancel" onClick='cancelAction();'>
        </td>
    </div>
</form>
</body>
</html>