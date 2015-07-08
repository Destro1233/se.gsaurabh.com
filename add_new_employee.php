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
    <center><table width="100%"><tr><td style="text-align: center"> <div style="margin-right: 0; margin-top:">

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
</td><td></td><td></td>
<td>
    <?php
    require "db/db.php";

    $sql = "SELECT * FROM Employee";
    $result = db($sql);
    $i = FALSE;
    if ($result->num_rows > 0) {
        echo "<table border='2'><tr><th>Employee Name</th><th>Role</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row['employee_name']."</td>";
            echo "<td>".$row['Role']."</td>";
        }

    }
    ?></div></td></tr></table></center>


</body>
</html>