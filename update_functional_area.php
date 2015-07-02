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
    <link rel="stylesheet" type="text/css" href="./css/home.css">
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
<body id="body-color" bgcolor="#e0ffff" link="white" vlink="white" alink="white" align="center">
<form method="POST" action="update_functional_area_db.php">
    <div style="text-align: center">
        <br><br> <h1 style="color:Black;font-family: sans-serif">Update information about a functional area</h1>
        <style>
            h1 {
                font-size: 30px;
            }
        </style>
    </div>
    <br><br><br><br><br>
    <div id="Update a Functional area">
        Select the Functional area to be updated
        <td class="dropdown">
            <select class="dropdown-menu" name="dd_functional_area" required="">
                <option value="">Select</option>
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
            <br><br>Functional area name <br>
            <input type="text" required="" name="txt_functional_area_name" size="40"><br><br>
            <input id="add_button" type="submit" name="submit" value="Update">
            <input id="cancel_button" type="submit" name="cancel" value="Cancel" onClick='cancelAction();'>
        </td>
    </div>
</form>
</body>
</html>