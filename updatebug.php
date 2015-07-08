<?php
/**
 * Created by PhpStorm.
 * User: varun
 * Date: 6/27/2015
 * Time: 11:35 AM
 */
session_start();
@include("./function.php");
if (priorityFunc($_SESSION['priority'])) {
  header("Location: ./index.php");
  exit();
  }
  include("header.html");
?>
<?php
require "db/db.php";
$bugid = $_GET['bugid'];
$sql = 'Select * from Bug where Bug_ID="' . $bugid . '"';
$result = db($sql);
$bug = $result->fetch_assoc();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Bughound: Update Bug</title>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-filter/0.5.4/angular-filter.js"></script>
    <script src="javascripts/jquery-1.10.12.js"></script>
</head>
<div class="margin custom">
    <body bgcolor="#2e2e2e">
    <form method="POST" action="update_bug_db.php?bugid=<?php echo "$bugid"?>">
<script type="text/javascript">
function getURLParameter(name) {
  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
}
    $(document).ready(function () { 
    var progname = getURLParameter('prog_name');
    var prognumber = getURLParameter('prog_number');
    var progrelease = getURLParameter('prog_release');
//myvar = getURLParameter('myvar');
//	String progname = request.getParameter("prog_name");
//	String prognumber = request.getParameter("prog_number");
//	String progrelease = request.getParameter("prog_release");
    //$("#program_name").val(progname);
    $("#program_number").val(prognumber);
    $("#program_release").val(progrelease);
    $("#report_type").val('Documentation');
    //$("#program_name option[value=progname]").prop('selected', true);
    //$("#report_type option[value='Documentation']").prop('selected', true);
	document.getElementById('report_type').val('Documentation');
});
    </script>
      


        <div class="effect8">
            <div class="tableMargin">
                <table class="table" ng-app="myApp" ng-controller="customersCtrl">
                    <tr class="program_row">
                        <td class="td">Program</td>
                        <td class="td" style="padding-left: 2.7em">
                            <select class="dropdown" id="program_name" required ng-model="selectProgram" name="program">
                                <option></option>
                                <option ng-repeat="x in programes | unique: 'prognumber'" name="" {{x.progname}}
                                "">{{ x.progname }}</option>
                            </select>
                        </td>
                        <td class="td" style="padding-left: 1em">Version</td>
                        <td class="td" style="padding-left: 0.8em">
                            <select class="dropdown" required="" ng-model="selectNumber" name="version">
                                <option></option>
                                <option
                                    ng-repeat="x in programes | filterBy: ['progname']:selectProgram | filterBy: ['progrelease']:selectRelease | unique: 'prognumber'"
                                    name="" {{x.prognumber}}
                                "">{{ x.prognumber }}</option>
                            </select>
                        </td>
                        <td class="td" style="padding-left: 1em">Release</td>
                        <td class="td">
                            <select class="dropdown" required="" ng-model="selectRelease"  name="release">
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

                </table>
                <table class="table">
                    <tr>
                        <td class="td">Report Type</td>
                        <td class="td"><select class="dropdown" id="report_type" name="report_type">
                                <option
                                    value="coding_error" <?php if (strcmp($bug['Report_Type'], "coding_error") == 0) {
                                    echo "selected";
                                } ?>>Coding Error
                                </option>
                                <option
                                    value="design_issue" <?php if (strcmp($bug['Report_Type'], "design_issue") == 0) {
                                    echo "selected";
                                } ?>>Design Issue
                                </option>
                                <option value="suggestion" <?php if (strcmp($bug['Report_Type'], "suggestion") == 0) {
                                    echo "selected";
                                } ?>>Suggestion
                                </option>
                                <option
                                    value="documentation" <?php if (strcmp($bug['Report_Type'], "documentation") == 0) {
                                    echo "selected";
                                } ?>>Documentation
                                </option>
                                <option value="hardware" <?php if (strcmp($bug['Report_Type'], "hardware") == 0) {
                                    echo "selected";
                                } ?>>Hardware
                                </option>
                                <option value="query" <?php if (strcmp($bug['Report_Type'], "query") == 0) {
                                    echo "selected";
                                } ?>>Query
                                </option>
                            </select></td>
                        <td class="td">Severity</td>
                        <td class="td">
                            <select class="dropdown" name="severity">
                                <option value="minor" <?php if (strcmp($bug['Severity'], "minor") == 0) {
                                    echo "selected";
                                } ?>>Minor
                                </option>
                                <option value="serious" <?php if (strcmp($bug['Severity'], "serious") == 0) {
                                    echo "selected";
                                } ?>>Serious
                                </option>
                                <option value="fatal" <?php if (strcmp($bug['Severity'], "fatal") == 0) {
                                    echo "selected";
                                } ?>>Fatal
                                </option>
                            </select></td>
                        <td class="td" width="15%">Reproducible?</td>
                        <td class="td" width="5%"><input type="checkbox"
                                                         name="reproducible" <?php if ($bug['Reproducible'] == 1) {
                                echo "checked";
                            } ?>></td>
                    </tr>
                </table>
                <table class="table">
                    <tr>
                        <td width="127">Problem Summary &nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="td" style="padding-left: 0.8em"><input type="text" name="problem_summary" required=""
                                                                          value="<?php if (!is_null($bug['Problem_Summary'])) {
                                                                              echo "$bug[Problem_Summary]";
                                                                          } ?>"
                                                                          style="width: 38em;"></td>
                    </tr>
                </table>
                <table class="table">
                    <tr>
                        <td class="td" style="padding-right: 5em">Problem</td>
                        <td class="td"><textarea rows="5" cols="70"
                                                 name="problem" required><?php if (!is_null($bug['Problem'])) {
                                    echo "$bug[Problem]";
                                } ?></textarea></td>
                    </tr>
                </table>
                <table class="table">
                    <tr>
                        <td class="td">Suggested Fix</td>
                        <td class="td"><textarea rows="5" cols="70"
                                                 name="suggested_fix"><?php if (!is_null($bug['Suggested_fix'])) {
                                    echo "$bug[Suggested_fix]";
                                } ?></textarea></td>
                    </tr>
                </table>
                <table class="table">
                    <tr>
                        <td class="td">Reported By</td>
                        <td class="td" style="padding-left: 1em">
                            <select class="dropdown" name="reportedby" required>
                                <option></option>
                                <?php
                                $sql = "SELECT * FROM Employee";
                                $result = db($sql);

                                foreach ($result as $row) {
                                    echo "<option value=$row[employee_id]" . (strcmp($bug['Reported_by'], $row['name']) == 0 ? " selected" : "") . ">$row[name]</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td class="td" style="padding-left: 3.3em">Date</td>
                        <td class="td" style="padding-left: 3.5em"><input name="reported_date" type="date" required=""
                                                                          value="<?php if (!is_null($bug['Reported_date'])) {
                                                                              echo "$bug[Reported_date]";
                                                                          } ?>"></td>

                    </tr>
                </table>
                <hr class="style">
                <table class="table">
                    <tr>
                        <td width="103" class="td">Functional Area</td>
                        <td class="td"><input type="text" name="functional_area"></td>

                        <td class="td">Assigned To</td>
                        <td class="td">
                            <select <?php if ($_SESSION['priority'] < 3){echo 'disabled="true"';} ?> name="assigned_to" class="dropdown">
                                <option></option>
                                <?php
                                $sql = "SELECT * FROM Employee where Role=1 or Role=2";
                                $result = db($sql);

                                foreach ($result as $row) {
                                    echo "<option value=$row[employee_id]" . (strcmp($bug['Assigned_to'], $row['name']) == 0 ? " selected" : "") .">$row[name]</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <table class="table">
                    <tr>
                        <td class="td">Comments</td>
                        <td class="td" style="padding-left: 1.7em">
                        <textarea rows="5" cols="70" name="comments"><?php if (!is_null($bug['comments'])) {
                                echo "$bug[comments]";
                            } ?></textarea>
                        </td>
                    </tr>
                </table>
                <table class="table">
                    <tr>
                        <td class="td">Status</td>
                        <td class="td" style="padding-left: 3.5em"><select <?php if ($_SESSION['priority'] < 3){echo 'disabled="true"';} ?> class="dropdown" name="status">
                                <option></option>
                                <option value="open" <?php if (strcmp($bug['status'], "open") == 0) {
                                    echo "selected";
                                } ?>>Open
                                </option>
                                <option value="closed" <?php if (strcmp($bug['status'], "closed") == 0) {
                                    echo "selected";
                                } ?>>Closed
                                </option>
                            </select></td>
                        <td class="td" style="padding-left: 1em">Priority</td>
                        <td class="td" style="padding-left: 1em"><select class="dropdown" name="priority">
                                <option></option>
                                <option value="1" <?php if (strcmp($bug['priority'], "1") == 0) {
                                    echo "selected";
                                } ?>>1
                                </option>
                                <option value="2" <?php if (strcmp($bug['priority'], "2") == 0) {
                                    echo "selected";
                                } ?>>2
                                </option>
                                <option value="3" <?php if (strcmp($bug['priority'], "3") == 0) {
                                    echo "selected";
                                } ?>>3
                                </option>
                                <option value="4" <?php if (strcmp($bug['priority'], "4") == 0) {
                                    echo "selected";
                                } ?>>4
                                </option>
                                <option value="5" <?php if (strcmp($bug['priority'], "5") == 0) {
                                    echo "selected";
                                } ?>>5
                                </option>
                            </select></td>
                        <td class="td">Resolution</td>
                        <td class="td"><select <?php if ($_SESSION['priority'] < 1){echo 'disabled="true"';} ?> class="dropdown" name="resolution">
                                <option></option>
                                <option <?php if (strcmp($bug['resolution'], "Pending") == 0) {
                                    echo "selected";
                                } ?>>Pending
                                </option>
                                <option <?php if (strcmp($bug['resolution'], "Fixed") == 0) {
                                    echo "selected";
                                } ?>>Fixed
                                </option>
                                <option <?php if (strcmp($bug['resolution'], "Irreproducible") == 0) {
                                    echo "selected";
                                } ?>>Irreproducible
                                </option>
                                <option <?php if (strcmp($bug['resolution'], "Deferred") == 0) {
                                    echo "selected";
                                } ?>>Deferred
                                </option>
                                <option <?php if (strcmp($bug['resolution'], "As designed") == 0) {
                                    echo "selected";
                                } ?>>As designed
                                </option>
                                <option <?php if (strcmp($bug['resolution'], "Can't be fixed") == 0) {
                                    echo "selected";
                                } ?>>Can't be fixed
                                </option>
                                <option <?php if (strcmp($bug['resolution'], "Withdrawn by reporter") == 0) {
                                    echo "selected";
                                } ?>>Withdrawn by reporter
                                </option>
                                <option <?php if (strcmp($bug['resolution'], "Need more info") == 0) {
                                    echo "selected";
                                } ?>>Need more info
                                </option>
                                <option <?php if (strcmp($bug['resolution'], "Disagree with suggestion") == 0) {
                                    echo "selected";
                                } ?>>Disagree with suggestion
                                </option>
                            </select></td>
                    </tr>
                </table>
                <table class="table">
                    <tr>
                        <td class="td" style="padding-right: 3.8em">Resolution Version</td>
                        <td class="td">
                            <select class="dropdown" name="resolution_version">
                                <option></option>
                                <?php
                                $sql = "Select program_number from program where program_name in(SELECT program_name FROM program where program_id=$bug[program_id]) and program_release in (SELECT program_release FROM program where program_id=$bug[program_id]);";
                                $result = db($sql);
                                $sql1 = "SELECT * FROM program where program_id=$bug[program_id];";
                                $version = db($sql)->fetch_assoc();
                                foreach ($result as $row) {
                                    if (!strcmp($row['program_number'], $version['program_number'] < 0)) {
                                        echo "<option value=$row[program_number]>$row[program_number]</option>";
                                    }
                                }
                                ?>
                            </select></td>
                        <td class="td" style="padding-left: 1em">Resolved By</td>
                        <td class="td"><select <?php if ($_SESSION['priority'] < 2){echo 'disabled="true"';} ?> class="dropdown" name="resolved_by">
                                <option></option>
                                <?php
                                $sql = "SELECT * FROM Employee where Role=1";
                                $result = db($sql);

                                foreach ($result as $row) {
                                    echo "<option value=$row[employee_id]" . (strcmp($bug['resolution_by'], $row['name']) == 0 ? " selected" : "") .">$row[name]</option>";
                                }
                                ?>
                            </select></td>
                        <td class="td">Resolution Date</td>
                        <td class="td"><input <?php if ($_SESSION['priority'] < 2){echo 'disabled="true"';} ?> type="date" style="width: 130px" name="resolved_date" value="<?php if (!is_null($bug['resolution_date'])) {
                                echo "$bug[Reported_date]";
                            } ?>"></td>

                    </tr>
                </table>
                <table class="table">
                    <tr>
                        <td width=70 class="td" style="padding-right: 4em">Tested By</td>
                        <td class="td"><select <?php if ($_SESSION['priority'] < 2){echo 'disabled="true"';} ?> class="dropdown" name="tested_by">
                                <option></option>
                                <?php
                                $sql = "SELECT * FROM Employee where Role=2";
                                $result = db($sql);

                                foreach ($result as $row) {
                                    echo "<option value=$row[employee_id] " . (strcmp($bug['resolution_tested_by'], $row['name']) == 0 ? " selected" : "") .">$row[name]</option>";
                                }
                                ?>
                            </select></td>
                        <td width=67 class="td" style="padding-left: 1.2em">Tested Date</td>
                        <td class="td"><input <?php if ($_SESSION['priority'] < 2){echo 'disabled="true"';} ?> type="date" name="tested_date" style="width: 130px" value="<?php if (!is_null($bug['resolution_tested_date'])) {
                                echo "$bug[Reported_date]";
                            } ?>"></td>

                        <td class="td">Treat as deferred?</td>
                        <td class="td"><input type="checkbox" name="deferred" <?php if ($bug['treat_as_deferred'] == 1) {
                                echo "checked";
                            } ?>></td>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Submit">
                <a href="home.php"><input type="button" value="Cancel"></a>
                <br><br><br><br><br><br><br>
            </div>

        </div>
    </form>
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

    hr.style {
        border: 0;
        height: 1px;
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
    }
</style>
<style type="text/css">
    .custom {
        font-family: sans-serif;
    }
</style>
</html>

