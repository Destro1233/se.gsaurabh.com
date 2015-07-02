<?php
session_start();
@include("./function.php");
if (priorityFunc($_SESSION['priority'])) {
    header("Location: ./index.php");
    exit();
}
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <title>Home - Bughound</title>
</head>
<body bgcolor="#2e2e2e" link="white" vlink="white" alink="white">
<div id="content">
    aksjdbaksjdskajdbsakjdbkjdakjlsdljsand
    <img src="./images/logo.jpeg" class="ribbon"/>
    Haan beta
</div>
<div style="text-align: center">
    <h1 style="color:white;font-family: sans-serif">Bughound</h1>
    <style>
        h1 {
            font-size: 50px;
        }
    </style>
</div>
<br><br><br><br><br>

<div style="text-align: center">

    <a href="addnewbug.php" class="glow">Report a new bug</a><br>
    <a href="searchBug.php" class="glow">Search bug</a><br>
    <a href="home_manage_database.php" class="glow">Database maintenance</a><br>

    <style>
        a.glow, a.glow:hover, a.glow:focus {
            text-decoration: none;
            color: yellow;
            text-shadow: none;
            -webkit-transition: 250ms linear 0s;
            -moz-transition: 250ms linear 0s;
            -o-transition: 250ms linear 0s;
            transition: 250ms linear 0s;
            outline: 0 none;
        }

        a.glow:hover, a.glow:focus {
            color: yellow;
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