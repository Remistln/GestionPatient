using System;
using System.Windows.Forms;

namespace BackOfficeHopital
{
    public partial class PageMenu : Form
    {
        public Form[] listePage { get; set; }
        public PageMenu()
        {
            InitializeComponent();
            this.listePage = new Form[7];
        }

        public void goToMenu() { this.Show(); }
        public void goToLogin() { this.listePage[0].Show(); }
        public void goToUtilisateur() { this.listePage[1].Show(); }
        public void goToPatient() { this.listePage[2].Show(); }
        public void goToLit() { this.listePage[3].Show(); }
        public void goToService() { this.listePage[4].Show(); }
        public void goToRdv() { this.listePage[5].Show(); }
        public void goToVaccin() { this.listePage[6].Show(); }

        private void litButton_Click(object sender, EventArgs e)
        {
            this.Hide();
            this.goToLit();
        }

        private void patientButton_Click(object sender, EventArgs e)
        {
            this.Hide();
            this.goToPatient();
        }

        private void rdvButton_Click(object sender, EventArgs e)
        {
            this.Hide();
            this.goToRdv();
        }

        private void serviceButton_Click(object sender, EventArgs e)
        {
            this.Hide();
            this.goToService();
        }

        private void utilisateurButton_Click(object sender, EventArgs e)
        {
            this.Hide();
            this.goToUtilisateur();
        }

        private void vaccinButton_Click(object sender, EventArgs e)
        {
            this.Hide();
            this.goToVaccin();
        }

        private void decoButton_Click(object sender, EventArgs e)
        {
            this.Hide();
            this.goToLogin();
        }
    }
}