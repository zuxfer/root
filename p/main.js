// main.js
var app = angular.module('myApp', ['ngGrid']);
var mainInfo = null;
$http.get('passData.json').success(function(data) {
    mainInfo = data;
});
$scope.myData = mainInfo;
    //$scope.myData = [{name: "Moroni", age: 50},
     //                {name: "Tiancum", age: 43},
     ///                {name: "Jacob", age: 27},
      //               {name: "Nephi", age: 29},
      //               {name: "Enos", age: 34}];
    $scope.gridOptions = { data: 'myData' };
});
