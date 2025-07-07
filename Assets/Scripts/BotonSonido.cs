using UnityEngine;
using UnityEngine.UI;

public class BotonSonido : MonoBehaviour
{
    public AudioSource fuenteAudio;

    public void ReproducirSonido()
    {
        if (fuenteAudio != null)
            fuenteAudio.Play();
    }
}
