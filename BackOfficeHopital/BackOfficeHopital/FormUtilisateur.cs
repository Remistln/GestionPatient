using System;
using System.Windows.Forms;
using System.Net.Http;
using System.Net.Http.Headers;
using BackOfficeHopital.Entities;

namespace BackOfficeHopital
{
    public partial class FormUtilisateur : Form
    {
        private int type;
        private bool nouveau;
        private Administrateur administrateur;
        private Infirmier infirmier;
        private Secretaire secretaire;
        private PageMenu menu;
        
        public FormUtilisateur(PageMenu menu, int type, object utilisateur = null)
        {
            InitializeComponent();
            
            this.menu = menu;
            this.type = type;
            nouveau = utilisateur is null;
            if (nouveau)
            {
                validerButton.Text = "Ajouter";
                if (type == 0)
                {
                    administrateur = new Administrateur();
                    titreLabel.Text = "Administrateur";
                }

                if (type == 1)
                {
                    infirmier = new Infirmier();
                    titreLabel.Text = "Infirmier";
                }

                if (type == 2)
                {
                    secretaire = new Secretaire();
                    titreLabel.Text = "Secretaire";
                }
            }
            else
            {
                validerButton.Text = "Modifier";
                if (type == 0)
                {
                    administrateur = (Administrateur) utilisateur ;
                    nomTextBox.Text = administrateur.nom;
                    prenomTextBox.Text = administrateur.prenom;
                    identifiantTextBox.Text = administrateur.identifiant;
                    titreLabel.Text = "Administrateur";
                }

                if (type == 1)
                {
                    infirmier = (Infirmier) utilisateur ;
                    nomTextBox.Text = infirmier.nom;
                    prenomTextBox.Text = infirmier.prenom;
                    identifiantTextBox.Text = infirmier.identifiant;
                    titreLabel.Text = "Infirmier";
                }

                if (type == 2)
                {
                    secretaire = (Secretaire) utilisateur ;
                    nomTextBox.Text = secretaire.nom;
                    prenomTextBox.Text = secretaire.prenom;
                    identifiantTextBox.Text = secretaire.identifiant;
                    titreLabel.Text = "Secretaire";
                }
            }
        }

        private async void putUtilisateur()
        {
            using (var putApi = new HttpClient())
            {
                String ip = "192.168.42.96:8000/";
                putApi.BaseAddress = new Uri("http://" + ip);
                putApi.DefaultRequestHeaders.Accept.Clear();
                putApi.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue("application/json"));

                if (type == 0)
                {
                    Utilisateur utilisateur = new Utilisateur();
                    utilisateur.nom = administrateur.nom;
                    utilisateur.prenom = administrateur.prenom;
                    utilisateur.identifiant = administrateur.identifiant;
                    utilisateur.mdp = administrateur.mdp;
                    HttpResponseMessage response = await putApi.PutAsJsonAsync("api/admins/" + administrateur.id, utilisateur);
                }

                if (type == 1)
                {
                    Utilisateur utilisateur = new Utilisateur();
                    utilisateur.nom = infirmier.nom;
                    utilisateur.prenom = infirmier.prenom;
                    utilisateur.identifiant = infirmier.identifiant;
                    utilisateur.mdp = infirmier.mdp;
                    HttpResponseMessage response = await putApi.PutAsJsonAsync("api/infirmiers/" + infirmier.id, utilisateur);
                }

                if (type == 2)
                {
                    Utilisateur utilisateur = new Utilisateur();
                    utilisateur.nom = secretaire.nom;
                    utilisateur.prenom = secretaire.prenom;
                    utilisateur.identifiant = secretaire.identifiant;
                    utilisateur.mdp = secretaire.mdp;
                    HttpResponseMessage response = await putApi.PutAsJsonAsync("api/secretaires/" + secretaire.id, utilisateur);
                }

            }
            
            this.menu.goToUtilisateur();
            this.Close();
        }
        
        private async void postUtilisateur()
        {
            using (var postApi = new HttpClient())
            {
                String ip = "192.168.42.96:8000/";
                postApi.BaseAddress = new Uri("http://" + ip);
                postApi.DefaultRequestHeaders.Accept.Clear();
                postApi.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue("application/ld+json"));

                if (type == 0)
                {
                    Utilisateur utilisateur = new Utilisateur();
                    utilisateur.nom = administrateur.nom;
                    utilisateur.prenom = administrateur.prenom;
                    utilisateur.identifiant = administrateur.identifiant;
                    utilisateur.mdp = administrateur.mdp;
                    HttpResponseMessage response = await postApi.PostAsJsonAsync("api/admins", utilisateur);
                }

                if (type == 1)
                {
                    Utilisateur utilisateur = new Utilisateur();
                    utilisateur.nom = infirmier.nom;
                    utilisateur.prenom = infirmier.prenom;
                    utilisateur.identifiant = infirmier.identifiant;
                    utilisateur.mdp = infirmier.mdp;
                    HttpResponseMessage response = await postApi.PostAsJsonAsync("api/infirmiers", utilisateur);
                }

                if (type == 2)
                {
                    Utilisateur utilisateur = new Utilisateur();
                    utilisateur.nom = secretaire.nom;
                    utilisateur.prenom = secretaire.prenom;
                    utilisateur.identifiant = secretaire.identifiant;
                    utilisateur.mdp = secretaire.mdp;
                    HttpResponseMessage response = await postApi.PostAsJsonAsync("api/secretaires", utilisateur);
                }

            }
            
            this.menu.goToUtilisateur();
            this.Close();
        }
        
        private void retourButton_Click(object sender, EventArgs e)
        {
            this.menu.goToUtilisateur();
            this.Close();
        }

        private void nomTextBox_TextChanged(object sender, EventArgs e)
        {
            if (type == 0){ administrateur.nom = nomTextBox.Text; }
            if (type == 1) { infirmier.nom = nomTextBox.Text ; }
            if (type == 2) { secretaire.nom = nomTextBox.Text ; }
        }

        private void prenomTextBox_TextChanged(object sender, EventArgs e)
        {
            if (type == 0){ administrateur.prenom = prenomTextBox.Text; }
            if (type == 1) { infirmier.prenom = prenomTextBox.Text ; }
            if (type == 2) { secretaire.prenom = prenomTextBox.Text ; }
        }

        private void identifiantTextBox_TextChanged(object sender, EventArgs e)
        {
            if (type == 0){ administrateur.identifiant = identifiantTextBox.Text; }
            if (type == 1) { infirmier.identifiant = identifiantTextBox.Text ; }
            if (type == 2) { secretaire.identifiant = identifiantTextBox.Text ; }
        }

        private void mdpTextBox_TextChanged(object sender, EventArgs e)
        {
            if (type == 0){ administrateur.mdp = BCrypt.Net.BCrypt.HashPassword( mdpTextBox.Text ); }
            if (type == 1) { infirmier.mdp = BCrypt.Net.BCrypt.HashPassword( mdpTextBox.Text ); }
            if (type == 2) { secretaire.mdp = BCrypt.Net.BCrypt.HashPassword( mdpTextBox.Text ); }
        }

        private void validerButton_Click(object sender, EventArgs e)
        {
            if (nouveau)
            {
                postUtilisateur();
            }
            else
            {
                putUtilisateur();
            }
        }
    }
}