using UnityEngine;
using UnityEngine.UI;

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
        string nombre = inputNombre.text;
        string rol = inputRol.text;
        string dificultad = dropdownDificultad.options[dropdownDificultad.value].text;
        string h1 = inputH1.text;
        string h2 = inputH2.text;
        string h3 = inputH3.text;
        string ult = inputUlt.text;

        Debug.Log("🛠️ Héroe creado:");
        Debug.Log($"Nombre: {nombre}");
        Debug.Log($"Rol: {rol}");
        Debug.Log($"Dificultad: {dificultad}");
        Debug.Log($"Habilidades: {h1}, {h2}, {h3}, {ult}");
    }
}
