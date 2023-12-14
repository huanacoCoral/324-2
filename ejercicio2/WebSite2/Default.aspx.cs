using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;

public partial class _Default : System.Web.UI.Page
{
    string connectionString = "Data Source=localHost;Initial Catalog=examen3;User Id=sa;Password=123;";
    string id, nombre, apellido, fechaN, telefono, email, curso, estado,fechaUltimo;
    DataSet dataSet = new DataSet();
   // SqlConnection conexion = new SqlConnection(connectionString);

    public void MostrarXX(string consulta)
    {
        
      
        DataSet dataSet = new DataSet();
       SqlConnection conexion = new SqlConnection(connectionString);
        conexion.Open();
        SqlCommand comando = new SqlCommand(consulta, conexion);
        
        // Crear un adaptador de datos para ejecutar la consulta y llenar el conjunto de datos
                    SqlDataAdapter adaptador = new SqlDataAdapter(comando);//pidiendo la infromacion de comando
                    adaptador.Fill(dataSet, "Alumno");//recibiendo respuesta con la informacion de la tabla alumno,y mandandola a DataSet
                    tabla.DataSource = dataSet.Tables["Alumno"];
                    tabla.DataBind();
       // txtA.Text = "conectado";
    }
     
    protected void Page_Load(object sender, EventArgs e)
    {

    }
 
    public void insertar(string insertQ)
    {
        SqlConnection connection = new SqlConnection(connectionString);
        
                // Abrir la conexión
                connection.Open();

                SqlCommand command = new SqlCommand(insertQ, connection);
                
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
                    connection.Close();
        
    }
    public void bajas (string insertQ)
    {
        SqlConnection connection = new SqlConnection(connectionString);

        // Abrir la conexión
        connection.Open();

        SqlCommand command = new SqlCommand(insertQ, connection);

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
        connection.Close();

    }

    protected void btnActualizar_Click(object sender, EventArgs e)
    {
        string consulta = "SELECT * FROM Alumno";
        MostrarXX(consulta);
    }
    protected void btnBajas_Click(object sender, EventArgs e)
    {
        
        string insert = "SELECT * FROM Alumno WHERE Estado= 'baja'";
        MostrarXX(insert);

    }
    protected void btnAltas_Click(object sender, EventArgs e)
    {

        string insert = "SELECT * FROM Alumno WHERE Estado= 'alta'";
        MostrarXX(insert);

    }
    protected void btnAgregar_Click(object sender, EventArgs e)
    {
        id=txtId.Text;
        nombre= txtNombre.Text;
        apellido=txtApellido.Text;
        fechaN=txtFechaN.Text;
        telefono=txtTelefono.Text;
        email=txtEmail.Text;
        curso = txtCurso.Text;
        estado = txtEstado.Text;

        string insert = "INSERT INTO Alumno (AlumnoID, Nombre, Apellido, FechaNacimiento, Telefono, Email, Curso, Estado,fechaBaja)" +
                "VALUES ('" + id + "', '" + nombre + "', '" +apellido + "', '" + fechaN + "', '" +
                email + "', '" + telefono + "', '" + curso + "','" + estado + "','" + fechaUltimo + "');";
        
        insertar(insert);
    }
    public string borrar(String id)
    {
        string deleteAlumno = "DELETE FROM Alumno WHERE AlumnoID = '" + id + "'";
        
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
                        return "Registro modifico exitosamente.";

                    }
                    else
                    {
                        return "No se encontró el registro o no se pudo modificarr***. "+id;

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
    protected void Button3_Click(object sender, EventArgs e)
    {
        id = txtId.Text;
        nombre = txtNombre.Text;
        apellido = txtApellido.Text;
        fechaN = txtFechaN.Text;
        telefono = txtTelefono.Text;
        email = txtEmail.Text;
        curso = txtCurso.Text;
        estado = txtEstado.Text;
         sel.Text=id;
         accion.Text = borrar(id);
    }
    protected void tabla_SelectedIndexChanged(object sender, EventArgs e)
    {

    }
    protected void btnModificar_Click(object sender, EventArgs e)
    {
        id = txtId.Text;
        nombre = txtNombre.Text;
        apellido = txtApellido.Text;
        fechaN = txtFechaN.Text;
        telefono = txtTelefono.Text;
        email = txtEmail.Text;
        curso = txtCurso.Text;
        estado = txtEstado.Text;
        //sel.Text = id;
        accion.Text = borrar(id);

        string insert = "INSERT INTO Alumno (AlumnoID, Nombre, Apellido, FechaNacimiento, Telefono, Email, Curso, Estado,fechaBaja)" +
                "VALUES ('" + id + "', '" + nombre + "', '" + apellido + "', '" + fechaN + "', '" +
                email + "', '" + telefono + "', '" + curso + "','" + estado + "','" + fechaUltimo + "');";

        insertar(insert);

       // sel.Text = id;
    }
}
