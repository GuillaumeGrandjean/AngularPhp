/**
 * Created by PC on 13/10/2016.
 */

angular.module('projectDentiste')
  .controller('RendezVousCtrl', ['$scope','clientService','$timeout', function ($scope,clientService,$timeout) {


    $scope.listeRdv = clientService.listRdv().then(function(result) {
        $scope.listeRdv = result.rendezVous;
    });

      console.log($scope.listeRdv);
  }]);
