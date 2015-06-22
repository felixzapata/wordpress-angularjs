'use strict';

/* Controllers */

var phonecatControllers = angular.module('phonecatControllers', []);

phonecatControllers.controller('PhoneListCtrl', ['$scope', 'Phone',
  function($scope, Phone) {
    $scope.phones = Phone.query();
    $scope.orderProp = 'age';
  }]);

phonecatControllers.controller('PhoneDetailCtrl', ['$scope', '$routeParams', '$resource',
  function($scope, $routeParams, $resource) {
    var detailPhone = $resource('http://angularwp/wp-json/posts/:phoneId');
    var detailImagesPhone = $resource('http://angularwp/wp-json/media?filter[post_parent]=:phoneId');
    $scope.phone = detailPhone.get({phoneId: $routeParams.phoneId});

    $scope.phoneImages = detailImagesPhone.query({phoneId: $routeParams.phoneId}, function(phone) {
      $scope.mainImageUrl = phone.guid;
    });

    $scope.setImage = function(imageUrl) {
      $scope.mainImageUrl = imageUrl;
    };
  }]);
