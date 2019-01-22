<?php 
	//FUNCIONES PARA EL CONTROLADOR FRONTAL
	function cargarControlador($controller){
		$controlador = ucwords($controller).'Controller';
		$strFileController = "controlador/".$controlador.".php";

		if (!is_file($strFileController)) {
			$strFileController = "controlador/".ucwords(CONTROLADOR_DEFECTO).'Controller.php';
		}
		require_once $strFileController;
		$controllerObj = new $controlador();
		return $controllerObj;
	}

	function cargarAccion($controllerObj, $accion){
		$accion = $accion;
		$controllerObj->$accion();
	}

	function lanzarAccion($controllerObj){
		if (isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])) {
			cargarAccion($controllerObj, $_GET["action"]);
		}else{
			cargarAccion($controllerObj, ACCION_DEFECTO);
		}
	}
	
	//LEER LOS TIPOS DE ERROd
	function tipoError($error){
		switch ($error) {
			case 'config-success':
				echo "<div class='alert alert-success'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  						<span aria-hidden='true'>&times;</span>
						</button>
						Se agregó la información empresarial de forma correcta.
					  </div>";
				break;

			case 'config-error':
				echo "<div class='alert alert-danger'>No se pudo guardar los cambios, intente nuevamente.</div>";
				break;

			case 'not-found':
				echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> 
			        	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> 
			        	<strong>El acceso no es valido.
			    	  </div>";
				break;
				

			case 'success-insert':
				echo "<div class='alert alert-success'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  						<span aria-hidden='true'>&times;</span>
						</button>
						<b>Se agrego el registro de forma correcta</b>
					  </div>";
				break;

			case 'success-delete':
				echo "<div class='alert alert-success'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  						<span aria-hidden='true'>&times;</span>
						</button>
						El registro fue eliminado con Éxito!
					  </div>";
				break;

			case 'success-upload':
				echo "<div class='alert alert-success alert-dismissible fade in' role='alert'> 
			        	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> 
			        	<b>Los datos fueron guardados de forma correcta.</b>
			    	  </div>";
				break;

			case 'success-update':
				echo "<div class='alert alert-warning alert-dismissible fade in' role='alert'> 
			        	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> 
			        	<b>El registro se actualizo de forma correcta.</b>
			    	  </div>";
				break;

			case 'success-import':
				echo "<div class='alert alert-success alert-dismissible fade in' role='alert'> 
			        	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> 
			        	<span class='glyphicon glyphicon-ok'></span> <b>Se importaron todos los datos de forma correcta.</b>
			    	  </div>";
				break;

			case 'success-assist':
				echo "<div class='alert alert-success alert-dismissible fade in' role='alert'> 
			        	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> 
			        	<span class='glyphicon glyphicon-ok'></span> <b>Su Asistencia fue registrada.</b>
			    	  </div>";
				break;

			case 'error-assist':
				echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> 
			        	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> 
			        	<span class='glyphicon glyphicon-ok'></span> <b>Su asistencia no fue registrada.</b>
			    	  </div>";
				break;

			case 'data-biometrico':
				echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> 
			        	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> 
			        	<span class='glyphicon glyphicon-ok'></span> <b>No tiene un código de biometrico asignado.</b>
			    	  </div>";
				break;
				

			case 'error-insert':
				echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> 
			        	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> 
			        	<b>El registro no se pudo ser guardado.</b>
			    	  </div>";
				break;

			case 'error-file-txt':
				echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> 
			        	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> 
			        	<b>Archivo no valido, vuelva a intentar.</b>
			    	  </div>";
				break;

			// success-auth
			case 'success-auth':
				echo "<div class='alert alert-success alert-dismissible fade in' role='alert'> 
			        	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> 
			        	<b>Acceso Autorizado</b>
			    	  </div>";
				break;
			// danger-auth
			case 'danger-auth':
				echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> 
			        	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> 
			        	<b>Su acceso no es valido.</b>
			    	  </div>";
				break;
			// error-auth	
			case 'error-auth':
				echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> 
			        	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> 
			        	<b>Error al enviar la información</b>
			    	  </div>";
				break;
			
			// finish-auth
			case 'finish-auth':
				echo "<div class='alert alert-warning alert-dismissible fade in' role='alert'> 
			        	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> 
			        	<b>Autorización finalizada.</b>
			    	  </div>";
				break;

			default:
				echo "No busques errores XD";
				break;
		}
	}


	function nombreCorto($string){
		$Buscar_texto = array('á','é','í','ó','ú','Á','É','Í','Ó','Ú','Ñ','ñ','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',' ');
		$Remplazar_por= array('a','e','i','o','u','a','e','i','o','u','n','n','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','-');
	 	return (str_replace($Buscar_texto,$Remplazar_por, $string));
	}

	function uploadFile($estado, $directory, $image){
		switch ($estado) {
			case 'new':
				$ruta = "assets/image/".$directory."/";
				$NombreImagen= $_FILES[$image]['name'];
				$Archivo = $_FILES[$image]['tmp_name'];
				$time = time();
				move_uploaded_file($Archivo,$ruta.$time.'-'.$NombreImagen);

				$ruta = $ruta.$time.'-'.$NombreImagen;
				$imagen = substr($ruta,7);
				return $imagen;

				break;

			case 'upadate':
				$ruta = "assets/image/".$directory."/";
				$NombreImagen= $_FILES[$image]['name'];
				$Archivo = $_FILES[$image]['tmp_name'];
				$time = time();
				move_uploaded_file($Archivo,$ruta.$time.'-'.$NombreImagen);

				$ruta = $ruta.$time.'-'.$NombreImagen;
				$imagen = substr($ruta,7);
				return $imagen;
				
				break;
			
			default:
				# code...
				break;
		}
		
	}

	function calcHora($inicio, $fin){
		// $resta = strtotime($fin) - strtotime($inicio);
		// $dif = date("h:i:s", $resta); //01:57:48
		$dif = date("H:i:s", strtotime("00:00:00") + strtotime($fin) - strtotime($inicio) );
		return $dif ;
	}
	
	function sumar($h1,$h2, $h3){
		$h2h = date('H', strtotime($h2));
		$h2m = date('i', strtotime($h2));
		$h2s = date('s', strtotime($h2));
		$hora2 =$h2h." hour ". $h2m ." min ".$h2s ." second";

		$h3h = date('H', strtotime($h3));
		$h3m = date('i', strtotime($h3));
		$h3s = date('s', strtotime($h3));
		$hora3 =$h3h." hour ". $h3m ." min ".$h3s ." second";
		 
		$horas_sumadas= $h1." + ". $hora2." + ". $hora3;
		$text=date('H:i', strtotime($horas_sumadas)) ;
		return $text;
	 
	}

	function sumarDia($h1,$h2,$h3,$h4,$h5,$h6,$h7){
		$h1h = date('H', strtotime($h1));
		$m1m = date('i', strtotime($h1));

		$h2h = date('H', strtotime($h2));
		$m2m = date('i', strtotime($h2));

		$h3h = date('H', strtotime($h3));
		$m3m = date('i', strtotime($h3));

		$h4h = date('H', strtotime($h4));
		$m4m = date('i', strtotime($h4));

		$h5h = date('H', strtotime($h5));
		$m5m = date('i', strtotime($h5));

		$h6h = date('H', strtotime($h6));
		$m6m = date('i', strtotime($h6));

		$h7h = date('H', strtotime($h7));
		$m7m = date('i', strtotime($h7));
		 
		$sumarH = $h1h + $h2h + $h3h + $h4h + $h5h + $h6h + $h7h;
		$sumarM = $m1m + $m2m + $m3m + $m4m + $m5m + $m6m + $m7m;

		if ($sumarM >=60 ) {
			// echo "mayor que ";
			$resto = round($sumarM/60,0,PHP_ROUND_HALF_DOWN);
			$sumarH = $sumarH + $resto;

			$residuo = $sumarM%60;

			
			if ($residuo < 10) {
				$text = $sumarH.":".$residuo."0";
			}else{
				$text = $sumarH.":".$residuo;
			}

		}else{

			if ($sumarM < 10) {
				$text = $sumarH.":".$sumarM."0";
			}else{
				$text = $sumarH.":".$sumarM;
			}
			
		}
		
		// $text=$horas_sumadas ;
		// $text=date('H:i', strtotime($horas_sumadas)) ;
		return $text;
	 
	}

	function formatTime($hora){
		if ($hora != null) {
			$h1h = date('H', strtotime($hora));
			if ($h1h >= 12) {
				
				$Hora = date('h:i:s', strtotime($hora))." p. m.";
			}else{
				$Hora = date('h:i:s', strtotime($hora))." a. m.";			
			}
		}else{
			$Hora = " - ";
		}
		
		return $Hora;
	}
	function formatMonth($mes){
		switch ($mes) {
			case '1':
				return "Enero";
				break;
			case '2':
				return "Febrero";
				break;
			case '3':
				return "Marzo";
				break;
			case '4':
				return "Abril";
				break;
			case '5':
				return "Mayo";
				break;
			case '6':
				return "Junio";
				break;
			case '7':
				return "Julio";
				break;
			case '8':
				return "Agosto";
				break;
			case '9':
				return "Setiembre";
				break;
			case '10':
				return "Octubre";
				break;
			case '11':
				return "Noviembre";
				break;
			case '12':
				return "Diciembre";
				break;
			
			default:
				return "";
				break;
		}
	}
	function formatMonthCero($Mes){
		if ($Mes < 10) {
			$Data = "0".$Mes;
		}else{
			$Data = $Mes;
		}
		return $Data;
	}


	function DiferenciaDias($fecha_i,$fecha_f){
		$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
		$dias 	= abs($dias); $dias = floor($dias);		
		return $dias;
	}
	function diaSemana($fecha){
		$fechats = strtotime($fecha); //a timestamp 

		//el parametro w en la funcion date indica que queremos el dia de la semana 
		//lo devuelve en numero 0 domingo, 1 lunes,.... 
		switch (date('w', $fechats)){ 
		    case 0: return "Domingo"; break; 
		    case 1: return "Lunes"; break; 
		    case 2: return "Martes"; break; 
		    case 3: return "Miercoles"; break; 
		    case 4: return "Jueves"; break; 
		    case 5: return "Viernes"; break; 
		    case 6: return "Sabado"; break; 
		}  
	}

	function diaSemanaAbbr($fecha){
		$fechats = strtotime($fecha); //a timestamp 

		//el parametro w en la funcion date indica que queremos el dia de la semana 
		//lo devuelve en numero 0 domingo, 1 lunes,.... 
		switch (date('w', $fechats)){ 
		    case 0: return "Do"; break; 
		    case 1: return "Lun"; break; 
		    case 2: return "Mar"; break; 
		    case 3: return "Mie"; break; 
		    case 4: return "Jue"; break; 
		    case 5: return "Vie"; break; 
		    case 6: return "Sab"; break; 
		}  
	}



	function dateTimeFormat($fecha){
		$FechaGet = explode(" ", $fecha);
		$FechaX = explode("-", $FechaGet[0]);
		$HoraX = $FechaGet[1];

		$FechaXAnio = $FechaX[0];
		$FechaXMes = $FechaX[1];
		$FechaXDia = $FechaX[2];
		return diaSemana($fecha).", ".$FechaXDia." de ".formatMonth($FechaXMes)." del ".$FechaXAnio." <br> Hora: ".formatTime($HoraX);
	}
	function nombreDia($num){
		switch ( $num){ 
		    case 1: return "Lunes"; break; 
		    case 2: return "Martes"; break; 
		    case 3: return "Miercoles"; break; 
		    case 4: return "Jueves"; break; 
		    case 5: return "Viernes"; break; 
		    case 6: return "Sabado"; break; 
		    case 7: return "Domingo"; break; 
		}  
	}
	function sumMinHora($horaInicial, $minutoAnadir){
		// $horaInicial="14:59";
		// $minutoAnadir=2;
		 
		$segundos_horaInicial=strtotime($horaInicial);
		 
		$segundos_minutoAnadir=$minutoAnadir*60;
		 
		$nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);
		 
		return $nuevaHora;
	}
	function resMinHora($horaInicial, $minutoAnadir){
	 
		$segundos_horaInicial=strtotime($horaInicial); 
		$segundos_minutoAnadir=$minutoAnadir*60; 
		$nuevaHora=date("H:i:s",$segundos_horaInicial-$segundos_minutoAnadir);
		return $nuevaHora;
	}

	function restarHora($h1, $h2){
		// echo $hs1 = strtotime($h1);
		// echo "<br>";
		// echo $hs2 = strtotime($h2);

		// $strStart = '09:30:00'; 
   		// $strEnd   = '11:15:47';
		$dteStart = new DateTime($h1);
   		$dteEnd   = new DateTime($h2); 
   		$dteDiff  = $dteStart->diff($dteEnd); 
   		$nuevaHora = $dteDiff->format("%H:%I:%S"); 

		// $datetime1 = date_create('2009-10-11 ');
		// $datetime2 = date_create('2009-10-13 ');
		// $interval = date_diff($datetime1, $datetime2);
		// echo $interval->format('%R%a días');
		// echo $interval->format('%R%a días');

		// $nuevaHora = date_diff($datetime1, $datetime2);
		// $nuevaHora = date("H:i:s", $hs1 - $hs2);
		// $nuevaHora = $hs1 - $hs2;
		return $nuevaHora;
	}
	function addCero($num){
		if ($num < 10) {
			$num = "0".$num;
		}else{
			$num = $num;
		}
		return $num;
	}

	function formatTimeHM($hora){
		// $h2h = date('H', strtotime($hora));
		// $h2m = date('i', strtotime($hora));
		// $HoraMS =$h2h." hour ". $h2m ." min ";
		$text=date('H:i', strtotime($hora)) ;
		return $text;
	}

	function sumHoraTotal($hora, $min, $seg){

		// $SumMin = round($seg/60,0,PHP_ROUND_HALF_DOWN);
		$SumMin = floor($seg/60);
		$SegFND = $seg%60;
		//$SumHora = round($min/60,0,PHP_ROUND_HALF_DOWN);
		$SumHora = floor($min/60);
		// echo $min/60;
		// echo "<br>";
		$MinFND = $min%60;

		$horaFND = $hora + $SumHora;
		if ($horaFND<10) {
			$horaFND = "0".$horaFND;
		}
		$MinutoFND = $MinFND+$SumMin;
		if ($MinutoFND<10) {
			$MinutoFND = "0".$MinutoFND;
		}

		if ($SegFND<10) {
			$SegFND = "0".$SegFND;
		}


		// echo "Horas: ".$horaFND." : ".$MinutoFND." : ".$SegFND;
		$HoraSumada = $horaFND.":".$MinutoFND.":".$SegFND;
		return $HoraSumada;
	}


	function diferenciaFecha($Inicio, $Fin){

		$dias = (strtotime($Inicio)-strtotime($Fin))/86400;
		$dias = abs($dias); 
		$dias = floor($dias);
		$Diferencia = $dias + 1;

		// $datetime1 = new DateTime($Inicio);
		// $datetime2 = new DateTime($Fin);
		// $interval = $datetime1->diff($datetime2);
		// $Diferencia = $interval->format('%R%a días');


		// $nuevafecha = strtotime ( '+1 day' , strtotime ( $Diferencia ) ) ;
		// $nuevafecha = date ( 'Y-m-j' , $nuevafecha );

		return $Diferencia;
	}

	function restarDiaFecha($fecha,$dias){
		// $fecha = date('Y-m-j');
		$nuevafecha = strtotime ( '-'.$dias.' day' , strtotime ( $fecha ) ) ;
		$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
		 
		return $nuevafecha;
	}
	function sumarDiaFecha($fecha,$dias){
		// $fecha = date('Y-m-j');
		$nuevafecha = strtotime ( '+'.$dias.' day' , strtotime ( $fecha ) ) ;
		$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
		 
		return $nuevafecha;
	}

	function getBrowser(){
		$user_agent = $_SERVER['HTTP_USER_AGENT'];

		if(strpos($user_agent, 'MSIE') !== FALSE){
		   return 'Internet Explorer';
		}else if(strpos($user_agent, 'Edge') !== FALSE){
		   return 'Microsoft Edge';//Microsoft Edge
		}else if(strpos($user_agent, 'Trident') !== FALSE){
			return 'Internet Explorer';
		}else if(strpos($user_agent, 'Opera Mini') !== FALSE){
		   return "Opera Mini";
		}else if(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE){
		   return "Opera";
		}else if(strpos($user_agent, 'Firefox') !== FALSE){
			return 'Mozilla Firefox';
		}else if(strpos($user_agent, 'Chrome') !== FALSE){
			return 'Google Chrome';
		}else if(strpos($user_agent, 'Safari') !== FALSE){
			return "Safari";
		}else{
		   return 'No hemos podido detectar su navegador';
		}
	}

	function format_fecha_dma($fecha){
		$date = new DateTime($fecha);
		$DateFinal = $date->format('d/m/Y');
		return $DateFinal;
	}

	function renta5taCat($Sueldo,$FechaInicio,$uit,$Essalud){

			$FechaInicioXplode = explode('-', $FechaInicio);
			$MesInicio = $FechaInicioXplode[1];
			$AnioInicio = $FechaInicioXplode[2];

			$Anio = date('Y');
			$Fecha1raG = "01-07-".$Anio;
			$Fecha1raGXplode = explode('-', $Fecha1raG);
			$Mes1raG = $Fecha1raGXplode[1];
			$Anio1raG = $Fecha1raGXplode[2];

			$Fecha2daG = "31-12-".$Anio;
			$Fecha2daGXplode = explode('-', $Fecha2daG);
			$Mes2raG = $Fecha2daGXplode[1];
			$Anio2raG = $Fecha2daGXplode[2];

			if ($AnioInicio==$Anio2raG) {
				$Meses = $Mes2raG - $MesInicio+1;
			}else{
				$Meses = 12;
			}

			if (strtotime($FechaInicio) < strtotime($Fecha1raG)) {
				if ($Anio1raG == $AnioInicio) {
					$CalMeses = ($Mes1raG-$MesInicio);
					$GratJulio = ($Sueldo/6)*$CalMeses;
					$BonoEssalud = ($GratJulio*$Essalud)/100;
					$TotalJulio = $GratJulio+$BonoEssalud;
				}else{
					$GratJulio = $Sueldo;
					$BonoEssalud = ($GratJulio*$Essalud)/100;
					$TotalJulio = $GratJulio+$BonoEssalud;
				}		
			}else if (strtotime($FechaInicio) >= strtotime($Fecha1raG)) {
				$TotalJulio = 0;
					
			}

			
			if (strtotime($FechaInicio) < strtotime($Fecha2daG)) {
				$GratDiciembre = 0;
				if ($Anio2raG == $AnioInicio) {
					$Cal2Meses = ($Mes2raG-$MesInicio)+1;
					if ($Cal2Meses>=6) {
						$Cal2Meses = 6;
					}else{
						$Cal2Meses = $Cal2Meses;
					}
					$GratDiciembre = ($Sueldo/6)*$Cal2Meses;
					$BonoEssalud = ($GratDiciembre*$Essalud)/100;
					$TotalDiciembre = $GratDiciembre+$BonoEssalud;
				}else{
					$GratDiciembre = $Sueldo;
					$BonoEssalud = ($GratDiciembre*$Essalud)/100;
					$TotalDiciembre = $GratDiciembre+$BonoEssalud;
				}

			}else if (strtotime($FechaInicio) > strtotime($Fecha2daG)) {
				$TotalDiciembre = 0;
			}

			$Gratificacion = $TotalJulio+$TotalDiciembre;
			$proyectado = ($Sueldo*$Meses) + $Gratificacion;
			
			$MontoFnd = 0;
			$Monto45Mas = 0;
			$Monto35Mas = 0;
			$Monto20Mas = 0;
			$Monto5Mas = 0;
			if (($uit*7) < $proyectado ) {
				$MontoRenta = $proyectado - ($uit*7);
				if (($uit*5) < $MontoRenta) {
					$Monto5Mas = (($uit*5)*8)/100;
					$Cal1 = $MontoRenta-($uit*5);
					if (($uit*15) < $Cal1) {
						$Monto20Mas = (($uit*15)*14)/100;
						$Cal2 = $Cal1-($uit*15);
						if (($uit*15) < $Cal2) {
							$Monto35Mas = (($uit*15)*17)/100;
							$Cal3 = $Cal2-($uit*15);
							if (($uit*10) < $Cal3) {
								$Monto45Mas = (($uit*10)*20)/100;
								$Cal4 = $Cal3-($uit*10);
								$MontoFnd = ($Cal4*30)/100;
							}else{
								$Monto45Mas = ($Cal3*20)/100;
							}
						}else{
							$Monto35Mas = ($Cal2*17)/100;
						}
					}else{

						$Monto20Mas = ($Cal1*14)/100;
					}
				}else{
					$Fuer1 = $proyectado-($uit*7);
					$Monto5Mas =($Fuer1*8)/100;
				}
				
			}

			$total5ta = $Monto5Mas + $Monto20Mas + $Monto35Mas + $Monto45Mas+ $MontoFnd;
			$DescuentoMensual = $total5ta/$Meses;

			return $DescuentoMensual;
	}
	function CalculaMes($Inicio, $Fin){
	    $dias = (strtotime($Inicio)-strtotime($Fin))/86400;
	    $dias = abs($dias); 
	    $dias = floor($dias);
	    $Diferencia = $dias + 1;
	    return round($Diferencia/30);
	}

	function cstMayo($SueldoNeto, $FechaIngreso){
		$Anio = date('Y');

		$FechaIngresoExplode = explode("-",$FechaIngreso);
	  	$DiaIngreso = $FechaIngresoExplode[2];
	  	$MesIngreso = $FechaIngresoExplode[1];
	  	$AnioIngreso = $FechaIngresoExplode[0];

		// MAYO
		$ComputoMayo = '01-05-'.$Anio;
	  	$ComputoMayoExplode = explode("-",$ComputoMayo);
	  	$MesCMayo = $ComputoMayoExplode[1];
	  	$AnioCMayo = $ComputoMayoExplode[2];
		
		$DifMesMayo = CalculaMes($FechaIngreso, $ComputoMayo);
		

	    $FechaGratificacion = '01-12-'.$Anio;
	    $FechaGratExplode = explode("-",$FechaGratificacion);
	    $MesGratD = $FechaGratExplode[1];

	    if ($DifMesMayo > 6) {
	    	$MesesGratificacion = 6;
	    }else{
	    	// CALCULO DE MESES PARA GRATIFICACION
		    // CONSIDERA MESES COMPLETOS
		    if ($MesIngreso>=1 && $MesIngreso<=4) {
		        $MesesGratificacion = 0;
		    }else{
		        $MesesGratificacion = ($MesGratD-$MesIngreso)+1;
		        if ($DiaIngreso > 1) {
		        	$MesesGratificacion = $MesesGratificacion - 1;
		        }
		    }
	    }
	    
	    // VALIDAMOS QUE LA CANTIDAD DE MESES NO SEA SUPERIOR AL PERIODO

	    if ($DifMesMayo > 6) {
	    	$DifMesMayo = 6;
	    	$MesCTS = $DifMesMayo;
	    }else{
	    	// CALCULO DE MESES COMPLETOS PARA OBTENER EL CTS REAL
		    if ($DiaIngreso > 1) {
	        	$MesCTS = $DifMesMayo - 1;
	        }else{
	        	$MesCTS = $DifMesMayo;
	        }
	    }
	    if ($DifMesMayo >= 6) {
	    	// echo "hola";
	    	if ($MesCTS < 6) {
	    		// CANTIDAD DE DIAS DEL MES EN EL QUE INGRESA
		        $CantidadDias = cal_days_in_month(CAL_GREGORIAN,$MesIngreso, $AnioIngreso);
		        $CalDias = ($CantidadDias - $DiaIngreso)+1;
		        if ($DiaIngreso > 1) {
		        	if ($DifMesMayo <= 6) {
			        	$ResDias = $CalDias;
			        }else{
			        	$ResDias = 0;
			        }
		        }else{
		        	$ResDias = 0;
		        }
		        
	    	}else{
	    		$ResDias = 0;
	    		
	    	}
	    }else{
	    	// CANTIDAD DE DIAS DEL MES EN EL QUE INGRESA
	        $CantidadDias = cal_days_in_month(CAL_GREGORIAN,$MesIngreso, $AnioIngreso);
	        $CalDias = ($CantidadDias - $DiaIngreso)+1;
	        if ($DiaIngreso > 1) {
	        	if ($DifMesMayo <= 6) {
		        	$ResDias = $CalDias;
		        }else{
		        	$ResDias = 0;
		        }
	        }else{
	        	$ResDias = 0;
	        }
	        
	    }

	    ##########################################
	    // VARIA SEGUN CANTIDAD DE MESES
		$MesesGrat = $MesesGratificacion;
		//MESES CONSIDERACION CTS
	    $MesesCTS = $MesCTS;
	    // CALCULO DE DIAS RESTANTES DEL MES
	    $DifDias = $ResDias;
	    ##########################################

	    $SubGrat = ($SueldoNeto/6)*$MesesGrat;
	    if ($SubGrat == 0) {
	    	$TotalGrat = 0;
	    }else{
	    	$TotalGrat = $SubGrat/6;
	    }

	    $SubCTS = $SueldoNeto + $TotalGrat;
	    // CALCULO DE DIFERENCIA DE DIAS PARA EL CTS
	    if ($MesesCTS > 6) {
	    	$DiasCTS = 0;
	    }else{
	    	$DiasCTS = (($SubCTS/12)/30)*$DifDias;
	    }
	    $TotalCTS = ($SubCTS/12)*$MesesCTS;

	    $TotalPago = $TotalCTS + $DiasCTS;
	   	return $TotalPago;

    
	}

	function cstNoviembre($SueldoNeto, $FechaIngreso){
		$Anio = date('Y');

		$FechaIngresoExplode = explode("-",$FechaIngreso);
	  	echo $DiaIngreso = $FechaIngresoExplode[2];
	  	echo $MesIngreso = $FechaIngresoExplode[1];
	  	echo $AnioIngreso = $FechaIngresoExplode[0];

		// MAYO
		$ComputoMayo = '01-05-'.$Anio;
	  	$ComputoMayoExplode = explode("-",$ComputoMayo);
	  	$MesCMayo = $ComputoMayoExplode[1];
	  	$AnioCMayo = $ComputoMayoExplode[2];
	  	// NOVIEMBRE
		$ComputoNoviembre = '01-11-'.$Anio;
	  	$ComputoNoviembreExplode = explode("-",$ComputoNoviembre);
	  	$MesCNoviembre = $ComputoNoviembreExplode[1];
	  	$AnioCNoviembre = $ComputoNoviembreExplode[2];

	  	$DifMesNoviembre = CalculaMes($FechaIngreso, $ComputoNoviembre);


  		$FechaGratificacion = '01-7-'.$Anio;
	    $FechaGratExplode = explode("-",$FechaGratificacion);
	    $MesGratD = $FechaGratExplode[1];

	    $DifGrat = CalculaMes($FechaIngreso, $FechaGratificacion);

	    if ($DifGrat > 6) {
	    	$MesesGratificacion = 6;
	    }else{
	    	if ($MesGratD > $MesIngreso) {
	    		if ($DiaIngreso > 1) {
		        	$MesesGratificacion = $DifGrat - 1;
		        }
	    	}else{
				$MesesGratificacion = 0;
	    	}
	    }
	    
	    // VALIDAMOS QUE LA CANTIDAD DE MESES NO SEA SUPERIOR AL PERIODO

	    if ($DifMesNoviembre > 6) {
	    	$DifMesNoviembre = 6;
	    	$MesCTS = $DifMesNoviembre;
	    }else{
	    	// CALCULO DE MESES COMPLETOS PARA OBTENER EL CTS REAL
		    if ($DiaIngreso > 1) {
	        	$MesCTS = $DifMesNoviembre - 1;
	        }else{
	        	$MesCTS = $DifMesNoviembre;
	        }
	    }
	    if ($DifMesNoviembre >= 6) {
	    	if ($MesCTS < 6) {
	    		// CANTIDAD DE DIAS DEL MES EN EL QUE INGRESA
		        $CantidadDias = cal_days_in_month(CAL_GREGORIAN,$MesIngreso, $AnioIngreso);
		        $CalDias = ($CantidadDias - $DiaIngreso)+1;
		        if ($DiaIngreso > 1) {
		        	if ($DifMesNoviembre <= 6) {
			        	$ResDias = $CalDias;
			        }else{
			        	$ResDias = 0;
			        }
		        }else{
		        	$ResDias = 0;
		        }
		        
	    	}else{
	    		$ResDias = 0;
	    		
	    	}
	    }else{
	    	// CANTIDAD DE DIAS DEL MES EN EL QUE INGRESA
	        $CantidadDias = cal_days_in_month(CAL_GREGORIAN,$MesIngreso, $AnioIngreso);
	        $CalDias = ($CantidadDias - $DiaIngreso)+1;
	        if ($DiaIngreso > 1) {
	        	if ($DifMesNoviembre <= 6) {
		        	$ResDias = $CalDias;
		        }else{
		        	$ResDias = 0;
		        }
	        }else{
	        	$ResDias = 0;
	        }
	        
	    }


	    ##########################################
	    // VARIA SEGUN CANTIDAD DE MESES
	    echo $MesesGrat = $MesesGratificacion;
	    echo "<br>";
		//MESES CONSIDERACION CTS
	    echo $MesesCTS = $MesCTS;
	    echo "<br>";
	    // CALCULO DE DIAS RESTANTES DEL MES
	    echo $DifDias = $ResDias;
	    echo "<br>";
	    ##########################################

	    $SubGrat = ($SueldoNeto/6)*$MesesGrat;
	    $TotalGrat = $SubGrat/6;

	    $SubCTS = $SueldoNeto + $TotalGrat;
	    // CALCULO DE DIFERENCIA DE DIAS PARA EL CTS
	    if ($MesesCTS > 6) {
	    	$DiasCTS = 0;
	    }else{
	    	$DiasCTS = (($SubCTS/12)/30)*$DifDias;
	    }
	    $TotalCTS = ($SubCTS/12)*$MesesCTS;

	    $TotalPago = $TotalCTS + $DiasCTS;
	    return $TotalPago;
	}

	function gratJulio($SueldoNeto, $FechaInicio){

		$Anio = date("Y");

		$FechaIngresoExplode = explode("-",$FechaInicio);
	  	$DiaIngreso = $FechaIngresoExplode[2];
	  	$MesIngreso = $FechaIngresoExplode[1];
	  	$AnioIngreso = $FechaIngresoExplode[0];


		$FechaGratJulio = "01-07-".$Anio;


		// if (strtotime($FechaInicio) < strtotime($FechaGratJulio)) {
			$DifJul = CalculaMes($FechaInicio,$FechaGratJulio);
			if ($DifJul > 6) {
				$MesGrat = 6;
			}else if ($DifJul<=0) {
				$MesGrat = 0;
			}else{
				if ($DiaIngreso > 1) {
					$MesGrat = $DifJul - 1;
				}else{
					$MesGrat = $DifJul;
				}
			}
			
			
			$Meses = $MesGrat;
			
			$TotalGrat = ($SueldoNeto/6)*$Meses;
			return $TotalGrat;
		// }else{
		// 	$TotalGrat = 0;
		// 	return $TotalGrat;;
		// }
	}
	function gratDiciembre($SueldoNeto, $FechaInicio){
		$Anio = date("Y");

		$FechaIngresoExplode = explode("-",$FechaInicio);
	  	$DiaIngreso = $FechaIngresoExplode[2];
	  	$MesIngreso = $FechaIngresoExplode[1];
	  	$AnioIngreso = $FechaIngresoExplode[0];


		$FechaGratDiciembre = "01-12-".$Anio;
		$FechaDicExplode = explode("-", $FechaGratDiciembre);
		$MesGratDiciembre = $FechaDicExplode[1];





		$MesesLaboradosDic = diferenciaFecha($FechaInicio, $FechaGratDiciembre);
		
		if ($MesesLaboradosDic > 6) {
			$MesesDic = 6;
		}else{
			
				$MesesDic = $MesesLaboradosDic;
			
		}
		$MesesDic;
		$Meses = $MesesDic;
		$TotalGrat = ($SueldoNeto/6)*$Meses;
		return $TotalGrat;
	
	}
	function CalMesN($Inicio, $Fin){
	    $dias = (strtotime($Inicio)-strtotime($Fin));
	    // $dias = abs($dias); 
	    // $dias = floor($dias);
	    // $Diferencia = $dias+1;
	    return $dias;
	}

	function CalMes($Inicio, $Fin){
	    $dias = (strtotime($Inicio)-strtotime($Fin))/86400;
	    $dias = abs($dias); 
	    $dias = floor($dias);
	    $Diferencia = $dias+1;
	    return floor($Diferencia/30);
	}
	

	function DiaFinal($Mes){
		return cal_days_in_month(CAL_GREGORIAN,$Mes, date('Y'));
	}
	
	function tiempo_transcurrido($fecha_nacimiento, $fecha_control){
	   $fecha_actual = $fecha_control;
	   
	   if(!strlen($fecha_actual))
	   {
	      $fecha_actual = date('d/m/Y');
	   }

	   // separamos en partes las fechas 
	   $array_nacimiento = explode ( "-", $fecha_nacimiento ); 
	   $array_actual = explode ( "-", $fecha_actual ); 

	   $anos =  $array_actual[2] - $array_nacimiento[2]; // calculamos años 
	   $meses = $array_actual[1] - $array_nacimiento[1]; // calculamos meses 
	   $dias =  $array_actual[0] - $array_nacimiento[0]; // calculamos días 

	   //ajuste de posible negativo en $días 
	   if ($dias < 0) 
	   { 
	      --$meses; 

	      //ahora hay que sumar a $dias los dias que tiene el mes anterior de la fecha actual 
	      switch ($array_actual[1]) { 
	         case 1: 
	            $dias_mes_anterior=31;
	            break; 
	         case 2:     
	            $dias_mes_anterior=31;
	            break; 
	         case 3:  
	            if (bisiesto($array_actual[2])) 
	            { 
	               $dias_mes_anterior=29;
	               break; 
	            } 
	            else 
	            { 
	               $dias_mes_anterior=28;
	               break; 
	            } 
	         case 4:
	            $dias_mes_anterior=31;
	            break; 
	         case 5:
	            $dias_mes_anterior=30;
	            break; 
	         case 6:
	            $dias_mes_anterior=31;
	            break; 
	         case 7:
	            $dias_mes_anterior=30;
	            break; 
	         case 8:
	            $dias_mes_anterior=31;
	            break; 
	         case 9:
	            $dias_mes_anterior=31;
	            break; 
	         case 10:
	            $dias_mes_anterior=30;
	            break; 
	         case 11:
	            $dias_mes_anterior=31;
	            break; 
	         case 12:
	            $dias_mes_anterior=30;
	            break; 
	      } 

	      $dias=$dias + $dias_mes_anterior;

	      if ($dias < 0)
	      {
	         --$meses;
	         if($dias == -1)
	         {
	            $dias = 30;
	         }
	         if($dias == -2)
	         {
	            $dias = 29;
	         }
	      }
	   }

	   //ajuste de posible negativo en $meses 
	   if ($meses < 0) 
	   { 
	      --$anos; 
	      $meses=$meses + 12; 
	   }

	   $tiempo[0] = $anos;
	   $tiempo[1] = $meses;
	   $tiempo[2] = $dias;

	   return $tiempo;
	}

	function bisiesto($anio_actual){ 
	   $bisiesto=false; 
	   //probamos si el mes de febrero del año actual tiene 29 días 
	     if (checkdate(2,29,$anio_actual)) 
	     { 
	      $bisiesto=true; 
	   } 
	   return $bisiesto; 
	}


?>
