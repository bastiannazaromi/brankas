// RFID
// SDA > D2/SDA
// SCK > D5/SCK
// MOSI> D7/MOSI
// MISO> D6/MISO
// IRQ> (kosong)
// RST> D3
// GND>GND
// 3.3V>Power WEMOS 3.3
#include <SPI.h>
#include <MFRC522.h>
#define SS_PIN D2
#define RST_PIN D3

MFRC522 mfrc522(SS_PIN, RST_PIN);   // deklarasi RFID

#include <Arduino.h>

// Wifi
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>
// Buat object Wifi
ESP8266WiFiMulti WiFiMulti;
// Buat object http
HTTPClient http;
#define USE_SERIAL Serial

String simpan = "http://brankas.xyz/Data/save?no_kartu=";
String akses = "http://brankas.xyz/Data/akses";
String daftar = "http://brankas.xyz/Data/daftar?no_kartu=";

String no = "", no_kartu = "", respon = "", respon_akses = "";

// LED & doorlock
#define relay_off HIGH
#define relay_on LOW
#define doorLock D4
#define ledMerah D8
#define ledHijau D9

// buzzer
#define buzzer D10

void setup() {
  Serial.begin(115200);   //Komunikasi baud rate

  USE_SERIAL.begin(115200);
  USE_SERIAL.setDebugOutput(false);

  for(uint8_t t = 4; t > 0; t--) {
      USE_SERIAL.printf("[SETUP] Tunggu %d...\n", t);
      USE_SERIAL.flush();
      delay(1000);
  }

  WiFi.mode(WIFI_STA);
  WiFiMulti.addAP("Brankas", "12345678"); // Sesuaikan SSID dan password ini

  for (int u = 1; u <= 5; u++)
  {
    if ((WiFiMulti.run() == WL_CONNECTED))
    {
      USE_SERIAL.println("Alhamdulillah wifi konek");
      USE_SERIAL.flush();
      delay(1000);
    }
    else
    {
      Serial.println("Hmmm wifi belum konek");
      delay(1000);
    }
  }

  pinMode(doorLock, OUTPUT);
  pinMode(ledHijau, OUTPUT);
  pinMode(ledMerah, OUTPUT);
  pinMode(buzzer, OUTPUT);
  digitalWrite(doorLock, relay_off);
  digitalWrite(ledMerah, LOW);
  digitalWrite(ledHijau, LOW);
  digitalWrite(buzzer, LOW);
  
  SPI.begin();
  mfrc522.PCD_Init();

  delay(1000);
}

void loop() {

  cek_akses();

  Serial.println("Tempelkan Kartu");
  
  delay(1000);
  if ( ! mfrc522.PICC_IsNewCardPresent()) 
  {
    return;
  }
  if ( ! mfrc522.PICC_ReadCardSerial()) 
  {
    return;
  }
  
  //Menampilkan UID TAG Di Serial Monitor
  Serial.print("NO Kartu :");
  String content= "";
  byte letter;
  for (byte i = 0; i < mfrc522.uid.size; i++)
  {
  Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
  Serial.print(mfrc522.uid.uidByte[i], HEX);
  content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
  content.concat(String(mfrc522.uid.uidByte[i], HEX));
  }

  Serial.println();
  no = content.substring(1);
  no_kartu = content.substring(1);
  if (no_kartu.length() == 11)
  {
    no_kartu = no_kartu.substring(0,2) + "%20" + no_kartu.substring(3,5) + "%20" + no_kartu.substring(6,8) + "%20" + no_kartu.substring(9,11);
  }
  else
  {
    no_kartu = no_kartu.substring(0,2) + "%20" + no_kartu.substring(3,5) + "%20" + no_kartu.substring(6,8) + "%20" + no_kartu.substring(9,11) + "%20" + no_kartu.substring(12,14) + "%20" + no_kartu.substring(15,17) + "%20" + no_kartu.substring(18,20);  
  }
  
  no_kartu.toUpperCase();
  no.toUpperCase();
  
  delay(300);

  if (respon_akses == "Daftar")
  {
    daftar_database();
  }
  else if (respon_akses == "Masuk")
  {
    save_database();
  }

  Serial.println();

}

