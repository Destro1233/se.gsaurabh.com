<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-06-2015
 * Time: 18:54
 */
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <title>Add new employee</title>
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
            Add a new employee
        </b>
    </title>

</head>
<body id="body-color" bgcolor="#e0ffff" link="white" vlink="white" alink="white" align="center">
<form method="POST" action="add_new_employee_db.php">

    <div style="text-align: center">
       <br><br> <h1 style="color:Black;font-family: sans-serif">Add new employee</h1>
        <style>
            h1 {
                font-size: 35px;
            }
        </style>
    </div>
    <br><br><br><br><br>

    <div id="Add a new employee">


    Employee name<br> <br><input type="text" required="" name="employee_name" size="40"><br><br>
        Role :<select name="role" required="">
            <option value="">Select</option>
            <option value="0">User</option>
            <option value="1">Programmer</option>
            <option value="2">Tester</option>
            <option value="3">Manager</option>
        </select><br><br>
    Password<br><br><input type="password" required="" name="password" size="40"><br>

    <br></be><input id="add_button" type="submit" name="submit" value="Add">
    <input id="cancel_button" type="submit" name="cancel" value="cancel" onClick='cancelAction();'>


</div>
</form>

</body>
</html>