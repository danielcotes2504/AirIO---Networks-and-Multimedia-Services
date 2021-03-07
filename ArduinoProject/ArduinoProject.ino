#include <DHT.h>
#include <DHT_U.h>
#include <ArduinoJson.h>

#define _TData 9
#define DHTTYPE DHT11
DHT dht(_TData, DHTTYPE);



const int _LedR = 13;
const int _LedG = 12;
const int _LedB = 11;
const int _Smoke = 10;
float _Temp_C;
float _Humidity;


void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  dht.begin();
  pinMode(_LedR, OUTPUT);
  pinMode(_LedG, OUTPUT);
  pinMode(_LedB, OUTPUT);
  pinMode(_Smoke, INPUT);

}

void loop() {
  // put your main code here, to run repeatedly:
  int  _SmokeLec = digitalRead(_Smoke);
  float _Humidity = dht.readHumidity();
  float _Temperature = dht.readTemperature();

  digitalWrite(_LedR, LOW);
  digitalWrite(_LedG, LOW);
  digitalWrite(_LedB, LOW);

  StaticJsonDocument<200> doc;
  doc ["Temperatura"] = _Temperature;
  doc["Humedad_aire"] = _Humidity;
  doc["Concentracion_CO2"] = _SmokeLec;

  serializeJson(doc, Serial);
  Serial.println();
  delay(1000);
}
