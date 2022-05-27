using System;

namespace BackOfficeHopital.Entities
{
    public class Infirmier : Utilisateur
    {
        public int id { get; set; }
        
        public override string ToString()
        {
            return $"Infirmier {nom} {prenom} : {identifiant}";
        }
    }

}