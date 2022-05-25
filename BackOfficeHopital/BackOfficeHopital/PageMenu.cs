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

        public void goToMenu()
        {
            this.Show();
        }
    }
}