using UnityEngine;

public class PersistenciaMusica : MonoBehaviour
{
    void Awake()
    {
        DontDestroyOnLoad(gameObject);
    }
}