    //var app0 = angular.module('myApp0', ["ngRoute"]);
	var app = angular.module('myApp', ["ngRoute"]);

    app.config(['$routeProvider', function($routeProvider) {
		$routeProvider.
			when('addtopic', {template: 'forum', controller: 'ForumController', method: 'add_topic',}).
			when('removetopic', {template: 'forum', controller: 'ForumController', method: 'remove_topic',}).
			when('updatetopic', {template: 'forum', controller: 'ForumController', method: 'update_topic',}).
			otherwise({redirectTo: '/'});
	}]);
	
	app.value('myVars', {row_id:-1});
		
	app.controller('topicListCtr', function($scope, $document,  $http ,myVars) {


		$scope.isDisabled = true;

		
		$scope.disableClick =function($id){
			
			if($scope.isDisabled){
				$scope.isDisabled = false;
			}
			else{
				$scope.isDisabled = true;
			}

			myVars.row_id = $id;
			
			 
			var queryResult = $document[0].getElementById('hrefText'+$id);
			var hrefText = angular.element(queryResult)[0].text;
			
		    
			var queryResult = $document[0].getElementById('edit_header');
            angular.element(queryResult)[0].value = hrefText;
			
		}
	});
	
	app.controller('myCtrAdd', function($scope, $http) {

		$scope.addTopic=function(){

			var data = [{
					'header':$('#header').val(),
					'content':$('#topic').val()
					}];


			$http.post('addtopic',data)
				.success(function mySucces(response) {
					if(response == 1){
						window.location.reload();
					}
				});
		}
		

	});
	
	app.controller('myCtrRemove', function($scope, $http ,myVars) {

		$scope.removeTopic=function(){
			
			var data = [{
					'id'    : myVars.row_id,
					}];
					
			$http.post('removetopic',data)
				.success(function mySucces(response) {
					if(response == 1){
						window.location.reload();
					}
				});
		}

	});
	
	app.controller('myCtrEdit', function($scope,$document, $http ,myVars) {
		
		$scope.editTopic=function(){
			
			
			var queryResult = $document[0].getElementById('edit_header');
            var edit_header = angular.element(queryResult)[0].value;
			
			var data = [{
				'id'    : myVars.row_id,
				'header': edit_header
				}];
			

			$http.post('updatetopic',data)
				.success(function mySucces(response) {
					console.log(response);
						if(response == 1){
							window.location.reload();
						}
					});
		}

	});

	
	
	

	