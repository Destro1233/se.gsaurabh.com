<!DOCTYPE html>
<html >
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/angular-filter/0.5.4/angular-filter.js"></script>
<body>
 
<div ng-app="myApp" ng-controller="customersCtrl">
 
<table>
  <tr ng-repeat="x in programes">
    <td>{{ x.progname }}</td>
    <td>{{ x.prognumber }}</td>
    <td>{{ x.progrelease }}</td>
  </tr>
</table>
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
