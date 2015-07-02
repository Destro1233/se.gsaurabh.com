<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-06-2015
 * Time: 20:28
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
            Update Functional area
        </b>
    </title>

</head>
<body id="body-color">
<form method="POST" action="update_functional_area_db.php">
    <div id="Update a Functional area">
        Select the Functional area to be updated
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
            Functional area name <br>
            <input type="text" name="txt_functional_area_name" size="40"><br>
            <input id="add_button" type="submit" name="submit" value="Update">
            <input id="cancel_button" type="submit" name="cancel" value="Cancel" onClick='cancelAction();'>
        </td>
    </div>
</form>
</body>
</html>