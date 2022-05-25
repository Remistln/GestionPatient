using System.Windows.Forms;

namespace BackOfficeHopital
{
    public partial class PageUtilisateur : Form
    {
        private PageMenu menu;
        public PageUtilisateur(PageMenu menu)
        {
            InitializeComponent();
            this.menu = menu;
        }
    }
}