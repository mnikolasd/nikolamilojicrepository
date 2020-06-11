using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace RadniNaloziZaGrejanje
{
    public partial class frmMaterijal : Form
    {
        SqlConnection konekcija = new SqlConnection(Konekcija.konString);

        public frmMaterijal()
        {
            InitializeComponent();
        }

        private void btnNazad_Click(object sender, EventArgs e)
        {
            this.Hide();
            frmPocetna newForm1 = new frmPocetna();
            newForm1.ShowDialog();
        }

        private void frmMaterijal_Load(object sender, EventArgs e)
        {
            // TODO: This line of code loads data into the 'grejanjeDataSet.TipMaterijala' table. You can move, or remove it, as needed.
            this.tipMaterijalaTableAdapter.Fill(this.grejanjeDataSet.TipMaterijala);

        }

        private void btnUnesi_Click(object sender, EventArgs e)
        {
            try
            {
                konekcija.Open();
                SqlCommand komanda = new SqlCommand("MaterijalAdd", konekcija);
                komanda.CommandType = CommandType.StoredProcedure;
                komanda.Parameters.AddWithValue("@naziv", tbNazivMaterijala.Text);
                komanda.Parameters.AddWithValue("@cena", tbCenaMaterijala.Text);
                komanda.ExecuteNonQuery();
                MessageBox.Show("Uspesno Uneto", "Potvrda");
                this.tipMaterijalaTableAdapter.Fill(this.grejanjeDataSet.TipMaterijala);
            }
            catch (Exception ex)
            {
                MessageBox.Show("Greksa" + ex.Message);
            }
            finally
            {
                konekcija.Close();
            }
        }

        private void dgwMaterijal_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            if ((MessageBox.Show("Da li ste sigurni da zelite da obrisete izabrani set materijala", "Obavestenje", MessageBoxButtons.YesNo, MessageBoxIcon.Question) == DialogResult.Yes))
            {
                SqlCommand komanda = new SqlCommand("DELETE FROM TipMaterijala WHERE TipMaterijalaID = " + dgwMaterijal.CurrentRow.Cells[0].Value, konekcija);

                try
                {
                    konekcija.Open();
                    komanda.ExecuteNonQuery();
                    MessageBox.Show("Uspesno ste obrisali set materijala", "Obavestenje");
                    this.tipMaterijalaTableAdapter.Fill(this.grejanjeDataSet.TipMaterijala);

                }
                catch (Exception ex)
                {
                    MessageBox.Show("Greska: " + ex.Message);
                }
                finally
                {
                    konekcija.Close();
                }
            }
        }
    }
}
