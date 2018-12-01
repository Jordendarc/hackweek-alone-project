var app = angular.module("myApp", ["ngRoute"]);

app.config(function($routeProvider) {
    // $locationProvider.html5Mode(true);
    $routeProvider
    .when("/", {
        templateUrl : "home.php",
        controller : 'homeCtrl',
        active : "home"
    })
    .when("/about", {
        templateUrl : "about.html",
        controller : 'aboutCtrl',
        active : "about"

    })
    .when("/contact", {
        templateUrl : "contact.html",
        controller : 'contactCtrl',
        active : "contact"
    })
    .when("/chatroom", {
        templateUrl : "chatroom.html",
        controller : 'chatroomCtrl',
        active : "chatroom"
    })
});
app.service('Page', function($rootScope){
return {
    setTitle: function(title){
        $rootScope.title = title;
    }
}
});
app.run(['$rootScope', '$location',  function($rootScope, $location) {
   var path = function() {
     return $location.path();
   };
   $rootScope.$watch(path, function(newVal, oldVal){
     $rootScope.activetab = newVal;
   });
}]);
app.controller("homeCtrl", function (Page, $scope, $route, $rootScope, $location) {
    Page.setTitle("Home");
    var path = function() {
      return $location.path();
    };
    $rootScope.$watch(path, function(newVal, oldVal){
      $rootScope.activetab = newVal;
    });
    // $scope.route = $route;
});
app.controller("aboutCtrl", function (Page, $scope, $route, $rootScope, $location) {
    Page.setTitle("About");
    var path = function() {
      return $location.path();
    };
    $rootScope.$watch(path, function(newVal, oldVal){
      $rootScope.activetab = newVal;
    });
    // $scope.route = $route;
});
app.controller("chatroomCtrl", function (Page, $scope, $route, $rootScope, $location) {
    Page.setTitle("Chatroom");
    var path = function() {
      return $location.path();
    };
    $rootScope.$watch(path, function(newVal, oldVal){
      $rootScope.activetab = newVal;
    });
    // $scope.route = $route;
});
app.controller("contactCtrl", function (Page, $scope, $route, $rootScope, $location) {
    Page.setTitle("Contact");
    var path = function() {
      return $location.path();
    };
    $rootScope.$watch(path, function(newVal, oldVal){
      $rootScope.activetab = newVal;
    });
    // $scope.route = $route;
});
