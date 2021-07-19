angular.module('myReverseFilterApp', [])
.filter('reverse', function() {
  return function(input) {
    input = input || '';
    var out = '';
    for (var i = 0; i < input.length; i++) {
      out = input.charAt(i) + out;
    }
       return out;
  };
})
.controller('MyController', ['$scope', 'reverseFilter', function($scope, reverseFilter) {
  $scope.yourName = 'World';
  $scope.filteredName = reverseFilter($scope.yourName);
}]);