/**
 * Created by PC on 12/10/2016.
 */

angular.module('directive.commun', [])

  .directive("slInputTelDomicile",function(){
    return {
      require:"ngModel",
      link:function(scope,element,attrs,ngModelCtrl){
        function validateTelDomicile(value){
          if(value){
            var valid=regex.test(value,"");
            ngModelCtrl.$setValidity("telDomicileValidation",valid);
            var clean=value.replace(/[^0-9]+/g,"");
            value!==clean&&(value=clean,ngModelCtrl.$setViewValue(clean),ngModelCtrl.$render())
          }
          else ngModelCtrl.$setValidity("telDomicileValidation",!0);
          return value}if(ngModelCtrl){element.attr("maxlength","10");
          var regex=/^((\+|00)33\s?|0)[1-5](\s?\d{2}){4}$/;
          ngModelCtrl.$parsers.push(validateTelDomicile),
            ngModelCtrl.$formatters.push(validateTelDomicile),
            element.bind("keypress",function(event){32===event.keyCode&&event.preventDefault()})
        }
      }
    }
  })

  .directive("slInputTelMobile",function(){
    return{
      require:"ngModel",
      link:function(scope,element,attrs,ngModelCtrl){
        function validateTelMobile(value){
          if(value){
            var valid=regex.test(value,"");
            ngModelCtrl.$setValidity("telMobileValidation",valid);
            var clean=value.replace(/[^0-9]+/g,"");
            value!==clean&&(value=clean,ngModelCtrl.$setViewValue(clean),ngModelCtrl.$render())
          }
          else ngModelCtrl.$setValidity("telMobileValidation",!0);
          return value
        }
        if(ngModelCtrl){
          element.attr("maxlength","10");
          var regex=/^((\+|00)33\s?|0)[679](\s?\d{2}){4}$/;
          ngModelCtrl.$parsers.push(validateTelMobile),
            ngModelCtrl.$formatters.push(validateTelMobile),
            element.bind("keypress",function(event){32===event.keyCode&&event.preventDefault()})
        }
      }
    }
  })
/*.directive('slInputPhone', function () {
  return {
    require: 'ngModel',
    link: function (scope, elem, attr, ngModel) {

      function validatePhone(field) {
        var regexObj = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
        return regexObj.test(field);

      }

      function validate(value) {
        var valid = validatePhone(value);
        ngModel.$setValidity('phone', valid);
        return valid ? value : undefined;
      }

      //For DOM -> model validation
      ngModel.$parsers.unshift(function (value) {
        var valid = validatePhone(value);
        ngModel.$setValidity('phone', valid);
        return valid ? value : undefined;
      });

      //For model -> DOM validation
      ngModel.$formatters.unshift(function (value) {
        ngModel.$setValidity('phone', validatePhone(value));
        return value;
      });
    }
  };
});*/
