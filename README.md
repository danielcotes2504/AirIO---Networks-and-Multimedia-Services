# AirIO---Networks-and-Multimedia-Services
This is an educational project developed to show how it works the Internet of Things devices, since the transfer of data with REST protocol.
The goal of this project is the develop of an Internet of Things system called Air.IO that attemps to measure air quality, air humidity and 
temperature to improve the air that indoor users breathe.

The project is distribuited in this way:

# Folder structure
``` 
AirIO--------------Is the PHP page, It will shows the info that is transfered by the broker or the JavaProject
ArduinoProject-----Is the .ino.hex project that is going to be built on the Arduino developed with ArduinoIDE
JavaProject--------Is the project that contains the files to transfer data via serial port to a web server or localhost
                   (you can define what protocol will use to transfer data: MQTT or REST)
Taller14V2.pdsprj--Is the Proteus file that contains the Arduino Simultion and Sensors.
```
The Proteus Simulation will send data to Serial Port, for that you can use a Port Emulator, then the data will arrive to Java, where it will be sent to ubidots and the PHP page will recover the data from ubidots to show the variables on the dashboards and tables. It's necessary that you change the Tokens in the PHP page and in the javacode, if you want, there is another options to IoT platforms like thinger.io, for that is the same steps, only do you need the Post link (you can test it with postman).

# Libraries, enviroments and programming languages used
```
PHP 7.2.34
JDK 1.8.0_2441
Proteus 8.5
Netbeans 8.2
```
# Testing video
https://user-images.githubusercontent.com/36736949/110251798-34825500-7f50-11eb-8324-1bf3c37e71fe.mp4




