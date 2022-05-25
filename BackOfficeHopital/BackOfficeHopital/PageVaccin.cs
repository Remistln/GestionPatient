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
    }
}