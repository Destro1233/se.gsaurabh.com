<!DOCTYPE html>
<html >
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/angular-filter/0.5.4/angular-filter.js"></script>
<body>
 
<div ng-app="myApp" ng-controller="customersCtrl">
 
<select ng-model="selectProgram">
<option></option>
<option ng-repeat="x in programes | unique: 'progname'" name="'"{{x.progname}}"'">{{ x.progname }}</option>
</select>
<select ng-model="selectNumber">
<option></option>
<option ng-repeat="x in programes | filterBy: ['progname']:selectProgram | filterBy: ['progrelease']:selectRelease | unique: 'prognumber'" name="'"{{x.prognumber}}"'">{{ x.prognumber }}</option>
</select>
<select ng-model="selectRelease">
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
 
</body>
</html>
