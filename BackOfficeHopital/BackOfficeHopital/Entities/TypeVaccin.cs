using System;

namespace BackOfficeHopital.Entities
{
    public class TypeVaccin
    {
        public int id { get; set; }
        public int label { get; set; }
        public int ageMin { get; set; }
        public int ageMax { get; set; }
        public String[] vaccins { get; set; }

        public override string ToString()
        {
            return $"Service de {label}";
        }
    }
}