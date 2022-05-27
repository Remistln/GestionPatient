using System.ComponentModel;

namespace BackOfficeHopital
{
    partial class PageUtilisateur
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }

            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.menuButton = new System.Windows.Forms.Button();
            this.AdminListBox = new System.Windows.Forms.ListBox();
            this.InfirmierListBox = new System.Windows.Forms.ListBox();
            this.SecretaireListBox = new System.Windows.Forms.ListBox();
            this.ajoutAdminbutton = new System.Windows.Forms.Button();
            this.supprAdminButton = new System.Windows.Forms.Button();
            this.modifAdminButton = new System.Windows.Forms.Button();
            this.ajoutInfirmButton = new System.Windows.Forms.Button();
            this.supprInfirmButton = new System.Windows.Forms.Button();
            this.modifInfirmButton = new System.Windows.Forms.Button();
            this.supprSecrButton = new System.Windows.Forms.Button();
            this.modifSecrButton = new System.Windows.Forms.Button();
            this.ajoutSecrButton = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // menuButton
            // 
            this.menuButton.Location = new System.Drawing.Point(443, 33);
            this.menuButton.Name = "menuButton";
            this.menuButton.Size = new System.Drawing.Size(69, 28);
            this.menuButton.TabIndex = 0;
            this.menuButton.Text = "Menu";
            this.menuButton.UseVisualStyleBackColor = true;
            this.menuButton.Click += new System.EventHandler(this.menuButton_Click);
            // 
            // AdminListBox
            // 
            this.AdminListBox.FormattingEnabled = true;
            this.AdminListBox.Location = new System.Drawing.Point(31, 21);
            this.AdminListBox.Name = "AdminListBox";
            this.AdminListBox.Size = new System.Drawing.Size(329, 134);
            this.AdminListBox.TabIndex = 1;
            // 
            // InfirmierListBox
            // 
            this.InfirmierListBox.FormattingEnabled = true;
            this.InfirmierListBox.Location = new System.Drawing.Point(27, 205);
            this.InfirmierListBox.Name = "InfirmierListBox";
            this.InfirmierListBox.Size = new System.Drawing.Size(333, 134);
            this.InfirmierListBox.TabIndex = 2;
            // 
            // SecretaireListBox
            // 
            this.SecretaireListBox.FormattingEnabled = true;
            this.SecretaireListBox.Location = new System.Drawing.Point(395, 180);
            this.SecretaireListBox.Name = "SecretaireListBox";
            this.SecretaireListBox.Size = new System.Drawing.Size(315, 147);
            this.SecretaireListBox.TabIndex = 3;
            // 
            // ajoutAdminbutton
            // 
            this.ajoutAdminbutton.Location = new System.Drawing.Point(31, 161);
            this.ajoutAdminbutton.Name = "ajoutAdminbutton";
            this.ajoutAdminbutton.Size = new System.Drawing.Size(66, 29);
            this.ajoutAdminbutton.TabIndex = 4;
            this.ajoutAdminbutton.Text = "Ajout";
            this.ajoutAdminbutton.UseVisualStyleBackColor = true;
            this.ajoutAdminbutton.Click += new System.EventHandler(this.ajoutAdminbutton_Click);
            // 
            // supprAdminButton
            // 
            this.supprAdminButton.Location = new System.Drawing.Point(117, 165);
            this.supprAdminButton.Name = "supprAdminButton";
            this.supprAdminButton.Size = new System.Drawing.Size(68, 25);
            this.supprAdminButton.TabIndex = 5;
            this.supprAdminButton.Text = "Supprimer";
            this.supprAdminButton.UseVisualStyleBackColor = true;
            this.supprAdminButton.Click += new System.EventHandler(this.supprAdminButton_Click);
            // 
            // modifAdminButton
            // 
            this.modifAdminButton.Location = new System.Drawing.Point(212, 165);
            this.modifAdminButton.Name = "modifAdminButton";
            this.modifAdminButton.Size = new System.Drawing.Size(65, 30);
            this.modifAdminButton.TabIndex = 6;
            this.modifAdminButton.Text = "Modifier";
            this.modifAdminButton.UseVisualStyleBackColor = true;
            this.modifAdminButton.Click += new System.EventHandler(this.modifAdminButton_Click);
            // 
            // ajoutInfirmButton
            // 
            this.ajoutInfirmButton.Location = new System.Drawing.Point(31, 345);
            this.ajoutInfirmButton.Name = "ajoutInfirmButton";
            this.ajoutInfirmButton.Size = new System.Drawing.Size(51, 30);
            this.ajoutInfirmButton.TabIndex = 7;
            this.ajoutInfirmButton.Text = "Ajout";
            this.ajoutInfirmButton.UseVisualStyleBackColor = true;
            this.ajoutInfirmButton.Click += new System.EventHandler(this.ajoutInfirmButton_Click);
            // 
            // supprInfirmButton
            // 
            this.supprInfirmButton.Location = new System.Drawing.Point(88, 344);
            this.supprInfirmButton.Name = "supprInfirmButton";
            this.supprInfirmButton.Size = new System.Drawing.Size(75, 31);
            this.supprInfirmButton.TabIndex = 8;
            this.supprInfirmButton.Text = "Supprimer";
            this.supprInfirmButton.UseVisualStyleBackColor = true;
            this.supprInfirmButton.Click += new System.EventHandler(this.supprInfirmButton_Click);
            // 
            // modifInfirmButton
            // 
            this.modifInfirmButton.Location = new System.Drawing.Point(187, 350);
            this.modifInfirmButton.Name = "modifInfirmButton";
            this.modifInfirmButton.Size = new System.Drawing.Size(56, 25);
            this.modifInfirmButton.TabIndex = 9;
            this.modifInfirmButton.Text = "Modifier";
            this.modifInfirmButton.UseVisualStyleBackColor = true;
            this.modifInfirmButton.Click += new System.EventHandler(this.modifInfirmButton_Click);
            // 
            // supprSecrButton
            // 
            this.supprSecrButton.Location = new System.Drawing.Point(511, 359);
            this.supprSecrButton.Name = "supprSecrButton";
            this.supprSecrButton.Size = new System.Drawing.Size(74, 27);
            this.supprSecrButton.TabIndex = 10;
            this.supprSecrButton.Text = "Supprimer";
            this.supprSecrButton.UseVisualStyleBackColor = true;
            this.supprSecrButton.Click += new System.EventHandler(this.supprSecrButton_Click);
            // 
            // modifSecrButton
            // 
            this.modifSecrButton.Location = new System.Drawing.Point(623, 361);
            this.modifSecrButton.Name = "modifSecrButton";
            this.modifSecrButton.Size = new System.Drawing.Size(55, 28);
            this.modifSecrButton.TabIndex = 11;
            this.modifSecrButton.Text = "Modifier";
            this.modifSecrButton.UseVisualStyleBackColor = true;
            this.modifSecrButton.Click += new System.EventHandler(this.modifSecrButton_Click);
            // 
            // ajoutSecrButton
            // 
            this.ajoutSecrButton.Location = new System.Drawing.Point(413, 356);
            this.ajoutSecrButton.Name = "ajoutSecrButton";
            this.ajoutSecrButton.Size = new System.Drawing.Size(65, 33);
            this.ajoutSecrButton.TabIndex = 12;
            this.ajoutSecrButton.Text = "Ajout";
            this.ajoutSecrButton.UseVisualStyleBackColor = true;
            this.ajoutSecrButton.Click += new System.EventHandler(this.ajoutSecrButton_Click);
            // 
            // PageUtilisateur
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(800, 450);
            this.Controls.Add(this.ajoutSecrButton);
            this.Controls.Add(this.modifSecrButton);
            this.Controls.Add(this.supprSecrButton);
            this.Controls.Add(this.modifInfirmButton);
            this.Controls.Add(this.supprInfirmButton);
            this.Controls.Add(this.ajoutInfirmButton);
            this.Controls.Add(this.modifAdminButton);
            this.Controls.Add(this.supprAdminButton);
            this.Controls.Add(this.ajoutAdminbutton);
            this.Controls.Add(this.SecretaireListBox);
            this.Controls.Add(this.InfirmierListBox);
            this.Controls.Add(this.AdminListBox);
            this.Controls.Add(this.menuButton);
            this.Name = "PageUtilisateur";
            this.Text = "PageUtilisateur";
            this.Shown += new System.EventHandler(this.PageUtilisateur_Shown);
            this.VisibleChanged += new System.EventHandler(this.PageUtilisateur_Shown);
            this.ResumeLayout(false);
        }

        private System.Windows.Forms.Button ajoutAdminbutton;
        private System.Windows.Forms.Button supprAdminButton;
        private System.Windows.Forms.Button modifAdminButton;
        private System.Windows.Forms.Button ajoutInfirmButton;
        private System.Windows.Forms.Button supprInfirmButton;
        private System.Windows.Forms.Button modifInfirmButton;
        private System.Windows.Forms.Button supprSecrButton;
        private System.Windows.Forms.Button modifSecrButton;
        private System.Windows.Forms.Button ajoutSecrButton;

        private System.Windows.Forms.ListBox AdminListBox;
        private System.Windows.Forms.ListBox InfirmierListBox;
        private System.Windows.Forms.ListBox SecretaireListBox;

        private System.Windows.Forms.Button menuButton;

        #endregion
    }
}