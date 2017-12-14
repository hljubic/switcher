(function(){

    angular.module("swtSearchApp", [])

        .config(['$interpolateProvider', function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        }])

        .controller("swtSearchMainController", function($scope, $http){

            $scope.init = function () {

                // Ulazna točka aplikacije

                $scope.getUsers();

                console.log('pozvanInit')
            };

            $scope.getUsers = function () {

                $http({
                    method: 'GET',
                    url: API_USERS
                }).then(function successCallback(response) {
                    $scope.users = response.data;
                }, function errorCallback(response) {
                    // called asynchronously if an error occurs
                    // or server returns response with an error status.
                });
            }


        })
})();
