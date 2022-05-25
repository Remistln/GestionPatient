using System.Windows.Forms;

namespace BackOfficeHopital
{
    public partial class PageRdv : Form
    {
        private PageMenu menu;
        public PageRdv(PageMenu menu)
        {
            InitializeComponent();
            this.menu = menu;
        }
    }
}