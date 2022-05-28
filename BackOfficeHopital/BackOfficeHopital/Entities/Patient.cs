namespace BackOfficeHopital.Entities
{
    public class Patient : NouveauPatient
    {
        
        public int id { get; set; }

        public override string ToString()
        {
            return $"Patient {nom} {prenom} : numéro {numeroSS}";
        }
    }
}