namespace BackOfficeHopital.Entities
{
    public class Service : NouveauService
    {
        public int id { get; set; }

        public override string ToString()
        {
            return $"Service de {label}";
        }
    }
}