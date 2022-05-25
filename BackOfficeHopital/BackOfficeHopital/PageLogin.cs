using System;
using System.Windows.Forms;
using System.Net.Http;
using System.Net.Http.Headers;
using System.Threading.Tasks;
using BackOfficeHopital.Entities;

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

        private async void valitationButton_Click(object sender, EventArgs e)
        {
            throw new System.NotImplementedException();
            using (var loginApi = new HttpClient())
            {
                String ip = "192.168.42.96:8000/";
                loginApi.BaseAddress = new Uri("http://" + ip );
                loginApi.DefaultRequestHeaders.Accept.Clear();
                loginApi.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue("application/ld+json"));
                HttpResponseMessage response = await loginApi.GetAsync("api/Department/1");
                
                Administrateur administrateur = null;
                
                if (response.IsSuccessStatusCode)
                {
                    
                    administrateur = await response.Content.ReadAsAsync<Administrateur>();
                    Console.WriteLine(administrateur);
                }
                else
                {
                    Console.WriteLine("Internal server Error");
                }
            }
        }
    }
}