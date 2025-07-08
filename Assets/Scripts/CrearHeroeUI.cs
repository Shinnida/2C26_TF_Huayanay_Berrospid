using UnityEngine;
using UnityEngine.UI;
using UnityEngine.Networking;
using System.Collections;

public class CrearHeroeUI : MonoBehaviour
{
    public InputField inputNombre;
    public InputField inputRol;
    public Dropdown dropdownDificultad;
    public InputField inputH1;
    public InputField inputH2;
    public InputField inputH3;
    public InputField inputUlt;
    public Button botonCrear;

    void Start()
    {
        botonCrear.onClick.AddListener(CrearHeroe);
    }

    void CrearHeroe()
    {
        StartCoroutine(EnviarHeroe());
    }

    IEnumerator EnviarHeroe()
    {
        string nombre = inputNombre.text;
        string rol = inputRol.text;
        string dificultad = dropdownDificultad.options[dropdownDificultad.value].text;
        string h1 = inputH1.text;
        string h2 = inputH2.text;
        string h3 = inputH3.text;
        string ult = inputUlt.text;

        WWWForm form = new WWWForm();
        form.AddField("nombre_heroe", nombre);
        form.AddField("rol", rol);
        form.AddField("dificultad", dificultad);
        form.AddField("habilidad1", h1);
        form.AddField("habilidad2", h2);
        form.AddField("habilidad3", h3);
        form.AddField("ultimate", ult);

        UnityWebRequest www = UnityWebRequest.Post("http://localhost/CRUD/heroes/create_heroes.php", form);

        yield return www.SendWebRequest();

        if (www.result == UnityWebRequest.Result.Success)
        {
            Debug.Log("Héroe insertado: " + www.downloadHandler.text);
        }
        else
        {
            Debug.LogError("Error al insertar: " + www.error);
        }
    }
}
