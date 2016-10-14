/**
 * Created by PC on 14/10/2016.
 */

angular.module("client.module", [])

.factory("ClientModel", [ function(){
    function ClientModel(data) {
        var defaults = {
            id: null,
            nom: null,
            prenom: null,
            dateNaissance: null,
            adresse: null,
            codePostal: null,
            ville: null,
            email: null,
            telFixe: null,
            telPortable: null,
            rendezVous: null
        };
        angular.extend(this, angular.copy(defaults), data)
    }
    return ClientModel.prototype = {}, ClientModel
}]);