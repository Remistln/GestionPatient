using System;
using System.Windows.Forms;

namespace BackOfficeHopital
{
    public partial class PageService : Form
    {
        private PageMenu menu;
        public PageService(PageMenu menu)
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