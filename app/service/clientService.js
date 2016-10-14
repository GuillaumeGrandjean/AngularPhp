/**
 * Created by PC on 12/10/2016.
 */
angular.module('service.client', ['ngStorage'])

.factory('clientService', [
  '$localStorage',
  '$rootScope',
  '$http',
  function ( $localStorage,
             $rootScope,
             $http   ) {

    var clientService = {};

    /*var options = {
      storageId: 'APP.CLIENTS'
    };

    var clients = [];

    clientService.add = function ( client ){
      if (!client) return;
      clients.push( client );
      $localStorage[options.storageId] = clients;
    };

    clientService.list = function (){
      var _favo = [];
      for (var i = 0; i < clients.length; i++) {
        _favo.push( clients[ clients.length - (i+1)] );
      }
      return _favo;
    };

    clientService.load = function (){
      var favoStorage = $localStorage[options.storageId];
      if ( angular.isArray(favoStorage) ){
        clients = favoStorage;
      }
    };

    clientService.clear = function (){
      clients = [];
      delete $localStorage[options.storageId];
    };*/

    var url = "server/";


    clientService.listRdv = function() {
      return $http({
         url: url + "selectClient.php",
         method: "GET",
        isArray: true,
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        }
      }).then(function(response)  {
        console.log(response.data);
        return response.data;
         //return clientService.transformResult(response.data, ClientModel)
         }, function(error) {
          return null;
       })
     };

        /*clientService.listRdv = function() {
          return $http({
            url: url + "selectClient.php",
            method: "GET",
            headers: {
              "Content-Type": "application/json"
            }
          }).then(function(response)  {
            return clientService.trans
            //return clientService.transformResult(response.data, ClientModel)
          }, function(error) {
            return null;
          })
        };*/


    clientService.addRdv = function(client) {

    };


    return clientService;
  }]);
