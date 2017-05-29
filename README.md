# Botnet-Twitter
En este proyecto se han desarrollado diferentes scripts en php y bash para conseguir una botnet controlada por una cuenta de twitter que realizará diferentes acciones según el hashtag que utilice el ultimo tweet. Este trabajo fué realizado por dos estudiantes de telecomunicaciones de la UPNA (Iker Urío e Iñigo Díez de Arizaleta).

ATACANTE
Para el correcto funcionamiento del programa hay que copiar los siguientes archivo en un directorio
de la máquina atacante:
- servidor.sh
- socket.php

Una vez hecho esto ejecutamos el siguiente comando en la shell del atacante:
$ sh servidor.sh

VÍCTIMAS
Para el correcto funcionamiento del programa hay que copiar los siguientes archivo en un directorio
de la máquina víctima:
- Seguridad.php
- script.sh

Una vez hecho esto ejecutamos el siguiente comando en la shell del víctima:
$ php Seguridad.php

El archivo servidor.sh es una guía en la cual se va eligiendo la acción que se quiere que realice la víctima y genera el tweet que hay que escribir para su correcto funcionamiento.
En el ataque de fuerza bruta utiliza un diccionario de contraseñas subido a un servidor que puede no estar operativo se recomienda usar un diccionario propio.
Es importante tener en cuenta que, para el correcto funcionamiento de la BOTNET, la víctima deberá tener actualizado el PHP a la última versión.
