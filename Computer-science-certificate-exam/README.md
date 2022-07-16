# REMOTE CONTROLLED ARDUINO

<img width="500" height="300" align="center" src="https://images.unsplash.com/photo-1555543451-eeaff357e0f3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1331&q=80">

> Welcome to my high school computer science certificate project !


### Table of Contents

- [Introduction](#introduction)
- [Description](#description)
- [Presentation](#presentation)
- [References](#references)
---

## Introduction
I have always been passionate about IoT projects that have a major impact over some
real problems in areas such as security, agriculture, mobility. This project offered me
the opportunity to learn a small part of how such a project works.

---

## Description

Firstly, this project is composed of 2 parts : the website and the practical part (the arduino together  with all the other components).
The link between the two parts is the database. Any interaction of the user with the website will be reflected in the database. The Arduino will constantly 
check the database and it will comply with the commands. In this way, the arduino will know what action it has to
perform. Besides the fact that the arduino will read the changes from the database, also
could write, this way we will be able to receive information from the board. In our case, it
will write to the database the temperature, humidity and current date, which then
will be displayed on the website. The charts were implemented with Google Charts.

#### Technologies

- Website : HTML, CSS for the frontend; PHP and MySQL on the backend.
- Practical part : Arduino compatible development board (ESP8266), temperature sensor(DHT11), DC motor & driver for it.
- C++ for the code running on the board.(written in Arduino IDE)
- [Back To The Top](#remote-controlled-arduino)

---

## Presentation

#### The user must log in first

 <img width="400" height="250" src="images/login.png">
 
#### Then there is the main page where he can see data received from the arduino.(temperature, humidty)

 <img width="400" height="250" src="images/main.JPG">

#### Also a page showing some interpretation of the previous stored data.

 <img width="400" height="250" src="images/graphs.JPG">
 
#### Last page is the control panel : user can turn on/off the fan, set the speed.Also the user can set a threshold regarding the temperature when the fan will turn on.

 <img width="400" height="250" src="images/control1.JPG">
 <img width="400" height="250" src="images/control2.JPG">

#### Arduino Scheme

 <img width="400" height="250" src="images/scheme.jpg">
 
- [Back To The Top](#remote-controlled-arduino)
---
## References
- https://create.arduino.cc/projecthub/pooja_baraskar/overview-of-internet-of-things-5fe017
- Plusivo – ESP8266 Guide (www.plusivo.com)
- [Back To The Top](#remote-controlled-arduino)

---
