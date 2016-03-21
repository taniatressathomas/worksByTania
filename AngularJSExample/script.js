// create a module
var app = angular.module('app',[]);

//create controller
app.controller('appController',function($scope,$http,$timeout,xmlFactory,sortDataOnID){

  //fetching json data
   $http.get('api1.json').success(function(json){
   //sorting the json data retrieved
   $scope.sortedJSON = json.person.sort(sortDataOnID.sortID);
   //console.log($scope.sortedJSON);
   $scope.people = $scope.sortedJSON;
   $scope.peopleJSON = json;
  }).error(function(json,status){
    alert("Unable to retrieve json data");
  });
  
  
  //fetching  xml file
  function fetchxmlData(){
    xmlFactory.getXML().success(function(xml){
      //converting xml to json for retreiving data
      var x2js = new X2JS();
      var json = x2js.xml_str2json(xml);
      var personxml = json.persons.person;
      $scope.sortObject = personxml.sort(sortDataOnID.sortID);
      $scope.people = $scope.sortObject;
      $scope.xmlpeople = json.persons;
    });
  }
  $timeout(fetchxmlData,5000);
  
  //fetching full list of data from json and xml
  function fullListPeople(){
    if( $scope.peopleJSON.person && $scope.xmlpeople.person){
      json = $scope.peopleJSON.person;
      xml = $scope.xmlpeople.person;
      $scope.fullList = xml.concat(json);
      var dataToSort = $scope.fullList;
      $scope.sortedFullList =   dataToSort.sort(sortDataOnID.sortID);
      $scope.people = $scope.sortedFullList;
    }
  }
  $timeout(fullListPeople,10000);
  
});

//fetching xml data in factory
app.factory('xmlFactory',function($http){
    var factory =[];
    factory.getXML = function(){
      return $http.get('api2.xml')
     }
     return factory;
});

// factory for sorting json data
app.factory('sortDataOnID',function(){
  return {
       sortID : function(a,b){
          return a.id-b.id;
      }
  };
});

  