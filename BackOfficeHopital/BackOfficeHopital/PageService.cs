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
    }
}