using System;
using UnityEngine;

public static class JsonHelper
{
    public static T[] FromJson<T>(string json)
    {
        Wrapper<T> wrapper = JsonUtility.FromJson<Wrapper<T>>(FixJson(json));
        return wrapper.items;
    }

    static string FixJson(string value)
    {
        return "{\"items\":" + value + "}";
    }

    [Serializable]
    private class Wrapper<T>
    {
        public T[] items;
    }
}
