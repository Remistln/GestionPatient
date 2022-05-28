using System;
namespace BackOfficeHopital.Entities
{
    public class Lit : NouveauLit
    {
        public int id { get; set; }

        public override string ToString()
        {
            String description;
            if (etat) {description = "disponible";}
            else {description = "indisponible";}
            return $"Lit n°{numero} chambre {chambre} : {description}";
        }
    }
}