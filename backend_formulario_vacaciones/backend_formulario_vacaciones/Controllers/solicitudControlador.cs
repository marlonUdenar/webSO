using backend_formulario_vacaciones;
using Dapper;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Data.SqlClient;


namespace TuProyecto.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class FormularioController : ControllerBase
    {
        private readonly string _connectionString = "Server=MG3\\MSSQLSERVER1;Database=FormularioDB;User Id=sa;Password=12345678;TrustServerCertificate=true";

        // Registrar un nuevo formulario
        [HttpPost("Register")]
        public IActionResult Register([FromBody] solicitud formulario)
        {
            if (formulario == null)
            {
                return BadRequest(new { status = "error", message = "Datos inválidos." });
            }

            using (var connection = new SqlConnection(_connectionString))
            {
                var sql = @"
                    INSERT INTO Formularios (FechaInicio, FechaFin, Notas, NombreGerente, CorreoGerente, PrimerNombre, Apellido, Correo, Telefono)
                    VALUES (@FechaInicio, @FechaFin, @Notas, @NombreGerente, @CorreoGerente, @PrimerNombre, @Apellido, @Correo, @Telefono);
                    SELECT SCOPE_IDENTITY();";

                var id = connection.ExecuteScalar<int>(sql, formulario);
                return Ok(new { status = "success", message = "Formulario registrado con éxito.", id });
            }
        }
    }
}
