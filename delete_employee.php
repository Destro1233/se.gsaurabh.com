<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15-06-2015
 * Time: 18:31
 */
?>
<html>
<head lang="en">
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
            Delete Employee
        </b>
    </title>

</head>
<body id="body-color">
<form method="POST" action="delete_employee_db.php">
    <div id="Delete information about an employee">
        Select the employee
        <td class="dropdown">
            <select class="dropdown-menu" name="dd_employee_name">
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

        <td>
            <input id="add_button" type="submit" name="submit" value="Delete">
            <input id="cancel_button" type="submit" name="cancel" value="Cancel" onClick='cancelAction();'>
        </td>
    </div>
</form>
</body>
</html>
