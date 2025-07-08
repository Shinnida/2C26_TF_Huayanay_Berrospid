using UnityEngine;
using UnityEngine.SceneManagement;

public class SceneChanger : MonoBehaviour
{
    public void IrASceneCRUD()
    {
        SceneManager.LoadScene("createHeroe"); // Asegúrate que este sea el nombre exacto
    }

    public void IrASceneVistas()
    {
        SceneManager.LoadScene("VISTAS"); // Asegúrate que este sea el nombre exacto
    }
}
