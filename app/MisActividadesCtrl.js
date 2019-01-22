var myApp = angular.module("misActividades", []);
//controlador angular para consumir un webservices que retorna un objeto JSON con todos los elementos de la consulta
myApp.controller('codiCola', function ($scope, $http) {	
	// $http.get("http://127.0.0.1/actividades/webservices/allPosts.php")
	// .success(function(response){
	// 	$scope.posts = response;
	//console.log($scope.posts);
	// });

	// $scope.eliminarParticipante = function (codi) {
	// 	var datos = $('.actividad').val();
	// 	alert(datos);
	// 	$http.post("service.php?controller=servicio&action=asignarCliente", {
	// 		'codiCola': codi,
	// 		'codiActi': $scope.codiCliente
	// 	}).success(function (data, status, headers, config) {
	// 		if (data == 1) {
	// 			var $toastContent = $('<span>Se Asigno el cliente correctamente.</span>');
	// 			Materialize.toast($toastContent, 5000, 'green');

	// 			$scope.btnSave = false;
	// 			$scope.btnChange = true;
	// 			$scope.btnCancel = false;
	// 			$scope.bCliente = true;
	// 			$('.input-off-client').prop('disabled', true);
	// 		} else {
	// 			var $toastContent = $('<span>Error! No se pudo enviar los datos.</span>');
	// 			Materialize.toast($toastContent, 5000, 'red');
	// 		}
	// 	});
	// }

	$scope.listaParticipantes = [];

	// $scope.getParticipantes = function () {
	// 	$scope.idDetalle = idDetalle;//titulo

    //     $http.post("service.php?controller=MisActividades&action=getParticipantes",{
    //         'title': idDetalle
    //         }).success(function (data, status, headers, config) {
	// 		$scope.listaParticipantes = data;
	// 		//console.log(data);
	// 	});
	// 	response.error(function (data, status, headers, config) {
	// 		alert("Ha fallado la petición. Estado HTTP:" + status);
	// 	});
	// }
	// $scope.getParticipantes();

	$scope.actividad = [];
	$scope.getActividad = function () {
		var config={
            method:"GET",
            url:"service.php?controller=MisActividades&action=getActividad"
		}
		var response = $http(config);
		response.success(function (data, status, headers, config) {
			$scope.actividad = data;
			//console.log(data);
		});
		response.error(function (data, status, headers, config) {
			alert("Ha fallado la petición. Estado HTTP:" + status);
		});
	}
	$scope.getActividad();

	$scope.mostrar = function(){
		alert($(".txtIdActividad").val());
	}
});