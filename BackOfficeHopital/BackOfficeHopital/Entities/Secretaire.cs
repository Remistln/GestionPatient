using System;

namespace BackOfficeHopital.Entities
{
    public class Secretaire : Utilisateur
    {
        public int id { get; set; }
        
        public override string ToString()
        {
            return $"Secretaire {nom} {prenom} : {identifiant}";
        }
    }

}