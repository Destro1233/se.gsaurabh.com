<!DOCTYPE html>
<html >
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<body>
 
<div ng-app="myApp" ng-controller="customersCtrl">
 

  <p ng-repeat="x in names">
{{ x.progname }} &nbsp;&nbsp;&nbsp;&nbsp; {{ x.prognumber }} &nbsp;&nbsp;&nbsp;&nbsp; {{ x.progrelease }}

</div>
 
<script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
   $http.get("program_db.php")
   .success(function (response) {$scope.names = response.records;});
});
</script>
 
</body>
</html>
