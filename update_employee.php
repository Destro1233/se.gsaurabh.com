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
Update Employee
</b>
    </title>

</head>
<body id="body-color" bgcolor="#e0ffff" link="white" vlink="white" alink="white" align="center">
<form method="POST" action="update_employee_db.php">
    <div style="text-align: center">
        <br><br> <h1 style="color:Black;font-family: sans-serif">Update information about an employee</h1>
        <style>
            h1 {
                font-size: 30px;
            }
        </style>
    </div>
    <br><br><br><br><br>
    <div id="Update information about an employee">
    Select the employee
<td class="dropdown">
            <select class="dropdown-menu" name="dd_employee_name" required="">
                <option value="">Select</option>
                <?php
                require "db/db.php";
                $sql = "SELECT employee_name FROM Employee";
                $result = db($sql);
                while ($row = $result->fetch_assoc()) {
                    $employee_name = $row['employee_name'];
                    echo '<option name ="'. $employee_name .'">'. $employee_name .'</option>';
                }
                ?>
</select>
<br>

<td><br><br>
    New Role of the employee selected
            <select name="role" required="">
                <option value="">Select</option>
                <option value="0">User</option>
                <option value="1">Programmer</option>
                <option value="2">Tester</option>
                <option value="3">Manager</option>
            </select><br><br>
    <input id="add_button" type="submit" name="submit" value="Update">
    <input id="cancel_button" type="submit" name="cancel" value="Cancel" onClick='cancelAction();'>
</td>
</div>
</form>
</body>
</html>
