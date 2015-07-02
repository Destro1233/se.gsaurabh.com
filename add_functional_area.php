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
    <input type="text" name="txt_functional_area_name" size="40"><br><br>
    <input id="add_button" type="submit" name="submit" value="Add">
    <input id="cancel_button" type="submit" name="cancel" value="cancel" onClick='cancelAction();'>
</div>
</form>
</body>
</html>