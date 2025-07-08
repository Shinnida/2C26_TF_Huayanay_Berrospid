using UnityEngine;
using UnityEngine.Networking;
using System.Collections;

public class DBConnector : MonoBehaviour
{
    [Header("URL completa al script PHP")]
    public string phpUrl = "http://localhost/exportar_datos/get_usuarios.php";

    void Start()
    {
        StartCoroutine(GetData());
    }

    IEnumerator GetData()
    {
        UnityWebRequest www = UnityWebRequest.Get(phpUrl);
        yield return www.SendWebRequest();

        if (www.result != UnityWebRequest.Result.Success)
        {
            Debug.Log("Error: " + www.error);
        }
        else
        {
            Debug.Log("Datos recibidos: " + www.downloadHandler.text);
            // Aquí podrías parsear el JSON recibido y usarlo en el juego
        }
    }
}
