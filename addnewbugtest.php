<!DOCTYPE html>
<?php
session_start();
@include("./function.php");
/*?>if (priorityFunc($_SESSION['priority'])) {
    header("Location: ./index.php");
    exit();
}
<?php */?>
<html>
<head>
    <meta charset="utf-8">
    <title>Bughound: Add new Bug</title>
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/angular-filter/0.5.4/angular-filter.js"></script>
</head>
<div class="margin custom">
    <body bgcolor="#2e2e2e">
    <div style="text-align: center; padding-top: 0px">
        <h1 style="color:white;font-size: 50px">Bughound</h1>
    </div>
    <div class="effect8">
        <div class="tableMargin">
            <table width="622" class="table" ng-app="myApp" ng-controller="customersCtrl">
                <tr class="program_row">
                    <td>Program</td>
                    <td>
<select ng-model="selectProgram">
<option></option>
<option ng-repeat="x in programes | unique: 'prognumber'" name=""{{x.progname}}"">{{ x.progname }}</option>
</select>
</td>
<td>Version</td>
<td>
<select ng-model="selectNumber">
<option></option>
<option ng-repeat="x in programes | filterBy: ['progname']:selectProgram | filterBy: ['progrelease']:selectRelease | unique: 'prognumber'" name=""{{x.prognumber}}"">{{ x.prognumber }}</option>
</select>
</td>
<td>Release</td>
<td>
<select ng-model="selectRelease">
<option></option>
<option ng-repeat="x in programes | filterBy: ['progname']:selectProgram | filterBy: ['prognumber']:selectNumber | unique: 'progrelease'" name=""{{x.progrelease}}"">{{ x.progrelease }}</option>
</select>
</td>
</tr> 
</table>
 
<script>
var app = angular.module('myApp', ['angular.filter']);
app.controller('customersCtrl', function($scope, $http) {
   $http.get("db/program_db.php")
   .success(function (response) {$scope.programes = response.records;});
});
</script>
 
            </table>
            <table class="table">
                <tr>
                    <td class="td">Report Type</td>
                    <td class="td"><select class="dropdown">
                            <option value="coding_error">Coding Error</option>
                            <option value="design_issue">Design Issue</option>
                            <option value="suggestion">Suggestion</option>
                            <option value="documentation">Documentation</option>
                            <option value="hardware">Hardware</option>
                            <option value="query">Query</option>
                        </select></td>
                    <td class="td">Severity</td>
                    <td class="td"><select class="dropdown">
                            <option value="minor">Minor</option>
                            <option value="serious">Serious</option>
                            <option value="fatal">Fatal</option>
                        </select></td>
                    <td width="15%">Reproducible?</td>
                    <td width="5%"><input type="checkbox" name="reproducible"></td>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <td width="127" class="td">Problem Summary &nbsp;&nbsp;&nbsp;&nbsp;(Be Precise)</td>
                    <td width="700"><input type="text" name="problem_summary" width="615px"></td>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <td class="td" style="padding-right: 3cm">Problem</td>
                    <td><textarea rows="4" cols="100" name="problem"></textarea></td>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <td width="127" class="td">Suggested Fix</td>
                    <td width="765"><input type="text" name="suggested_fix"></td>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <td class="td"><select class="dropdown">
                            <option value="a">a</option>
                        </select></td>
                    <td>Date</td>
                    <td><input name="reported_date" type="date"></td>
                    <td>Assigned To</td>
                    <td><input type="text" name="assigned_to"></td>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <td class="td">Functional Area</td>
                    <td><input type="text" name="functional_area"></td>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <td class="td">Comments
                    </td>
                    <td><input type="text" name="comments"></td>
                    </td>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <td class="td">Status</td>
                    <td><select class="dropdown">
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                        </select></td>
                    <td>Priority</td>
                    <td><select class="dropdown">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select></td>
                    <td>Resolution</td>
                    <td><select class="dropdown">
                            <option value="1">1</option>
                        </select></td>

                </tr>
            </table>
            <table class="table">
                <tr>
                    <td class="td">Resolution Version</td>
                    <td><select class="dropdown">
                            <option value="1">1</option>
                        </select></td>
                    <td>Resolved By</td>
                    <td><select class="dropdown">
                            <option value="saurabh">Saurabh</option>
                        </select></td>
                    <td>Date</td>
                    <td><input type="date" name="resplved_date"></td>

                </tr>
            </table>
            <table class="table">
                <tr>
                    <td class="td">Tested By</td>
                    <td><select class="dropdown">
                            <option value="saurabh">Saurabh</option>
                        </select></td>
                    <td>Date</td>
                    <td><input type="text" name="tested_date"></td>
                    <td>Treat as deferred?</td>
                    <td><input type="checkbox" name="treat_as_deferred"></td>
                </tr>
            </table>
            <br>
           <input type="submit" value="Submit">
          <br><br><br><br><br><br><br>
        </div>

    </div>

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

