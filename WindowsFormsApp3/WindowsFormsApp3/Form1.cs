using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data;
using System.Data.SqlClient;
using System.IO;


namespace WindowsFormsApp3
{
    public partial class Form1 : Form
    {
        //string CadenaConexion = "Data Source= PC-PC\\SQLEXPRESS;Initial Catalog=imags;Integrated Security=True";
        string cadenaConexion = "Data Source=localHost;Initial Catalog=imgs;User Id=sa;Password=123;";

        Bitmap bmp;
        int pR, pB, pG;
        int[] pRA = new int[3];
        int[] pBA = new int[3];
        int[] pGA = new int[3];
        int x = 0;
        int ii = 0;
        private void pictureBox1_Click(object sender, EventArgs e)
        {

        }

        public Form1()
            {
            InitializeComponent();
        }

        private void pictureBox1_MouseClick(object sender, MouseEventArgs e)
        {
            //no es un boton
           
            if ( ii < 3)
            { 
            Color c = new Color();
            pR = 0;
            pG = 0;
            pB = 0;
            for (int ki = e.X; ki < e.X + 10; ki++)
                for (int kj = e.Y; kj < e.Y + 10; kj++)
                {
                    c = bmp.GetPixel(ki, kj);
                    pR = pR + c.R;
                    pG = pG + c.G;
                    pB = pB + c.B;
                }
            pR = pR / 100;
            pG = pG / 100;
            pB = pB / 100;

            textBox1.Text = c.R.ToString();
            textBox2.Text = c.G.ToString();
            textBox3.Text = c.B.ToString();
                pRA[ii] = pR;
                pGA[ii] = pG;
                pBA[ii] = pB;
                ii++;
            }
            else
            {
                ii = 0;
            }
        }
        

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void button3_Click(object sender, EventArgs e)
        {
            
        }

        private void button1_Click(object sender, EventArgs e)
        {
            // Solo permitirá la selección de archivos con extensiones .jpg, .png o .gif.
            //openFileDialog1.Filter = "*.jpg|*.png|*.gif";

            // Muestra el cuadro de diálogo de apertura de archivos y espera a que el usuario seleccione un archivo.
            openFileDialog1.ShowDialog();

            // Crea un objeto Bitmap a partir del archivo seleccionado por el usuario.
            bmp = new Bitmap(openFileDialog1.FileName);//agarra la imagen

            // Asigna la imagen cargada al control PictureBox en tu interfaz de usuario.
            pictureBox1.Image = bmp;
        }

        private void button2_Click(object sender, EventArgs e)
        {
            int aux = 0;
            int aux1 = 0;
            for (x = 0; x < 3; x++)
            {
                pR = pRA[x];
                pG = pGA[x];
                pB = pBA[x];

            
            int mR, mG, mB = 0;
            Color c = new Color();
            Bitmap bmpR = new Bitmap(bmp.Width, bmp.Height);
            for (int i = 0; i < bmp.Width - 10; i = i + 10)
                for (int j = 0; j < bmp.Height - 10; j = j + 10)
                {
                    mR = 0;
                    mG = 0;
                    mB = 0;
                    for (int ki = i; ki < i + 10; ki++)
                        for (int kj = j; kj < j + 10; kj++)
                        {
                            c = bmp.GetPixel(ki, kj);
                            mR = mR + c.R;
                            mG = mG + c.G;
                            mB = mB + c.B;
                        }
                    mR = mR / 100;
                    mG = mG / 100;
                    mB = mB / 100;
                    c = bmp.GetPixel(i, j);
                    if ((pR - 5 < mR && mR <= pR + 5) && (pG - 5 < mG && mG <= pG + 5) && (pB - 5 < mB && mB <= pB + 5))
                    {
                        for (int ki = i; ki < i + 10; ki++)
                            for (int kj = j; kj < j + 10; kj++)
                                bmpR.SetPixel(ki, kj, Color.Fuchsia);
                    }
                    else
                    {
                        for (int ki = i; ki < i + 10; ki++)
                            for (int kj = j; kj < j + 10; kj++)
                            {

                                c = bmp.GetPixel(ki, kj);
                                bmpR.SetPixel(ki, kj, Color.FromArgb(c.R, c.G, c.B));
                            }

                    }
                }
               // int Tamanio = bmpR.GetPixel(bmpR.Width,bmpR.Height); 
                pictureBox2.Image = bmpR;

                

                byte[] imagenBytes;
                using (MemoryStream ms = new MemoryStream())
                {
                    bmpR.Save(ms, System.Drawing.Imaging.ImageFormat.Bmp);
                    imagenBytes = ms.ToArray();
                }


                // Crear la conexión SQL
                using (SqlConnection conexionSQL = new SqlConnection(cadenaConexion))
                {
                    // Crear el comando SQL
                    using (SqlCommand cmd = new SqlCommand())
                    {
                        cmd.CommandText = "INSERT INTO Imagenes (imagen) VALUES (@imagen)";
                        cmd.Parameters.Add("@imagen", SqlDbType.Image).Value = imagenBytes;
                        cmd.CommandType = CommandType.Text;
                        cmd.Connection = conexionSQL;

                        // Abrir la conexión y ejecutar la consulta
                        conexionSQL.Open();
                        cmd.ExecuteNonQuery();
                    }
                }

            }
            x = 0;
        }
    }
}
