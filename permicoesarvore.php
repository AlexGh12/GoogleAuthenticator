<?php

	function chmoddir($caminho, $permicao = 0777) {
		
		//Verifica se o caminho é um diretorio
		if (is_dir($caminho)) {

			//Lista os arquivos e diretórios que estão no caminho especificado
			$objetos = scandir($caminho);

			foreach ($objetos as $objeto) {

				if ($objeto != "." && $objeto != "..") {//Se for diferente de ponto(.) e ponto ponto(..)...

					//Lê o tipo do arquivo
					if (filetype($caminho."/".$objeto) == "dir"){//Retorna o tipo de arquivo, se for dir

						//Chama a função novamente
						chmoddir($caminho."/".$objeto);

					}else{

						//Coloca permissão no arquivo
						chmod($caminho."/".$objeto, $permicao);

					}

				}

			}

			//Faz o ponteiro interno de um array apontar para o seu primeiro elemento
			reset($objetos);

			//Coloca permissão na pasta
			chmod($caminho, $permicao);

		}

	}

?>
