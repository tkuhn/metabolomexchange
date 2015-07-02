/**
 * ANGLULAR APP
 **/
var mx = angular.module('mx', ['ngRoute']);

// $.getJSON('http://api.metabolomexchange.org/providers', function(data) {
//     for (var i in data) {
//         console.log(data[i].name);
//     }
// });


/**
 * ANGLULAR CONFIG
 **/
mx.config(function($routeProvider) {
    $routeProvider.
    when('/search', { templateUrl: 'app/views/search.html', controller: 'MxController' }).
    when('/search/:search', { templateUrl: 'app/views/search.html', controller: 'MxController' }).
    when('/provider/:search', { templateUrl: 'app/views/search.html', controller: 'MxController' }).
    when('/submitter/:search', { templateUrl: 'app/views/search.html', controller: 'MxController' }).    
    otherwise({ templateUrl: 'app/views/home.html', controller: 'MxController' });
});
/* ----------------------------*/

/**
 * ANGLULAR CONTROLLERS
 **/
mx.controller('MxController', ['$scope', '$routeParams', '$location', '$anchorScroll', 'mxApi',  
    function ($scope, $routeParams, $location, $anchorScroll, mxApi){ 

        $scope.doneLoading = '0'; 

        $scope.datasets = [];

        if ($routeParams.search){ $scope.search = $routeParams.search; }
        if (!$scope.search) { $scope.search = ''; }

        if ($location.path() === '/'){ // load provider for homepage
            mxApi.getProviders().then(function(d) { $scope.providers = d.data; }); 
        }

        $scope.scrollTo = function(id) {
            $location.hash(id);
            $anchorScroll();
        }

        $scope.updateResults = function(){

            $location.search('search', $scope.search);

            if ($location.path() !== '/search' && $scope.search.length >= 1){
                $location.path('search');
                $location.replace();
                $location.hash('top');
                $anchorScroll();
            }
                
        }

        if ($scope.search && $scope.search != ''){
            mxApi.findDatasets($scope.search).then(function(d) { $scope.doneLoading = '1'; $scope.datasets = d.data; });
        } else {
            $scope.doneLoading = '1'; 
        }

        // set focus to search
        if (document.getElementById("search")) { document.getElementById("search").focus(); } 
    }
]);

mx.factory('mxApi', function($http) {

    var useCache = false;

    return {
        getDatasets: function() { return $http.get('http://api.metabolomexchange.org/datasets', { cache: useCache }); },
        getDataset: function(provider, accession) { return $http.get('http://api.metabolomexchange.org/provider/' + provider + '/' + accession, { cache: useCache }); },
        getProviders: function() { return $http.get('http://api.metabolomexchange.org/providers', { cache: useCache }); },
        getProvider: function(provider) { return $http.get('http://api.metabolomexchange.org/provider/' + provider, { cache: useCache }); },
        findDatasets: function(search) { 
            console.log(search);
            var andMatch = search.replace(new RegExp(' ', 'g'), '&');
            var searchUrl = 'http://api.metabolomexchange.org/datasets/' + andMatch;
            console.log("Search url: ", searchUrl);
            return $http.get(searchUrl, { cache: useCache }); 
        }
    };
});

/* ----------------------------*/
