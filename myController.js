
    // Defining angularjs application.
    var postApp = angular.module('postApp', ['ngMessages']);
    // Controller function and passing $http service and $scope var.
    postApp.controller('postController', function($scope, $http) {
      // create a blank object to handle form data.
        $scope.user = {};
      // calling our submit function.
	    
        $scope.submitForm = function() {
        // Posting data to php file
		 if ($scope.userForm.$valid) {
        $http({
          method  : 'POST',
          url     : 'http://localhost/talkiedo/producer/add_producer',
          data    : $scope.user, //forms user object
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         })
          .success(function(data) {
            if (data.errors) {
              // Showing errors.
              $scope.errorName = data.errors.address1;
              $scope.errorUserName = data.errors.address2;
              $scope.errorEmail = data.errors.address13;
            } else {
              $scope.message = data.message;
            }
          });
		}else {
      alert("There are invalid fields");
    }
        };
    });
