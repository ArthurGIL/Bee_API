//Bibliothèques
#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
ESP8266WiFiMulti WiFiMulti;
#include <DHT.h>

#define DHTPIN 3   //  pin connecté au DHT
#define DHTTYPE DHT22   // DHT 22
DHT dht(DHTPIN, DHTTYPE);

#define capteurPhoto A0 //pin connecté photoresistance

String valStringPhoto = "testP";
String valStringHum = "testH";
String valStringTemp = "testT";

void setup() {
  //init console de débugage
  Serial.begin(9600);
  Serial.println();
  Serial.println();
  Serial.println();

  pinMode(capteurPhoto, OUTPUT); //initialisation
  dht.begin();

  //initialisation réseau
  for (uint8_t t = 4; t > 0; t--) {
    Serial.print("[SETUP] WAIT %d...\n");
    Serial.println(t);
    Serial.flush();
    delay(1000);
  }

  //Connexion réseau wifi
  WiFi.mode(WIFI_STA);
  WiFiMulti.addAP("IPhone_PE_", "123soleil");

}

void loop() {
  //Récupérer valeur photo
  valStringPhoto = PhotoResistcance();
  //Récupérer valeur Humidité
  valStringHum = Humidite();
  //Récupérer valeur Température
  valStringTemp = Temperature();
  Serial.println();
  
  // wait for WiFi connection
  if ((WiFiMulti.run() == WL_CONNECTED)) {

    WiFiClient client;
    HTTPClient http;
    //172.20.10.7 PE
    //192.168.43.155 Arthur
    Serial.print("[HTTP] begin...\n");
    if (http.begin(client, 
                   "http://172.20.10.7/wifi_multimetre/data.php?luminosite=" + valStringPhoto +
                   "&humidite=" + valStringHum +
                   "&temperature=" + valStringTemp)) {  // HTTP

      Serial.print("[HTTP] GET...\n");
      // start connection and send HTTP header
      int httpCode = http.GET();

      // httpCode will be negative on error
      if (httpCode > 0) {
        // HTTP header has been send and Server response header has been handled
        Serial.print("[HTTP] GET... code: %d");
        Serial.println(httpCode);

        // file found at server
        if (httpCode == HTTP_CODE_OK || httpCode == HTTP_CODE_MOVED_PERMANENTLY) {
          String payload = http.getString();
          Serial.println(payload);
        }
      } else {
        Serial.print("[HTTP] GET... failed, error: %s\n");
        Serial.println(http.errorToString(httpCode).c_str());
      }

      http.end();
    } else {
      Serial.println("[HTTP} Unable to connect\n");
    }
  }

  delay(2000);
}

String PhotoResistcance() {
  float valuePhoto = analogRead(capteurPhoto); //relevé capteur

  float Vout = float(valuePhoto) * (3,3 / float(1024));// Conversion analogique en tension
  float RLDR = (10000 * (3,3 - Vout))/Vout; // Conversion voltage to resistance
  int phys=500/(RLDR/1000); // Conversion en lux

  valStringPhoto = String(phys);// conversion en string
  Serial.print(F("Lumineusité: "));
  Serial.print(valStringPhoto);
  Serial.println(F(" Lux"));
  return valStringPhoto;
}

String Humidite() {
  String tempH = "humide"; 
  float h = dht.readHumidity(); //relevé capteur
  //verification valeur non null
  if (isnan(h)) {
    Serial.println(F("Failed to read humidity !"));
  }
  else{
    //affichage console
    Serial.print(F("Humidity: "));
    Serial.print(h);
    Serial.println(F("%"));
    //retour valeur
    tempH = String(h); //conversion en string
  }
  return tempH;
}

String Temperature() {
  String tempT = "tempe";
  float t = dht.readTemperature(); //relevé capteur
  //verification valeur non null
  if (isnan(t)) {
    Serial.println(F("Failed to read temperature !"));
  }
  else{
    //affichage console
    Serial.print(F("Temperature: "));
    Serial.print(t);
    Serial.println(F("°C"));
    //retour valeur
    tempT = String(t); //conversion en string
  }
  return tempT;
}
