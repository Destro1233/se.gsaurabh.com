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
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <title>Add new program</title>

    <meta charset="UTF-8">
    <title>
        <b>
            Add a new program
        </b>
    </title>

</head>
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
<body id="body-color" bgcolor="#e0ffff" link="white" vlink="white" alink="white" align="center">
<form method="POST" action="add_new_program_db.php">
   <center><table width="100%"><tr><td style="text-align: center"> <div style="margin-right: 0; margin-top:">
        <br><br> <h1 style="color:Black;font-family: sans-serif">Add new program</h1>
        <style>
            h1 {
                font-size: 35px;
            }
        </style>
    </div>
    <br><br><br><br><br>

    <div id="Add a new Program" style="margin-right: 0; margin-top: 0;">


    Program name<br> <br><input type="text" required="" name="txt_Program_name" size="40"><br><br>
    Version<br> <br><input type="number" required="" name="version" size="40"><br><br>
    Release<br> <br><input type="number" required="" name="release" size="40"><br><br>
    <input id="add_button" type="submit" name="submit" value="Add">
    <input id="cancel_button" type="submit" name="cancel" value="cancel" onClick='cancelAction();'>
    <br>
    </div>
    </form>
    </td><td></td><td></td>
    <td>
        <?php
        require "db/db.php";

        $sql = "SELECT * FROM program";
        $result = db($sql);
        $i = FALSE;
        if ($result->num_rows > 0) {
            echo "<table border='2'><tr><th>Program Name</th><th>Number</th><th>Release</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['program_name']."</td>";
                echo "<td>".$row['program_number']."</td>";
                echo "<td>".$row['program_release']."</td></tr>";
                }

        }
        ?></div></td></tr></table></center>

</body>
</html>