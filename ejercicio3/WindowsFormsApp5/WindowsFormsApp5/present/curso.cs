using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Runtime.ConstrainedExecution;
using System.Security.Cryptography.X509Certificates;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

using WindowsFormsApp5.cone;
using static System.Windows.Forms.VisualStyles.VisualStyleElement.ListView;

namespace WindowsFormsApp5.present
{
    public partial class curso : Form
    {
        conexion mostrando = new conexion();//llamando de la clase
        string seleccionando = null;
        string nom, ap, fen, em, te, cu, es, feu;
        public curso()
        {
            

            InitializeComponent();
           
            DataSet resultado = mostrando.MostrarX();//obtniendo la informacion de MostrarX en un -->DataSet

            dataGridAlumno.DataSource = resultado.Tables[0];//Asigna el dataSet al control DataGridView

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void label2_Click(object sender, EventArgs e)
        {

        }

        private void curso_Load(object sender, EventArgs e)
        {

        }

        private void textBox2_TextChanged(object sender, EventArgs e)
        {

        }

        private void textBox6_TextChanged(object sender, EventArgs e)
        {

        }

        private void label7_Click(object sender, EventArgs e)
        {
            
        }

        private void btnexaminar_Click(object sender, EventArgs e)
        {
            DataSet resultado = mostrando.MostrarX();//obtniendo la informacion de MostrarX en un -->DataSet

            dataGridAlumno.DataSource = resultado.Tables[0];

            conexion conex = new conexion();

            MessageBox.Show("conexion esitosa   +  "+conex.Coneconexion());


        }
       /* public void recuperarInfo()
        {
            Class1 cur = new Class1();
            cur.ID = txtid.Text;
            MessageBox.Show(cur.ID);

        }*/

        private void btnagregar_Click(object sender, EventArgs e)
        {
            string id = txtid.Text;
            string nombre = txtnombre.Text;
            string Apellido = txtapellido.Text;
            string fechaN = txtfechaN.Text;
            string Email = txtEmail.Text;
            string Telefono = txttelefono.Text;
            string Curso = txtcurso.Text;
            string estado = txtestado.Text;
            string fechaUltimo = fechaU.Text;
            string insert = "INSERT INTO Alumno (AlumnoID, Nombre, Apellido, FechaNacimiento, Telefono, Email, Curso, Estado,fechaBaja)" +
                "VALUES ('" + id + "', '" + nombre + "', '" + Apellido + "', '" + fechaN+"', '"+
                Email+"', '"+Telefono+"', '"+Curso+"','"+estado+"','"+fechaUltimo+"');";
            conexion nuevo = new conexion();//llamando de la clase 
            nuevo.insertar(insert);
            //MessageBox.Show("se inserto.. "+insert+"   * con ");
        }

        private void label8_Click(object sender, EventArgs e)
        {

        }

        private void btnborrar_Click(object sender, EventArgs e)
        {
            conexion borrando = new conexion();
            string x = borrando.borrar(seleccionando);
            MessageBox.Show("   "+x);
        }

        private void dataGridAlumno_CellClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void label9_Click(object sender, EventArgs e)
        {

        }

        private void dataGridAlumno_CellClick_1(object sender, DataGridViewCellEventArgs e)
        {
            string nom, ap, fen, em, te, cu, es, feu;
            int n = e.RowIndex;
            seleccion.Text = GetStringCellValue(dataGridAlumno.Rows[n].Cells[0].Value);
            nom = GetStringCellValue(dataGridAlumno.Rows[n].Cells[1].Value);
            ap = GetStringCellValue(dataGridAlumno.Rows[n].Cells[2].Value);
            fen = GetStringCellValue(dataGridAlumno.Rows[n].Cells[3].Value);
            te = GetStringCellValue(dataGridAlumno.Rows[n].Cells[4].Value);
            em = GetStringCellValue(dataGridAlumno.Rows[n].Cells[5].Value);
            cu = GetStringCellValue(dataGridAlumno.Rows[n].Cells[6].Value);
            es = GetStringCellValue(dataGridAlumno.Rows[n].Cells[7].Value);
            feu = GetStringCellValue(dataGridAlumno.Rows[n].Cells[8].Value);
            seleccionando = seleccion.Text;
        }

        private string GetStringCellValue(object cellValue)
        {
            // Devuelve una cadena vacía si el valor de la celda es null, de lo contrario, convierte el valor a cadena.
            return (cellValue != null) ? cellValue.ToString() : string.Empty;
        }



        private void btnmodificar_Click(object sender, EventArgs e)
        {

            conexion r = new conexion();
            string s=r.actualizando(seleccionando, nom, ap, fen, em, te, cu, es, feu);
            MessageBox.Show("   " + s);

        }
    }
}
