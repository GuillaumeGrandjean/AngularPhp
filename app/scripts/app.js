'use strict';

/**
 * @ngdoc overview
 * @name webstormProjectsApp
 * @description
 * # webstormProjectsApp
 *
 * Main module of the application.
 */
angular
  .module('projectDentiste', [
    'ngAnimate',
    'ngCookies',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch',
    'ui.bootstrap',
    'ui.calendar',
    'service.client',
    'directive.commun'
  ])
  .config(function ($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl',
        controllerAs: 'main'
      })
      .when('/about', {
        templateUrl: 'views/about.html',
        controller: 'AboutCtrl',
        controllerAs: 'about'
      })
      .when('/enregistrement', {
        templateUrl: 'bureau/inscription/inscription.html',
        controller: 'InscriptionCtrl',
        controllerAs: 'inscription'
      })
      .when('/affichage', {
        templateUrl: 'bureau/rendezVous/rendezVous.html',
        controller: 'RendezVousCtrl',
        controllerAs: 'rendezVous'
      })
      .otherwise({
        redirectTo: '/'
      });
  });
