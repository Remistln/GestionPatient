using System;

namespace BackOfficeHopital.Entities
{
    public class Administrateur : Utilisateur
    {
        public int id { get; set; }

        public override string ToString()
        {
            return $"Administrateur {nom} {prenom} : {identifiant}";
        }
    }

}