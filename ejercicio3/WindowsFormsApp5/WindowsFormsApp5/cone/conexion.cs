using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;


namespace WindowsFormsApp5.cone
{
    /* Console.WriteLine("Fecha a id: " + seleccion );
  Console.WriteLine("Fecha a nombre: " + nom);
  Console.WriteLine("Fecha a apelldio: " + ap);
  Console.WriteLine("Fecha a fechaN: " + fen);
  Console.WriteLine("Fecha a email: " + em);
  Console.WriteLine("Fecha a curso: " + cu); 
  Console.WriteLine("Fecha a estado: " + es);
  Console.WriteLine("Fecha a fechab: " + feu);*/
    internal class conexion
    {   // Cadena de conexión a la base de datos
        string connectionString = "Data Source=localHost;Initial Catalog=examen3;User Id=sa;Password=123;";

        public bool Coneconexion() {

             //   SqlConnection Conexion = new SqlConnection("Data Source=localHost;Initial Catalog=examen3;User Id=sa;Password=123;");
            try
            {
                using (SqlConnection Conexion = new SqlConnection("Data Source=localHost;Initial Catalog=examen3;User Id=sa;Password=123;"))
                {
                    Conexion.Open();

                    // Ejemplo de consulta: seleccionar todos los registros de la tabla Alumno
                    string consulta = "SELECT * FROM Alumno";

                    using (SqlCommand Comando = new SqlCommand(consulta, Conexion))
                    {
                        // Ejecutar la consulta y obtener un lector de datos
                        using (SqlDataReader reader = Comando.ExecuteReader())
                        {
                            // Iterar a través de los resultados
                            while (reader.Read())
                            {
                                // Acceder a los valores de las columnas
                                string nombre = reader["Nombre"].ToString();
                                string apellido = reader["Apellido"].ToString();

                                // Hacer algo con los valores, por ejemplo, imprimirlos en la consola
                                Console.WriteLine($"Nombre: {nombre}, Apellido: {apellido}");
                            }
                        }
                    }
                }

                Console.WriteLine("Consulta exitosa.");
                return true;
            }
            catch (Exception ex)
            {
                // Manejar errores de conexión
                Console.WriteLine("Error al conectar con la base de datos: " + ex.Message);
                return false;
            }


        }
        public void Conectando (string consulta)
        {

        }
        public DataSet MostrarX()
        {
            // Ejemplo de consulta: seleccionar todos los registros de la tabla Alumno
            string consulta = "SELECT * FROM Alumno";

            // Crear un conjunto de datos para almacenar los resultados de la consulta
            DataSet dataSet = new DataSet();

            
            // Crear la conexión
            using (SqlConnection conexion = new SqlConnection(connectionString))
            {
                try
                {
                    // Abrir la conexión
                    conexion.Open();

                  
                    using (SqlCommand comando = new SqlCommand(consulta, conexion))//haciendo la consulta a la base de datos 
                    {
                        // Crear un adaptador de datos para ejecutar la consulta y llenar el conjunto de datos
                        SqlDataAdapter adaptador = new SqlDataAdapter(comando);//pidiendo la infromacion de comando
                        adaptador.Fill(dataSet, "Alumno");//recibiendo respuesta con la informacion de la tabla alumno,y mandandola a DataSet
                    }

                    Console.WriteLine("Consulta exitosa.");

                    // Cerrar la conexión (esto se hace automáticamente al salir del bloque 'using')
                }
                catch (Exception ex)
                {
                    // Manejar errores de conexión
                    Console.WriteLine("Error al conectar con la base de datos: " + ex.Message);
                }
            }

            // Devolver el conjunto de datos con los resultados de la consulta
            return dataSet;
        }
        public DataSet MostrarBaja()
        {
            // Ejemplo de consulta: seleccionar todos los registros de la tabla Alumno
            string consulta = "SELECT * FROM Alumno Where Estado='baja'";

            // Crear un conjunto de datos para almacenar los resultados de la consulta
            DataSet dataSet = new DataSet();


            // Crear la conexión
            using (SqlConnection conexion = new SqlConnection(connectionString))
            {
                try
                {
                    // Abrir la conexión
                    conexion.Open();


                    using (SqlCommand comando = new SqlCommand(consulta, conexion))//haciendo la consulta a la base de datos 
                    {
                        // Crear un adaptador de datos para ejecutar la consulta y llenar el conjunto de datos
                        SqlDataAdapter adaptador = new SqlDataAdapter(comando);//pidiendo la infromacion de comando
                        adaptador.Fill(dataSet, "Alumno");//recibiendo respuesta con la informacion de la tabla alumno,y mandandola a DataSet
                    }

                    Console.WriteLine("Consulta exitosa.");

                    // Cerrar la conexión (esto se hace automáticamente al salir del bloque 'using')
                }
                catch (Exception ex)
                {
                    // Manejar errores de conexión
                    Console.WriteLine("Error al conectar con la base de datos: " + ex.Message);
                }
            }

            // Devolver el conjunto de datos con los resultados de la consulta
            return dataSet;
        }
        public void insertar(string insertQ)
        {
            
           
            // Crear la conexión
            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                try
                {
                    // Abrir la conexión
                    connection.Open();

                    using (SqlCommand command = new SqlCommand(insertQ, connection))
                    {
                        // Ejecutar la instrucción INSERT
                        int rowsAffected = command.ExecuteNonQuery();

                        if (rowsAffected > 0)
                        {
                            Console.WriteLine("Registro insertado exitosamente.");
                        }
                        else
                        {
                            Console.WriteLine("No se pudo insertar el registro.");
                        }
                    }
                }
                catch (Exception ex)
                {
                    // Manejar errores de conexión o ejecución de consulta
                    Console.WriteLine("Error: " + ex.Message);
                }
            }
        }
        public string borrar(String id)
        {
            // Ejemplo de eliminación: eliminar un registro en la tabla Alumno con un cierto criterio
            string deleteAlumno = "DELETE FROM Alumno WHERE AlumnoID = '"+id+"'";
            //return deleteAlumno;
            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                try
                {
                    // Abrir la conexión
                    connection.Open();

                    using (SqlCommand command = new SqlCommand(deleteAlumno, connection))
                    {
                        // Definir el parámetro para el identificador del alumno a eliminar
                        command.Parameters.AddWithValue(id, 1); // Ajusta el valor según tu criterio de eliminación

                        // Ejecutar la instrucción DELETE
                        int rowsAffected = command.ExecuteNonQuery();

                        if (rowsAffected > 0)
                        {
                            return "Registro eliminado exitosamente.";
                            
                        }
                        else
                        {
                           return "No se encontró el registro o no se pudo eliminar.";
                           
                        }
                    }
                }
                catch (Exception ex)
                {
                    // Manejar errores de conexión o ejecución de consulta
                    return ("Error: " + ex.Message);
                   
                }
            }
        }
        public string actualizando(string seleccion,string nom, string ap, string fen, string em, string te, string cu, string es, string feu)
        {
            string updateQuery = "UPDATE Alumno SET Nombre = @NuevoNombre, Apellido = @NuevoApellido, FechaNacimiento = @NuevaFecha, " +
                          "Telefono = @NuevoTelefono, Email = @NuevoEmail, Curso = @NuevoCurso, Estado = @NuevoEstado, fechaBaja = @NuevaFechaBaja " +
                          "WHERE AlumnoID = @AlumnoID";

          //  string updateQuery = "uevaFecha WHERE AlumnoID = @AlumnoID";
            //return deleteAlumno;
            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                connection.Open();
                using (SqlCommand command = new SqlCommand(updateQuery, connection))
                {
                    command.Parameters.AddWithValue("@NuevoNombre", nom);
                    command.Parameters.AddWithValue("@NuevoApellido", ap);
                    command.Parameters.AddWithValue("@NuevaFecha", fen);
                    command.Parameters.AddWithValue("@NuevoTelefono", te);
                    command.Parameters.AddWithValue("@NuevoEmail", em);
                    command.Parameters.AddWithValue("@NuevoCurso", cu);
                    command.Parameters.AddWithValue("@NuevoEstado", es);
                    command.Parameters.AddWithValue("@NuevaFechaBaja", feu);
                    command.Parameters.AddWithValue("@AlumnoID", seleccion);

                    int rowsAffected = command.ExecuteNonQuery();

                    if (rowsAffected > 0)
                    {
                        Console.WriteLine("Registro actualizado exitosamente.");
                        return "Existo";
                    }
                    else
                    {
                        Console.WriteLine("No se encontró el registro o no se pudo actualizar.");
                        return "No se pudo";
                    }
                }
            }
        }

    }
}
