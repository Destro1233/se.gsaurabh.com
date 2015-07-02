<?php
/**
 * Created by PhpStorm.
 * User: Pranav
 * Date: 14-06-2015
 * Time: 17:14
 */
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
    <div style="text-align: center">
        <br><br> <h1 style="color:Black;font-family: sans-serif">Add new program</h1>
        <style>
            h1 {
                font-size: 35px;
            }
        </style>
    </div>
    <br><br><br><br><br>

    <div id="Add a new Program">


    Program name<br> <br><input type="text" name="txt_Program_name" size="40"><br><br>
    Version<br> <br><input type="number" name="version" size="40"><br><br>
    Release<br> <br><input type="number" name="release" size="40"><br><br>
    <input id="add_button" type="submit" name="submit" value="Add">
    <input id="cancel_button" type="submit" name="cancel" value="cancel" onClick='cancelAction();'>


</div>
</form>
</body>
</html>