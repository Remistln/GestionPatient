using System.Windows.Forms;

namespace BackOfficeHopital
{
    public partial class PagePatient : Form
    {
        private PageMenu menu;
        public PagePatient(PageMenu menu)
        {
            InitializeComponent();
            this.menu = menu;
        }
    }
}