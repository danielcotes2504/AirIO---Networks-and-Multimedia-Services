/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package taller14v2java;

import org.eclipse.paho.client.mqttv3.MqttClient;
import org.eclipse.paho.client.mqttv3.MqttConnectOptions;
import org.eclipse.paho.client.mqttv3.MqttException;
import org.eclipse.paho.client.mqttv3.MqttMessage;

/**
 *
 * @author danie
 */
public class Pub {

    /**
     * @param args the command line arguments
     */
    //public static final String BROKER_URL = "tcp://localhost:1883";
    public static final String BROKER_URL = "tcp://node02.myqtthub.com:1883";
    private MqttClient client;
    MqttConnectOptions Options;

    public Pub(String msg) {
        Options = new MqttConnectOptions();
        
        
        
        
        
       // String var = ""; //si se requiere contraseña
        String var = "HeXYlCg8-p9O1yqUR"; //si se requiere contraseña
        char cad[];
        cad = var.toCharArray();
        Options.setPassword(cad);
        Options.setUserName("danielcotes2504");//si se requiere nombre de usuario
     //String clientId = client.generateClientId();//si se requiere client Id
       String clientId = "daniel.cotes@uao.edu.co";
        
        
//Options.setUserName("user");//si se requiere nombre de usuario
//String clientId = client.generateClientId();//si se requiere client Id
//String clientId = "";
        MqttMessage message = new MqttMessage(msg.getBytes());
        try {
            client = new MqttClient(BROKER_URL, clientId);
            client.connect(Options);
            System.out.println(message.toString());
            client.publish("prueba", message); //topico y mensaje
        } catch (MqttException e) {
            e.printStackTrace();
            System.exit(1);
        }
    }

}
