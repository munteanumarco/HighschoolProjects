
#include <SimpleDHT.h>
#include <ESP8266WebServer.h>
#include <ESP8266mDNS.h>
#include <ESP8266HTTPClient.h>
#include <NTPClient.h>
#include <WiFiUdp.h>

//Se va obtine data curenta utilizand serverul NTP (Network Time Protocol)
WiFiUDP ntpUDP;
NTPClient timeClient(ntpUDP, "pool.ntp.org");

// Este setat pinul pentru senzorul de temperatura si umiditate si umiditate
const int dht_pin = D4;

// Sunt setati pinii pentru controlul motorului 
const int motorspeed_pin = D1;
const int DIRA = D2;
const int DIRB = D3;
//delay
const int delayOn = 3000;
const int delayOff = 1500;

int motorState;

SimpleDHT11 dht11;

//Datele de autentificare pentru conectarea la reteaua WiFi
const char* ssid = "SRI";// 
const char* password = "29110430";

//Adresa paginii unde se vor trimite , prin metoda POST , datele citite de senzorul de temperatura si umiditate
const char* serverName = "http://arduinocontrol.tk/dht.php";

String apiKeyValue = "tPmAT5Ab3j7F9";

String currentDate;

byte temperature = 0;
byte humidity = 0;

WiFiClient client; 

void setup() 
{
  Serial.begin(74880);
  
  // Motor
    pinMode(motorspeed_pin, OUTPUT);
    pinMode(DIRA, OUTPUT);
    pinMode(DIRB, OUTPUT);

  //Conectarea la WiFi folosind datele setate anterior
  WiFi.begin(ssid, password);
  //Se initializeaza functia prin care vom obtine data
  timeClient.begin();
}

void getCurrentDate()
{
   // Se obtine data curenta
   timeClient.update();
   unsigned long epochTime = timeClient.getEpochTime();
   struct tm *ptm = gmtime ((time_t *)&epochTime); 
   int monthDay = ptm->tm_mday;
   int currentMonth = ptm->tm_mon+1;
   int currentYear = ptm->tm_year+1900;
   //Se structureaza data curenta pentru a putea fi inserata in baza de date
   currentDate = String(currentYear) + "-" + String(currentMonth) + "-" + String(monthDay);
   Serial.print("data:");
   Serial.println(currentDate);
}

void updateDatabase()
{   
    //Se insereaza datele actuale inregistrate de senzorul de temperatura si umiditate;
    if (WiFi.status() == WL_CONNECTED && temperature!=0 && humidity !=0) {
     
    HTTPClient http;
    http.begin(serverName);
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    // Se pregateste requestul POST pentru a trmite datele catre baza de date
    String httpRequestData = "api_key="+ apiKeyValue + "&temperature=" + temperature + "&humidity=" + humidity + "&date=" + currentDate + "";
    Serial.print("httpRequestData: ");
    Serial.println(httpRequestData);
    // Se trimite requestul POST
    int httpResponseCode = http.POST(httpRequestData);
    //Se verifica pentru eventualele erori
    if (httpResponseCode > 0) {
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
    }
    else {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
    }
    http.end();
  }
  else {
    Serial.println("WiFi Disconnected");
  }
}

void motorTurnOff()
{
  //this instruction is used to set the speed of the motor to 0 (off)
  digitalWrite(motorspeed_pin, LOW);
  //in these instructions the state is irrelevant because the motor is off 
  digitalWrite(DIRA, LOW);
  digitalWrite(DIRB, LOW);
  motorState = 0;
}


void motorTurnOn(int motorSpeed)
{
  analogWrite(motorspeed_pin, motorSpeed);
  digitalWrite(DIRA, HIGH);
  digitalWrite(DIRB, LOW);
  motorState = 1;
}

void readDatabase()
{
  
}

void loop() 
{

  Serial.print("loop");
  //Se citesc valorie curente ale senzorului de temperatura si umiditate
  dht11.read(dht_pin, &temperature, &humidity, NULL);
  
  //Se obtine data curenta
  getCurrentDate();

  //Se incarca valorile in baza de date
  //updateDatabase();

  //Se citesc comenzile din baza de date
  //readDatabase();
  
  
//Motor
  
  delay(2000);
}
