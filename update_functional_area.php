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
            Update Functional area
        </b>
    </title>

</head>
<body id="body-color" bgcolor="#e0ffff" link="white" vlink="white" alink="white" align="center">
<form method="POST" action="update_functional_area_db.php">
     <div style="margin-right: 0; margin-top:">
                        <br><br> <h1 style="color:Black;font-family: sans-serif">Update a functional area</h1>
                        <style>
                            h1 {
                                font-size: 30px;
                            }
                        </style>
                    </div>
                    <br><br><br><br><br>
    <div style="text-align: center">
         <h1 style="color:Black;font-family: sans-serif">Update information about a functional area</h1>
        <style>
            h1 {
                font-size: 20px;
            }
        </style>
    </div>
    <br><br><br><br><br>
    <div id="Update a Functional area">
        Select the Functional area to be updated
        <td class="dropdown">
            <select class="dropdown-menu" name="dd_functional_area" required="">
                <option value="">Select</option>
                <?php
                require "db/db.php";
                $_POST['dd_program_name'];
                $sql = "Select * from Functional_area where program_id in (Select program_id from program where program_name= '".$_POST['dd_program_name']."')";
                $result = db($sql);
                while ($row = $result->fetch_assoc()) {
                    $func_name = $row['func_name'];
                    echo '<option name ="'. $func_name .'">'. $func_name .'</option>';
                }
                ?>
            </select>
            <br>

        <td>
            <br><br>Functional area name <br>
            <input type="text" required="" name="txt_functional_area_name" size="40"><br><br>
            <input id="add_button" type="submit" name="submit" value="Update">
            <input id="cancel_button" type="submit" name="cancel" value="Cancel" onClick='cancelAction();'>
        </td>
    </div>
</form>
</td><td></td><td></td>
<td>
    <?php
    $sql = "Select * from Functional_area where program_id in (Select program_id from program where program_name= '".$_POST['dd_program_name']."')";
    $result = db($sql);
    $i = FALSE;
    if ($result->num_rows > 0) {
        echo "<table border='2'><tr><th>Area Name</th>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row['func_name']."</td><tr></tr>";
        }

    }
    ?></div></td></tr></table></center>

</body>
</html>