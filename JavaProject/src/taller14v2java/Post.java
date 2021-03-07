/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package taller14v2java;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
/**
 *
 * @author danie
 */
public class Post {
    Post(String mensaje) throws MalformedURLException, IOException {
     //   URL url = new URL("http://localhost:3000/datos");
URL url = new URL("https://things.ubidots.com/api/v1.6/devices/[nodeName]/?token=[ubidotsToken]");
HttpURLConnection conn = (HttpURLConnection) url.openConnection();
conn.setDoOutput(true);
conn.setRequestMethod("POST");
conn.setRequestProperty("Content-Type", "application/json");
String input = mensaje;
OutputStream os = conn.getOutputStream();
os.write(input.getBytes());
os.flush();
if (conn.getResponseCode() != 200) {
throw new RuntimeException("Failed : HTTP error code : "
+ conn.getResponseCode());
}
conn.disconnect();
}
}
