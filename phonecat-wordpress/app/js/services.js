'use strict';

/* Services */

var phonecatServices = angular.module('phonecatServices', ['ngResource']);

phonecatServices.factory('Phone', ['$resource',
  function($resource){
    return $resource('http://angularwp/wp-json/posts?type[]=movil', {}, {
      query: {method:'GET', isArray:true}
    });
  }]);
