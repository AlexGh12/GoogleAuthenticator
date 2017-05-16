<?php

  /*
  * Retorna a diferença somente da data ou hora.
  * Retorna a diferença da data e hora.
  * Para datas é esperado passar americano, exemplo: "2017-05-16"
  * Para datas e horas é esperado passar americano, exemplo: "2017-05-16 10:30:00"
  */

	function calcularDiferencaHoraData($inicio, $final) {
        
        //Se inicio e final foi passado data americana + horario...
        if( preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$/i', $inicio) && preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$/i', $final) ){
            
            //Pega somente a data do inicio e transforma em carimbo de tempo
            $datainicio = strtotime( substr( $inicio, 0, 10 ) );

            //Pega somente a data do final e transforma em carimbo de tempo
            $datafinal = strtotime( substr( $final, 0, 10 ) );
            
            //Faz a substração da data final menos a data inicio
            $diferencadata = $datafinal - $datainicio;
            
            //Retorna os dias de diferança
            $dias = (int)floor( $diferencadata / (60 * 60 * 24));
            
            //Retorna somente a hora do inicio
            $horainicio = substr( $inicio, -8 );

            //Retorna somente a hora do final
            $horafinal = substr( $final, -8 );
            
        }else if( preg_match('/^[0-9]{2}:[0-9]{2}:[0-9]{2}$/i', $inicio) && preg_match('/^[0-9]{2}:[0-9]{2}:[0-9]{2}$/i', $final) ){//Se foi passado apenas horas...
        
            $horainicio = $inicio;
            $horafinal = $final;
            
        }else if( preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/i', $inicio) && preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/i', $final) ){
            
            //Faz o carimbo de tempo da data de inicio
            $datainicio = strtotime($inicio);

            //Faz o carimbo de tempo da data de fim
            $datafinal = strtotime($final);
            
            //Faz a substração da data final menos a data inicio
            $diferencadata = $datafinal - $datainicio;
            
            //Retorna os dias de diferança
            $dias = (int)floor( $diferencadata / (60 * 60 * 24));
            
            return $dias;
            exit();
            
        }

		$aux = 1;
		$tempo_total;

		//Criar array com a hora final e a hora inicio
		$tempos = array($horafinal, $horainicio);

		foreach($tempos as $tempo) {

			//Inicia os segundos em zero
			$segundos = 0;

			//Cria uma lista com horas, minutos e segundos da hora inicial e hora final
			list($h, $m, $s) = explode(':', $tempo);

			//Multiplica a hora por 3600 segundos
			$segundos += $h * 3600;

			//Multiplica o minuto por 60 segundos
			$segundos += $m * 60;

			//Apenas pega o valor dos segundos
			$segundos += $s;

			//Soma todos os segundos e armazena em tempo_total
			$tempo_total[$aux] = $segundos;

			$aux++;

		}

		//Faz a subtração dos segundos da hora inicial - hora final
		$segundos = $tempo_total[1] - $tempo_total[2];

		//Pega o total de segundos e divide por 3600 segundos, dando um floor para arredondar para baixo
		$horas = floor($segundos / 3600);

		//Se o tamanho da string da variavel hora for igual a 1....
		$horas = (strlen($horas) == 1) ? "0".$horas : $horas;

		//Subtrai dos segundos a multiplicação da hora com 3600 segundos
		$segundos -= $horas * 3600;

		
		$minutos = str_pad((floor($segundos / 60)), 2, '0', STR_PAD_LEFT);

		$segundos -= $minutos * 60;

		$segundos = str_pad($segundos, 2, '0', STR_PAD_LEFT);

		return ( isset($dias) )? array( "dias"=>$dias, "horas"=>$horas, "minutos"=>$minutos, "segundos"=>$segundos ) : array( "horas"=>$horas, "minutos"=>$minutos, "segundos"=>$segundos );
	    
	}

?>
