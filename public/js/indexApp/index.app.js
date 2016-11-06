var indexApp = angular.module('indexApp', [
    'ui.router',
    'angular-loading-bar',
    'ngMessages',
    'ui.bootstrap',
    'ngCountup',
    'ngMaterial'
]);

indexApp.config(function($stateProvider, $urlRouterProvider){
    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('index', {
            url : '/',
            templateUrl : '/templates/index.tpl',
            controller  : 'indexController'
        })
        .state('forbidden', {
            url : '/forbidden',
            templateUrl : 'angular/templates/forbidden.tpl'
        });
});

indexApp.controller('indexController', function ($scope, $http, $timeout) {
    $scope.feedback = {};

    $http.get('/api/landing/employees').then(function (response) {
        $scope.employees = response.data;
    });

    $http.get('/api/landing/services').then(function (response) {
        $scope.services = response.data;
    });

    $http.get('/api/landing/gallery').then(function (response) {
        $scope.gallery = response.data;
    });

    $scope.feedbackSubmit = function () {
        var that = this;
        if ( this.sendMessage.$valid ) {
            $http.post('/contacts/ajaxSendMessage/', $scope.feedback).then(function () {
                $scope.feedbackResult = true;
                that.sendMessage.$submitted
                    = that.sendMessage.name.$touched
                    = that.sendMessage.phone.$touched
                    = that.sendMessage.email.$touched
                    = that.sendMessage.text.$touched
                    = false;

                $timeout(function () {
                    $scope.feedbackResult = false;
                    $scope.feedback = {};
                }, 5000);

            }, function (response) {
                console.log(response);
            });
        }
    };

    $scope.feedbackResult = false;
});
