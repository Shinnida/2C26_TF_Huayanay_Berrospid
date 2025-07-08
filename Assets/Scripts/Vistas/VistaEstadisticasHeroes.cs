using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Networking;
using TMPro;

public class VistaEstadisticasHeroes : MonoBehaviour
{
    [Header("Prefab y contenedor")]
    public GameObject prefabFila;
    public Transform contenedor;

    [Header("URL del PHP")]
    public string urlPHP = "http://localhost/vistas/estadisticasheroes.php";

    public void MostrarVistaEstadisticaHeroe()
    {
        StartCoroutine(CargarEstadisticasHeroes());
    }

    IEnumerator CargarEstadisticasHeroes()
    {
        UnityWebRequest www = UnityWebRequest.Get(urlPHP);
        yield return www.SendWebRequest();

        if (www.result != UnityWebRequest.Result.Success)
        {
            Debug.Log("Error: " + www.error);
        }
        else
        {
            // Elimina las filas anteriores antes de crear nuevas
            foreach (Transform hijo in contenedor)
            {
                Destroy(hijo.gameObject);
            }

            string json = www.downloadHandler.text;
            HeroeEstadistica[] datos = JsonHelper.FromJson<HeroeEstadistica>(json);

            foreach (HeroeEstadistica h in datos)
            {
                GameObject fila = Instantiate(prefabFila, contenedor);
                fila.transform.Find("Text_Heroe").GetComponent<TMP_Text>().text = h.nombre_heroe;
                fila.transform.Find("Text_Partidas").GetComponent<TMP_Text>().text = h.partidas_jugadas.ToString();
                fila.transform.Find("Text_Victorias").GetComponent<TMP_Text>().text = h.victorias.ToString();
                fila.transform.Find("Text_Derrotas").GetComponent<TMP_Text>().text = h.derrotas.ToString();
                fila.transform.Find("Text_Winrate").GetComponent<TMP_Text>().text = h.winrate + " %";
            }
        }
    }
}

[System.Serializable]
public class HeroeEstadistica
{
    public int id_heroe;
    public string nombre_heroe;
    public int partidas_jugadas;
    public int victorias;
    public int derrotas;
    public float winrate;
}
