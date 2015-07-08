<?php
session_start();
@include("./function.php");
if (priorityFunc($_SESSION['priority'])) {
    header("Location: ./index.php");
    exit();
}
include("header.html");
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
            Delete Functional area
        </b>
    </title>

</head>
<body id="body-color"bgcolor="#e0ffff" link="white" vlink="white" alink="white" align="center">
<form method="POST" action="delete_functional_area_db.php">
    <div style="text-align: center">
        <br><br> <h1 style="color:Black;font-family: sans-serif">Delete information about a functional area</h1>
        <style>
            h1 {
                font-size: 30px;
            }
        </style>
    </div>
    <br><br><br><br><br>
    <div id="Delete a Functional area">
        Select the Functional area to be deleted
        <td class="dropdown">
            <select class="dropdown-menu" required="" name="dd_functional_area">
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
            <br><br> <input id="add_button" type="submit" name="submit" value="Delete">
            <input id="cancel_button" type="submit" name="cancel" value="Cancel" onClick='cancelAction();'>
        </td>
    </div>
</form>
</body>
</html>