// main.js
var app = angular.module('myApp', ['ngGrid']);
app.controller('MyCtrl', function($scope) {
    $http.get('https://raw.githubusercontent.com/zuxfer/root/gh-pages/p/passData.json').success(function (thisdata) {
    //Convert data to array.
    var myData =  $.parseJSON(JSON.parse(thisdata));
    $scope.myData  =  myData; 
});

    //$scope.myData = [{name: "Moroni", age: 50},
     //                {name: "Tiancum", age: 43},
     ///                {name: "Jacob", age: 27},
      //               {name: "Nephi", age: 29},
      //               {name: "Enos", age: 34}];
    $scope.gridOptions = { data: 'myData' };
});
