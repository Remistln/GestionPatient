using System;
using System.Windows.Forms;

namespace BackOfficeHopital
{
    public partial class PageVaccin : Form
    {
        private PageMenu menu;
        public PageVaccin(PageMenu menu)
        {
            InitializeComponent();
            this.menu = menu;
        }

        private void menuButton_Click(object sender, EventArgs e)
        {
            this.Hide();
            this.menu.goToMenu();
        }
    }
}