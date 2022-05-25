using System;
using System.Windows.Forms;
using System.Net.Http;
using System.Net.Http.Headers;
using System.ComponentModel;

using BackOfficeHopital.Entities;

namespace BackOfficeHopital
{
    public partial class PageUtilisateur : Form
    {
        public BindingList<Administrateur> listeAdministrateurs {get; set;}
        public BindingList<Infirmier> listeInfirmiers {get; set;}
        public BindingList<Secretaire> listeSecretaires {get; set;}
        
        private PageMenu menu;
        public PageUtilisateur(PageMenu menu)
        {
            InitializeComponent();
            this.menu = menu;
            listeAdministrateurs = new BindingList<Administrateur>();
            listeInfirmiers = new BindingList<Infirmier>();
            listeSecretaires = new BindingList<Secretaire>();

            AdminListBox.DataSource = listeAdministrateurs;
            InfirmierListBox.DataSource = listeInfirmiers;
            SecretaireListBox.DataSource = listeSecretaires;
        }

        private void getUtilisateur()
        {
            this.getAdministrateur();
            this.getInfirmier();
            this.getSecretaire();
            base.Show();
        }
        
        public async void getAdministrateur()
        {
            using (var loginApi = new HttpClient())
            {
                String ip = "192.168.42.96:8000/";
                loginApi.BaseAddress = new Uri("http://" + ip );
                loginApi.DefaultRequestHeaders.Accept.Clear();
                loginApi.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue("application/json"));
                HttpResponseMessage response = await loginApi.GetAsync("api/admins");
                
                Administrateur[] administrateurs = null;
                
                if (response.IsSuccessStatusCode)
                {
                    administrateurs = await response.Content.ReadAsAsync<Administrateur[]>();
                    listeAdministrateurs = new BindingList<Administrateur>(administrateurs);
                    AdminListBox.DataSource = listeAdministrateurs;
                }
            }
        }
        
        public async void getInfirmier()
        {
            using (var loginApi = new HttpClient())
            {
                String ip = "192.168.42.96:8000/";
                loginApi.BaseAddress = new Uri("http://" + ip );
                loginApi.DefaultRequestHeaders.Accept.Clear();
                loginApi.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue("application/json"));
                HttpResponseMessage response = await loginApi.GetAsync("api/infirmiers");
                
                Infirmier[] infirmiers = null;
                
                if (response.IsSuccessStatusCode)
                {
                    infirmiers = await response.Content.ReadAsAsync<Infirmier[]>();
                    listeInfirmiers = new BindingList<Infirmier>(infirmiers);
                    InfirmierListBox.DataSource = listeInfirmiers;
                }
            }
        }
        
        public async void getSecretaire()
        {
            using (var loginApi = new HttpClient())
            {
                String ip = "192.168.42.96:8000/";
                loginApi.BaseAddress = new Uri("http://" + ip );
                loginApi.DefaultRequestHeaders.Accept.Clear();
                loginApi.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue("application/json"));
                HttpResponseMessage response = await loginApi.GetAsync("api/secretaires");
                
                Secretaire[] secretaires = null;
                
                if (response.IsSuccessStatusCode)
                {
                    secretaires = await response.Content.ReadAsAsync<Secretaire[]>();
                    listeSecretaires = new BindingList<Secretaire>(secretaires);
                    SecretaireListBox.DataSource = listeSecretaires;
                }
            }
        }
        
        private void menuButton_Click(object sender, EventArgs e)
        {
            this.Hide();
            this.menu.goToMenu();
        }

        private void PageUtilisateur_Shown(object sender, EventArgs e)
        {
            this.getUtilisateur();
        }
    }
}