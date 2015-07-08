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
    <title>Home - Manage Database</title>
</head>
<body bgcolor="#000000" link="white" vlink="white" alink="white">
<div style="text-align: center">
    <br><br><br><br>
    <h1 style="color:white;font-family: sans-serif">Manage Database</h1>
    <style>
        h1 {
            font-size: 50px;
        }
    </style>
</div>
<br><br><br><br>

<div style="text-align: center">
<table style="width:100%">
    <tr>
        <td><a href="add_new_program.php" class="glow">Add new program</a><br></td>
        <td><a href="update_program.php" class="glow">Update a existing program</a><br></td>
        <td><a href="delete_program.php" class="glow">Delete a existing program</a><br></td>


    </tr>
    <tr>
        <td><a href="add_functional_area.php" class="glow">Add a new functional area</a><br></td>
        <td><a href="functional_program.php" class="glow">Update a functional area</a><br></td>
        <td><a href="delete_functional_area.php" class="glow">Delete a functional area</a><br></td>

    </tr>
    <tr>

        <td><a href="add_new_employee.php" class="glow">Add new employee</a><br></td>
        <td><a href="update_employee.php" class="glow">Update information about an employee</a><br></td>
        <td><a href="delete_employee.php" class="glow">Delete information about an employee</a><br></td>

    </tr>
</table>
    <style>
        a.glow, a.glow:hover, a.glow:focus {
            text-decoration: none;
            color: #ffffff;
            text-shadow: none;
            -webkit-transition: 250ms linear 0s;
            -moz-transition: 250ms linear 0s;
            -o-transition: 250ms linear 0s;
            transition: 250ms linear 0s;
            outline: 0 none;
        }

        a.glow:hover, a.glow:focus {
            color: #ffffff;
            text-shadow: -1px 1px 8px yellow, 1px -1px 8px yellow;
        }

        a:link {
            text-decoration: none;
            font-size: x-large;
            line-height: 30px;
            font-family: sans-serif;
        }

        a:visited {
            text-decoration: none;
        }

        a:active {
            text-decoration: underline;
        }
    </style>


</div>
</body>
</html>