var ajaxExample = angular.module('ajaxExample', []);

ajaxExample.controller('mainController',function($scope,$http){
	$scope.users;

	$scope.getUsers = function() {
        $http({
            method: 'GET',
            url: '/api/get.php'
        }).then(function (response) {// on success
            // this callback will be called asynchronously
            // when the response is available
            $scope.users = response.data;
        }, function (response) {// on error
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            console.log(response.data,response.status);
        });
	};

	$scope.addUser = function() {
        $http({
          method: 'POST',
          url:  '/api/post.php',
          data: {newName : $scope.newName, newNickName : $scope.newNickName }
        }).then(function (response) {
            
            $scope.getUsers();
            
        }, function (response) {// on error
            console.log(response.data,response.status);
        });
	};

  $scope.deleteUser = function( id ) {


  $http({
      method: 'POST',
      url:  '/api/delete.php',
      data: { userId : id }
    }).then(function (response) {
        
        $scope.getUsers();
        
    }, function (response) {
        console.log(response.data,response.status);
    });
  };

	$scope.getUsers();
});