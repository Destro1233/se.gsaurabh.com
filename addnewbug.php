<!DOCTYPE html>
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
<head>
    <meta charset="utf-8">
    <title>Bughound: Add new Bug</title>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-filter/0.5.4/angular-filter.js"></script>
    <script type="text/javascript">
	function updatepicture(pic) {
		document.getElementById("image").setAttribute("src", pic);
	}
	</script>
</head>
<div class="margin custom">
    <body bgcolor="#2e2e2e">
    <form method="post" action="add_new_bug.php">
        <div class="effect8">
            <div class="tableMargin">
                <table class="table" ng-app="myApp" ng-controller="customersCtrl">
                    <tr class="program_row">
                        <td class="td">Program</td>
                        <td class="td" style="padding-left: 2.7em">
                            <select class="dropdown" name="program" required ng-model="selectProgram">
                                <option></option>
                                <option ng-repeat="x in programes | unique: 'progname'" name="" {{x.progname}}
                                "">{{ x.progname }}</option>
                            </select>
                        </td>
                        <td class="td" style="padding-left: 1em">Version</td>
                        <td class="td" style="padding-left: 0.8em">
                            <select class="dropdown" name="version" required ng-model="selectNumber">
                                <option></option>
                                <option
                                    ng-repeat="x in programes | filterBy: ['progname']:selectProgram | filterBy: ['progrelease']:selectRelease | unique: 'prognumber'"
                                    name="" {{x.prognumber}}
                                "">{{ x.prognumber }}</option>
                            </select>
                        </td>
                        <td class="td" style="padding-left: 1em">Release</td>
                        <td class="td">
                            <select class="dropdown" name="release" required ng-model="selectRelease">
                                <option></option>
                                <option
                                    ng-repeat="x in programes | filterBy: ['progname']:selectProgram | filterBy: ['prognumber']:selectNumber | unique: 'progrelease'"
                                    name="" {{x.progrelease}}
                                "">{{ x.progrelease }}</option>
                            </select>
                        </td>
                    </tr>
                </table>

                <script>
                    var app = angular.module('myApp', ['angular.filter']);
                    app.controller('customersCtrl', function ($scope, $http) {
                        $http.get("db/program_db.php")
                            .success(function (response) {
                                $scope.programes = response.records;
                            });
                    });
                </script>
                <table class="table">
                    <tr>
                        <td class="td">Report Type</td>
                        <td class="td"><select class="dropdown" id="report_type" name="report_type">
                                <option value="coding error">Coding Error</option>
                                <option value="design issue">Design Issue</option>
                                <option value="suggestion">Suggestion</option>
                                <option value="documentation">Documentation</option>
                                <option value="hardware">Hardware</option>
                                <option value="query">Query</option>
                            </select></td>
                        <td class="td">Severity</td>
                        <td class="td"><select class="dropdown" name="severity">
                                <option value="minor">Minor</option>
                                <option value="serious">Serious</option>
                                <option value="fatal">Fatal</option>
                            </select></td>
                        <td class="td" width="15%">Reproducible?</td>
                        <td class="td" width="5%"><input type="checkbox" name="reproducible"></td>
                    </tr>
                </table>
                <table width="664" class="table">
                    <tr>
                        <td width="127">Problem Summary &nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td width="525" class="td" style="padding-left: 0.8em"><input type="text" name="problem_summary" required="" style="width: 30em;"></td>
                    </tr>
                </table>
                <table class="table">
                    <tr>
                        <td class="td" style="padding-right: 5em">Problem</td>
                        <td class="td"><textarea rows="5" cols="70" name="problem" required></textarea></td>
                    </tr>
                </table>
                <table width="644" class="table">
                    <tr>
                        <td width="122" class="td">Suggested Fix</td>
                        <td width="487" class="td"><textarea rows="5" cols="70" name="suggested_fix"></textarea></td>
                    </tr>
                </table>
                <table class="table">
                    <tr>
                        <td class="td">Reported By</td>
                        <td class="td" style="padding-left: 1em">
                            <select class="dropdown" name="reportedby" required>
                                <option></option>
                                <?php
                                require "db/db.php";
                                $sql = "SELECT * FROM Employee";
                                $result = db($sql);

                                foreach ($result as $row) {
                                    echo "<option value=$row[employee_id]>$row[name]</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td class="td">Date</td>
                        <td class="td"><input name="reported_date" type="date" required=""></td>
                    </tr>
                </table>
                <br><br><br>
                <?php 
				if (!isset($_SESSION['filename'])){
					$_SESSION['filename'] = NULL;
				}
				if ($_SESSION['filename'] != NULL) {
					$filename = $_SESSION['filename'];
					echo '<input type="hidden" value="'.$filename.'" name="filename" />';
				}
				?>
                
                <input id="add_button" type="submit" name="submit" value="Submit">
                <input id="reset" type="reset" name="reset">
                <a href="home.php"><input type="button" value="Cancel"></a>
                <br><br><br><br><br><br><br>
            </div>
        </div>
    </form>
    <table>
    	<tr>
        	<td width="73"> Attachment </td>
            	<td width="218">
            	    <form id="form" method="post" action="image_uploader.php" enctype="multipart/form-data" target="iframe">
            	        <input type="file" id="file" name="file" />
            	        <input type="submit" name="submit" id="submit" value="Upload File" />
            	    </form>
            	</td>
            	<td width="174">
                	<p id="message">No file uploaded.</p>
            		<img width="174" height="92" id="image" style="min-height: 120; min-width: 200; max-height: 120px;" /><br /><br />
               		<iframe style="display: none;" name="iframe"></iframe>
            	</td>
       		</tr>
 		</table>
    </body>
</div>
<style>
    .effect8 {
        border: 1px solid #999;
        -webkit-box-shadow: 1px 2px 5px 0 #000000;
        -moz-box-shadow: 1px 2px 5px 0 #000000;
        box-shadow: 0px 0px 100px 0 #000000;
        background-color: white;
    }

    .table {
        border-collapse: collapse;
    }

    .dropdown {
        width: 120px;
    }

    .td {
        padding-top: 1em;
        padding-bottom: 2em;
        padding-right: 1cm;
    }

    .margin {
        margin-top: 100px;
        margin-bottom: 25px;
        margin-right: 150px;
        margin-left: 150px;
    }

    .tableMargin {
        margin-top: 15px;
        margin-right: 75px;
        margin-left: 75px;
    }

</style>
<style type="text/css">
    .custom {
        font-family: sans-serif;
    }
</style>
</html>

