<?php
session_start();
@include("./function.php");
if (priorityFunc($_SESSION['priority'])) {
    header("Location: ./index.php");
    exit();
}
include("header.html");
?>
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
<body id="body-color" bgcolor="#e0ffff" link="white" vlink="white" alink="white" align="Center">
<form method="POST" action="add_functional_area.php">
    <br><br><br> <h1 style="color:Black;font-family: sans-serif">Update a functional area</h1>
    <style>
        h1 {
            font-size: 25px;
        }
    </style>
    <div id="Update a Functional area">
        <br><br>
        Select the program Where functional area is to be added
        <td class="dropdown">
            <select class="dropdown-menu" name="dd_program_name" required="">
                <option value="">Select</option>
                <?php
                require "db/db.php";
                $sql = "SELECT * FROM program";
                $result = db($sql);
                while ($row = $result->fetch_assoc()) {
                    $program_name = $row['program_name'];
                    echo '<option name ="'. $program_name .'">'. $program_name .'</option>';                }
                ?>
            </select>
            <br>

            <br><br><br>
            <input id="add_button" type="submit" name="submit" value="Confirm">
            <input id="cancel_button" type="submit" name="cancel" value="Cancel" onClick='cancelAction();'>
        </td>
    </div>
</form>
</body>
</html>