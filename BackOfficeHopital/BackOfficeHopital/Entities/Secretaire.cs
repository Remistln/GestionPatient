using System;

namespace BackOfficeHopital.Entities
{
    public class Secretaire
    {
        public int id { get; set; }
        public String nom { get; set; }
        public String prenom { get; set; }
        public String identifiant { get; set; }
        public String mdp { get; set; }
        
        public override string ToString()
        {
            return $"Secretaire {nom} {prenom} : {identifiant}";
        }
    }
}