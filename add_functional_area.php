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
    <title>Add new functional area</title>
    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/angular-filter/0.5.4/angular-filter.js"></script>
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
    <center><table><tr><td style="text-align: center"> <div style="margin-right: 0; margin-top:">
    <div style="text-align: center">
        <br><br> <h1 style="color:Black;font-family: sans-serif">Add new functional area</h1>
        <style>
            h1 {
                font-size: 35px;
            }
        </style>
    </div>
    <br><br><br><br><br>
                        <div ng-app="myApp"  ng-controller="customersCtrl">
Program Name
                            <select name="program_name" required="" ng-model="selectProgram">
                                <option></option>
                                <option ng-repeat="x in programes | unique: 'progname'" name="'"{{x.progname}}"'">{{ x.progname }}</option>
                            </select>
Program Release
                            <select name="program_release" required="" ng-model="selectNumber">
                                <option></option>
                                <option ng-repeat="x in programes | filterBy: ['progname']:selectProgram | filterBy: ['progrelease']:selectRelease | unique: 'prognumber'" name="'"{{x.prognumber}}"'">{{ x.prognumber }}</option>
                            </select>
Program Version
                            <select name="program_number" required="" ng-model="selectRelease">
                                <option></option>
                                <option ng-repeat="x in programes | filterBy: ['progname']:selectProgram | filterBy: ['prognumber']:selectNumber | unique: 'progrelease'" name="'"{{x.progrelease}}"'">{{ x.progrelease }}</option>
                            </select>
                        </div>

                        <script>
                            var app = angular.module('myApp', ['angular.filter']);
                            app.controller('customersCtrl', function($scope, $http) {
                                $http.get("db/program_db.php")
                                    .success(function (response) {$scope.programes = response.records;});
                            });
                        </script>


    <div id="Add a new Functional area">


    <br><br>Functional area name <br><br>
    <input type="text" required="" name="txt_functional_area_name" size="40"><br><br>
    <input id="add_button" type="submit" name="submit" value="Add">
    <input id="cancel_button" type="submit" name="cancel" value="cancel" onClick='cancelAction();'>
</div>
</form>

<td>
    <?php
    require "db/db.php";

    $sql = "SELECT * FROM Functional_area";
    $result = db($sql);
    $i = FALSE;
    if ($result->num_rows > 0) {
        echo "<table border='2'><tr><th>Functional area name</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row['func_name']."</td>";
        }

    }
    ?>
</td></tr></table></center>
</body>
</html>