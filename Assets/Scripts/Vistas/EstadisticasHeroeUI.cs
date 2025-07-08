using UnityEngine;
using UnityEngine.UI;
using TMPro;
using System.Collections;
using UnityEngine.Networking;
using System;

public class EstadisticasHeroeUI : MonoBehaviour
{
    public TMP_InputField inputNombre;
    public TMP_InputField inputID;
    public TMP_Text resultadoTexto;

    public void BuscarEstadisticas()
    {
        string url = "http://localhost/VISTAS/estadisticasHeroes.php";
        if (!string.IsNullOrEmpty(inputID.text))
            url += "?id=" + inputID.text;
        else if (!string.IsNullOrEmpty(inputNombre.text))
            url += "?nombre=" + UnityWebRequest.EscapeURL(inputNombre.text);

        StartCoroutine(ConsultarAPI(url));
    }

    IEnumerator ConsultarAPI(string url)
    {
        UnityWebRequest request = UnityWebRequest.Get(url);
        yield return request.SendWebRequest();

        if (request.result == UnityWebRequest.Result.Success)
        {
            HeroEstadistica[] data = JsonHelper.FromJson<HeroEstadistica>(JsonHelper.FixJson(request.downloadHandler.text));

            if (data.Length > 0)
            {
                resultadoTexto.text = $"Nombre: {data[0].nombre_heroe}\n" +
                                      $"Partidas: {data[0].partidas_jugadas}\n" +
                                      $"Victorias: {data[0].victorias}\n" +
                                      $"Win Rate: {data[0].winrate}%";
            }
            else
            {
                resultadoTexto.text = "Héroe no encontrado.";
            }
        }
        else
        {
            resultadoTexto.text = "Error: " + request.error;
        }
    }

    [Serializable]
    public class HeroEstadistica
    {
        public int id_hero;
        public string nombre_heroe;
        public int partidas_jugadas;
        public int victorias;
        public float winrate;
    }

    // Para manejar JSON arrays
    public static class JsonHelper
    {
        public static T[] FromJson<T>(string json)
        {
            Wrapper<T> wrapper = JsonUtility.FromJson<Wrapper<T>>(json);
            return wrapper.Items;
        }

        public static string FixJson(string value)
        {
            return "{\"Items\":" + value + "}";
        }

        [System.Serializable]
        private class Wrapper<T>
        {
            public T[] Items;
        }
    }
}
