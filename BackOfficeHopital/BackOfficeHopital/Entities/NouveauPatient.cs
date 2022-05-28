using System;

namespace BackOfficeHopital.Entities
{
    public class NouveauPatient
    {
        public String nom { get; set; }
        public String prenom { get; set; }
        public DateTime dateNaissance { get; set; }
        public String lieuNaissance { get; set; }
        public String description { get; set; }
        public String probleme { get; set; }
        public String numeroSS { get; set; }
        public int service { get; set; }
        public int lit { get; set; }
    }
}