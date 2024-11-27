namespace backend_formulario_vacaciones
{
    public class solicitud
    {
        public int Id { get; set; } // Llave primaria
        public DateTime FechaInicio { get; set; }
        public DateTime FechaFin { get; set; }
        public string Notas { get; set; }
        public string NombreGerente { get; set; }
        public string CorreoGerente { get; set; }
        public string PrimerNombre { get; set; }
        public string Apellido { get; set; }
        public string Correo { get; set; }
        public string Telefono { get; set; }
    }
}