void cek_akses()
{
  if ((WiFiMulti.run() == WL_CONNECTED))
  {
    USE_SERIAL.print("[HTTP] Memulai...\n");
    
    http.begin( akses );
    
    USE_SERIAL.print("[HTTP] Cek akses di database ...\n");
    int httpCode = http.GET();

    if(httpCode > 0)
    {
      USE_SERIAL.printf("[HTTP] kode response GET : %d\n", httpCode);

      if (httpCode == HTTP_CODE_OK)
      {
        respon_akses = http.getString();  
        delay(200);
      }
    }
    else
    {
      USE_SERIAL.printf("[HTTP] GET data gagal, error: %s\n", http.errorToString(httpCode).c_str());
    }
    http.end();
  }
}

void save_database()
{
  if ((WiFiMulti.run() == WL_CONNECTED))
  {
    USE_SERIAL.print("[HTTP] Memulai...\n");
    
    http.begin( simpan + (String) no_kartu );
    
    USE_SERIAL.print("[HTTP] Menyimpan ke database ...\n");
    int httpCode = http.GET();

    if(httpCode > 0)
    {
      USE_SERIAL.printf("[HTTP] kode response GET : %d\n", httpCode);

      if (httpCode == HTTP_CODE_OK)
      {
        respon = http.getString();  
        delay(200);
      }
    }
    else
    {
      USE_SERIAL.printf("[HTTP] GET data gagal, error: %s\n", http.errorToString(httpCode).c_str());
    }
    http.end();
  }

  if (respon == "Sukses")
  {
    USE_SERIAL.print("Respon : ");
    USE_SERIAL.print(respon);
    USE_SERIAL.println(", " + no + " dikenali");

    digitalWrite(doorLock, relay_on);
    digitalWrite(ledHijau, HIGH);
    digitalWrite(buzzer, HIGH);
    delay(200);
    digitalWrite(buzzer, LOW);
    delay(150);
    digitalWrite(buzzer, HIGH);
    delay(200);
    digitalWrite(buzzer, LOW);
    delay(150);
    digitalWrite(buzzer, HIGH);
    delay(500);
    digitalWrite(buzzer, LOW);
    delay(10000);
    digitalWrite(doorLock, relay_off);
    digitalWrite(ledHijau, LOW);
    digitalWrite(buzzer, LOW);
  }
  else if (respon == "Maaf")
  {
    USE_SERIAL.print("Respon : ");
    USE_SERIAL.print(respon);
    USE_SERIAL.println(", " + no + " tidak dikenali");

    digitalWrite(ledMerah, HIGH);
    delay(5000);
    digitalWrite(ledMerah, LOW);
  }

  else
  {
    USE_SERIAL.print("Respon : ");
    USE_SERIAL.println(respon);

    digitalWrite(ledMerah, HIGH);
    delay(5000);
    digitalWrite(ledMerah, LOW);
  }
  
  delay(2000);
}

void daftar_database()
{
  if ((WiFiMulti.run() == WL_CONNECTED))
  {
    USE_SERIAL.print("[HTTP] Memulai...\n");
    
    http.begin( daftar + (String) no_kartu );
    
    USE_SERIAL.print("[HTTP] Daftar ke database ...\n");
    int httpCode = http.GET();

    if(httpCode > 0)
    {
      USE_SERIAL.printf("[HTTP] kode response GET : %d\n", httpCode);

      if (httpCode == HTTP_CODE_OK)
      {
        respon = http.getString();  
        delay(200);
      }
    }
    else
    {
      USE_SERIAL.printf("[HTTP] GET data gagal, error: %s\n", http.errorToString(httpCode).c_str());
    }
    http.end();
  }

  if (respon == "Sukses")
  {
    USE_SERIAL.print("Respon : ");
    USE_SERIAL.print(respon);
    USE_SERIAL.println(", Kartu berhasil ditambahkan");
    
    digitalWrite(ledHijau, HIGH);
    digitalWrite(buzzer, HIGH);
    delay(200);
    digitalWrite(buzzer, LOW);
    delay(150);
    digitalWrite(buzzer, HIGH);
    delay(200);
    digitalWrite(buzzer, LOW);
    delay(150);
    digitalWrite(buzzer, HIGH);
    delay(500);
    digitalWrite(buzzer, LOW);
    digitalWrite(ledHijau, LOW);
  }
  else
  {
    USE_SERIAL.print("Respon : ");
    USE_SERIAL.print(respon);
    USE_SERIAL.println(", kartu sudah terdaftar");

    digitalWrite(ledMerah, HIGH);
    delay(3000);
    digitalWrite(ledMerah, LOW);
  }
  
  delay(2000);
}
