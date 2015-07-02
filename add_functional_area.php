<?php
/**
 * Created by PhpStorm.
 * User: Pranav
 * Date: 14-06-2015
 * Time: 16:45
 */
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <title>Add new functional area</title>

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
            Add a new Functional area
        </b>
    </title>

</head>
<body id="body-color"  bgcolor="#e0ffff" link="white" vlink="white" alink="white" align="center">
<form method="POST" action="add_functional_area_db.php">
    <center><table width="100%"><tr><td style="text-align: center"> <div style="margin-right: 0; margin-top:">
    <div style="text-align: center">
        <br><br> <h1 style="color:Black;font-family: sans-serif">Add new functional area</h1>
        <style>
            h1 {
                font-size: 35px;
            }
        </style>
    </div>
    <br><br><br><br><br>

    <div id="Add a new Functional area">


    Functional area name <br><br>
    <input type="text" required="" name="txt_functional_area_name" size="40"><br><br>
    <input id="add_button" type="submit" name="submit" value="Add">
    <input id="cancel_button" type="submit" name="cancel" value="cancel" onClick='cancelAction();'>
</div>
</form>
</td><td></td><td></td>
<td>
    <?php
    require "db/db.php";

    $sql = "SELECT * FROM Functional_area";
    $result = db($sql);
    $i = FALSE;
    if ($result->num_rows > 0) {
        echo "<table border='2'><tr><th>Functional area name</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row['func_name']."</td>";
        }

    }
    ?></div></td></tr></table></center>
</body>
</html>