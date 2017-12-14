// var app = angular.module('swtSearchApp', []);
//
// app.config(['$interpolateProvider', function($interpolateProvider) {
//     $interpolateProvider.startSymbol('<%');
//     $interpolateProvider.endSymbol('%>');
// }]);
//
// app.controller('swtSearchMainController', function ($scope, $http) {
//
//
//
//     $scope.current_conv = "a";
//
//
//     $scope.current;
//
//     $scope.messages = [];
//     $scope.id_of_users = [];
//
//     $scope.users = [];
//
//     $scope.init = function () {
//
//         // Ulazna točka aplikacije
//
//         //$scope.getUsers();
//
//         console.log('pozvanInit')
//     };
//
//     $http.get("chat/conversations")
//         .then(function (response) {
//
//                 //console.log(response.data);
//                 $scope.current = response.data[0];
//
//                 //console.log($scope.current);
//
//                 response.data.map(function(val){
//                     $scope.messages.push(val);
//
//                     console.log(val);
//
//                     if(!($scope.id_of_users.includes(val.sender_id))){
//                         $scope.id_of_users.push(val.sender_id);
//                     }
//
//                 });
//
//             }
//         );
//     /*
//     $http.get("get_users.php")
//         .then(function (response) {
//
//                 response.data.records.map(function(val){
//
//                     for(var i = 0; i < $scope.id_of_users.length; i++){
//                         if($scope.id_of_users[i] == val.id){
//                             $scope.users.push(val.name);
//                         }
//                     }
//
//                 });
//
//
//             }
//         );
//     */
//     $scope.change_conv = function(){
//
//     }
//
//
//
//
// });
// (function(){
//
//     angular.module("swtSearchApp", [])
//
//         .config(['$interpolateProvider', function($interpolateProvider) {
//             $interpolateProvider.startSymbol('<%');
//             $interpolateProvider.endSymbol('%>');
//         }])
//
//         .controller("swtSearchMainController", function($scope, $http){
//
//             $scope.selectConversation = function (con) {
//                 $scope.selectedConversation = con;
//             }
//
//             $scope.init = function () {
//
//                 // Ulazna točka aplikacije
//
//                 $scope.getMessages();
//                 $scope.getParticipants();
//                 $scope.getUsers();
//                 $scope.getConversations();
//
//                 console.log('pozvanInit')
//             };
//
//             $scope.getUsers = function () {
//
//                 $http({
//                     method: 'GET',
//                     url: API_USERS
//                 }).then(function successCallback(response) {
//                     $scope.users = response.data;
//                 }, function errorCallback(response) {
//                     // called asynchronously if an error occurs
//                     // or server returns response with an error status.
//                 });
//             }
//             $scope.getParticipants = function () {
//
//                 $http({
//                     method: 'GET',
//                     url: API_PARTICIPANTS
//                 }).then(function successCallback(response) {
//                     $scope.participants = response.data;
//                     //console.log($scope.participants)
//                 }, function errorCallback(response) {
//                     // called asynchronously if an error occurs
//                     // or server returns response with an error status.
//                 });
//             }
//             $scope.getConversations = function () {
//
//                 $http({
//                     method: 'GET',
//                     url: API_CONVERSATIONS
//                 }).then(function successCallback(response) {
//                     $scope.conversations = response.data;
//                     console.log($scope.conversations);
//                 }, function errorCallback(response) {
//                     // called asynchronously if an error occurs
//                     // or server returns response with an error status.
//                 });
//             }
//             $scope.getMessages = function () {
//
//                 $http({
//                     method: 'GET',
//                     url: API_MESSAGES
//                 }).then(function successCallback(response) {
//                     $scope.messages = response.data;
//                 }, function errorCallback(response) {
//                     // called asynchronously if an error occurs
//                     // or server returns response with an error status.
//                 });
//             }
//
//         })
// })();
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
