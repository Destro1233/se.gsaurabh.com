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
            Update Program
        </b>
    </title>

</head>
<body id="body-color"bgcolor="#e0ffff" link="white" vlink="white" alink="white" align="center">
<form method="POST" action="update_Program_db.php">
    <div style="text-align: center">
        <br><br> <h1 style="color:Black;font-family: sans-serif">Update information about a existing program</h1>
        <style>
            h1 {
                font-size: 30px;
            }
        </style>
    </div>
    <br><br><br><br><br>
    <div id="Update a existing program">
        Select the program to be updated
        <td class="dropdown">
            <select class="dropdown-menu" required="" name="dd_program_name">
                <option value="">Select</option>
                <?php
                require "db/db.php";
                $sql = "SELECT program_name FROM program";
                $result = db($sql);
                while ($row = $result->fetch_assoc())
                {
                    $program_name = $row['program_name'];
                    echo '<option name ="'. $program_name .'">'. $program_name .'</option>';
                }
                ?>
            </select>
            <br>

        <td>
            <br>New Program Name <br>
            <br><input type="text" name="txt_program_name" required="" size="40"><br>
           <br> <input id="add_button" type="submit" name="submit" value="Update">
            <input id="cancel_button" type="submit" name="cancel" value="Cancel" onClick='cancelAction();'>
        </td>
    </div>
</form>
</body>
</html>
