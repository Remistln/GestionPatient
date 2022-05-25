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
            this.AdminListBox.Location = new System.Drawing.Point(31, 37);
            this.AdminListBox.Name = "AdminListBox";
            this.AdminListBox.Size = new System.Drawing.Size(329, 134);
            this.AdminListBox.TabIndex = 1;
            // 
            // InfirmierListBox
            // 
            this.InfirmierListBox.FormattingEnabled = true;
            this.InfirmierListBox.Location = new System.Drawing.Point(26, 188);
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
            // PageUtilisateur
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(800, 450);
            this.Controls.Add(this.SecretaireListBox);
            this.Controls.Add(this.InfirmierListBox);
            this.Controls.Add(this.AdminListBox);
            this.Controls.Add(this.menuButton);
            this.Name = "PageUtilisateur";
            this.Text = "PageUtilisateur";
            this.Shown += new System.EventHandler(this.PageUtilisateur_Shown);
            this.ResumeLayout(false);
        }

        private System.Windows.Forms.ListBox AdminListBox;
        private System.Windows.Forms.ListBox InfirmierListBox;
        private System.Windows.Forms.ListBox SecretaireListBox;

        private System.Windows.Forms.Button menuButton;

        #endregion
    }
}