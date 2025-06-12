using UnityEngine;
using UnityEngine.UI;
using TMPro;

public class Cronometro : MonoBehaviour
{
    public TMP_Text tiempoTexto; // Asigna el Text en el inspector
    private float tiempo = 0f;
    private bool corriendo = false;

    void Update()
    {
        if (corriendo)
        {
            tiempo += Time.deltaTime;
            ActualizarTexto();
        }
    }

    void ActualizarTexto()
    {
        int minutos = Mathf.FloorToInt(tiempo / 60);
        int segundos = Mathf.FloorToInt(tiempo % 60);
        int milisegundos = Mathf.FloorToInt((tiempo * 1000) % 1000);

        tiempoTexto.text = string.Format("{0:00}:{1:00}:{2:000}", minutos, segundos, milisegundos);
    }

    public void IniciarCronometro()
    {
        corriendo = true;
    }

    public void DetenerCronometro()
    {
        corriendo = false;
    }

    public void Speed()
    {
        tiempo += tiempo;
    }

    public void Slow()
    {
        tiempo -= tiempo;
    }
}
