using System;

namespace BackOfficeHopital.Entities
{
    public class NouveauVaccin
    {
        public DateTime datePeremption { get; set; }
        public bool reserve { get; set; }
        public TypeVaccin type { get; set; }
    }
}