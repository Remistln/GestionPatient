using System;
using System.Windows.Forms;

namespace BackOfficeHopital
{
    public partial class PageLogin : Form
    {
        private string mail;
        private string mdp;

        public PageLogin()
        {
            InitializeComponent();
            this.mail = "";
            this.mdp = "";
        }

        private void mailInput_TextChanged(object sender, EventArgs e)
        {
            this.mail = this.mailInput.Text;
        }

        private void mdpInput_TextChanged(object sender, EventArgs e)
        {
            this.mdp = this.mdpInput.Text;
        }
    }
}