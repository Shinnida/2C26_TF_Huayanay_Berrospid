using UnityEngine;
using UnityEngine.SceneManagement;

public class SceneChanger : MonoBehaviour
{
    public void IrASceneCRUD()
    {
        SceneManager.LoadScene("createHeroe"); // Aseg�rate que este sea el nombre exacto
    }

    public void IrASceneVistas()
    {
        SceneManager.LoadScene("VISTAS"); // Aseg�rate que este sea el nombre exacto
    }
}
