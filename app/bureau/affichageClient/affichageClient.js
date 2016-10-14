/**
 * Created by PC on 12/10/2016.
 */
'use strict';

angular.module('projectDentiste')
  .controller('AffichageCtrl', ['clientService', function (clientService) {

    var affichageCtrl = this;

    clientService.load();

    affichageCtrl.clients = clientService.list();

    console.log(affichageCtrl.clients);

  }]);


