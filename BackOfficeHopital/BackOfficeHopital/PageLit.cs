using System.Windows.Forms;

namespace BackOfficeHopital
{
    public partial class PageLit : Form
    {
        private PageMenu menu;
        public PageLit(PageMenu menu)
        {
            InitializeComponent();
            this.menu = menu;
        }
    }
}