<?php
/**
 * Created by PhpStorm.
 * User: Saurabh
 * Date: 6/13/2015
 * Time: 10:04 AM
 */
session_start();
?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bughound: Logging in 2 seconds</title>

    <h1 align="center"> Logging in 2 seconds... </h1>
</head>

<body>
<?php
require "db/db.php";


$sql = "SELECT * FROM Employee";
$result = db($sql);
$i = FALSE;
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        if ($row['employee_name'] == $_POST['username'] && $row['password'] == $_POST['password']) {
            $_SESSION['priority'] = $row['Role'];
            header("Location: ./home.php");
            $i = TRUE;
            break;
        }
    }
}
if (!$i) {
    header("Location: ./index.php?a=1");
}
exit();
?>
</body>
</html>
