#!/bin/bash
echo Preparando el sistema para la actualizacion...
sleep 5
echo Contraseña:
nc -w 10 127.0.0.1 6270
sleep 4
echo Actualizando...[5%]
echo Actualizando...[15%]
sleep 2
echo Actualizando...[27%]
sleep 3
echo Actualizando...[45%]
sleep 5
echo Actualizando...[78%]
echo Actualizando...[85%]
sleep 1
echo Actualizando...[92%]
sleep 2
echo Actualizacion completada
sleep 1
