var a_app=angular.module('bodhitree_dashboard_package', ['ui.bootstrap','ngProgressLite']);
a_app.factory('Scopes', function ($rootScope) {
	    var mem = {};
	    return {
	        store: function (key, value) {
	            mem[key] = value;
	        },
	        get: function (key) {
	            return mem[key];
	        }
	    };
});
a_app.controller('package_controller',function ($scope, $uibModal,ngProgressLite,$timeout,$http,Scopes){
	$scope.s_results=slctd_pckg_books;
	Scopes.store('package_controller', $scope);
	$scope.packageDialog=function(size){
		 $scope.show = 0;
		 ngProgressLite.start();
		 ngProgressLite.set(0.2);
		 $scope.animationsEnabled = true;
		 var modalInstance = $uibModal.open({
		      animation: $scope.animationsEnabled,
		      templateUrl: 'package_modal_template.html',
		      controller: 'ModalInstanceCtrl',
		      size: size,
		      resolve: {
		        ngProgressLite:ngProgressLite,
			    $http:function () {
			          return $http;
			    }
		        
		      }
		 });
	};
	$scope.remove_item=function($event,id){
		$event.preventDefault();
		var sbooks=$scope.s_results;
		var new_ar=[];
	  	angular.forEach(sbooks,function(boo,i){
	  		if(boo.id!=id){ 
	  			new_ar.push(boo);
	  		}     
	  	});
	  	sbooks=new_ar;
	  	$scope.s_results=sbooks;
	}
	
});
a_app.controller('ModalInstanceCtrl', function ($scope, $uibModalInstance,ngProgressLite,$http,Scopes){
	
  	$scope.currentPage = 0;
    $scope.pageSize = 12;  
    $scope.results=[];
    $scope.s_results=slctd_pckg_books;
    var books=$scope.results;
    $http.get(config.base.concat('admin/bodhitreebooks/package/get_all_books')).then(function(response){
         $scope.results=response.data;
         books=$scope.results;
         ngProgressLite.done();
    }); 	 
    $scope.numberOfPages=function(){
    	
        return Math.ceil($scope.results.length/$scope.pageSize);   
                     
    }
    $scope.checkboxes = [];
    
    var sbooks=$scope.s_results;
	$scope.alert = function(index,id){
	  
	  if($scope.checkboxes[index]!=0){
	  	var the_string = "pac_book_slc_"+id;
	  	$scope[the_string]="active";
	  	angular.forEach(books,function(book,i){
	  		
	  		if(book.id==id){ 
	  			var is_ex=false;
	  			angular.forEach(sbooks,function(books,j){
	  			  if(books.id==id){
	  			  	is_ex=true;
	  			  	
	  			  }
	  			});
	  			if(!is_ex){ 
	  				sbooks.push(book);
	  				$scope.s_results=sbooks;
	  				Scopes.get('package_controller').s_results=$scope.s_results;
	  				console.log($scope.s_results);
	  			}
	  		}
	  		
	  	});
	  }else{
	  	var the_string="pac_book_slc_"+id;
	  	$scope[the_string]="";
	  	var new_ar=[];
	  	angular.forEach(sbooks,function(boo,i){
	  		if(boo.id!=id){ 
	  			new_ar.push(boo);
	  		}     
	  	});
	  	sbooks=new_ar;
	  	$scope.s_results=sbooks;
	  	Scopes.get('package_controller').s_results=$scope.s_results;
	  }
	}
    $scope.ok = function () {
      $uibModalInstance.close();
    };
	$scope.cancel = function () {
	  $uibModalInstance.dismiss('cancel');
	};
  
});
a_app.filter('startFrom', function() {
    return function(input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
});