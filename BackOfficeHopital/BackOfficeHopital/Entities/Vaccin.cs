using System;

namespace BackOfficeHopital.Entities
{
    public class Vaccin : NouveauVaccin
    {
        public int id { get; set; }
        
        public override string ToString()
        {
            String description;
            if (reserve) {description = "réservé";}
            else {description = "disponible";}
            return $"Vaccin {type.label} {description} : périme le {datePeremption}";
        }
    }
}