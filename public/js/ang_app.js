(function(){

    angular.module("swtSearchApp", [])

        .config(['$interpolateProvider', function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        }])

        .controller("swtSearchMainController", function($scope, $http){

            var API_USER

            $scope.selectUser = function (user) {
                $scope.selectedUser = user;
                console.log($scope.selectedUser)
            }
            $scope.select_user = function (usr) {
                $scope.selected_user = usr;
                // console.log($scope.selected_user);
                // API_USER = "{{ route('users','')}}" + '/' +  $scope.selected_user
            }

            $scope.search = function(){
                $http.post("http://localhost/switcher/public/users/1").success(function(data) {
                    $scope.users = eval(data);// Update Model-- Line X
                });
            }

            $scope.init = function () {

                // Ulazna točka aplikacije

                $scope.getUsers();
                $scope.getProfessors();

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
            
            $scope.getProfessors = function () {

                $http({
                    method: 'GET',
                    url: API_GET_PROFESORS
                }).then(function successCallback(response) {
                    $scope.professors = response.data;
                }, function errorCallback(response) {
                    // called asynchronously if an error occurs
                    // or server returns response with an error status.
                });
            }


        })
})();
