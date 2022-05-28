using System.ComponentModel;

namespace BackOfficeHopital
{
    partial class PagePatient
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
            this.PatientListBox = new System.Windows.Forms.ListBox();
            this.AjoutButton = new System.Windows.Forms.Button();
            this.supprButton = new System.Windows.Forms.Button();
            this.modifButton = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // menuButton
            // 
            this.menuButton.Location = new System.Drawing.Point(503, 32);
            this.menuButton.Name = "menuButton";
            this.menuButton.Size = new System.Drawing.Size(71, 32);
            this.menuButton.TabIndex = 0;
            this.menuButton.Text = "Menu";
            this.menuButton.UseVisualStyleBackColor = true;
            this.menuButton.Click += new System.EventHandler(this.menuButton_Click);
            // 
            // PatientListBox
            // 
            this.PatientListBox.FormattingEnabled = true;
            this.PatientListBox.Location = new System.Drawing.Point(38, 56);
            this.PatientListBox.Name = "PatientListBox";
            this.PatientListBox.Size = new System.Drawing.Size(360, 212);
            this.PatientListBox.TabIndex = 1;
            // 
            // AjoutButton
            // 
            this.AjoutButton.Location = new System.Drawing.Point(54, 294);
            this.AjoutButton.Name = "AjoutButton";
            this.AjoutButton.Size = new System.Drawing.Size(55, 33);
            this.AjoutButton.TabIndex = 2;
            this.AjoutButton.Text = "Ajouter";
            this.AjoutButton.UseVisualStyleBackColor = true;
            // 
            // supprButton
            // 
            this.supprButton.Location = new System.Drawing.Point(135, 298);
            this.supprButton.Name = "supprButton";
            this.supprButton.Size = new System.Drawing.Size(88, 29);
            this.supprButton.TabIndex = 3;
            this.supprButton.Text = "Supprimer";
            this.supprButton.UseVisualStyleBackColor = true;
            // 
            // modifButton
            // 
            this.modifButton.Location = new System.Drawing.Point(259, 294);
            this.modifButton.Name = "modifButton";
            this.modifButton.Size = new System.Drawing.Size(62, 32);
            this.modifButton.TabIndex = 4;
            this.modifButton.Text = "Modifier";
            this.modifButton.UseVisualStyleBackColor = true;
            // 
            // PagePatient
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(800, 450);
            this.Controls.Add(this.modifButton);
            this.Controls.Add(this.supprButton);
            this.Controls.Add(this.AjoutButton);
            this.Controls.Add(this.PatientListBox);
            this.Controls.Add(this.menuButton);
            this.Name = "PagePatient";
            this.Text = "PagePatient";
            this.ResumeLayout(false);
        }

        private System.Windows.Forms.ListBox PatientListBox;
        private System.Windows.Forms.Button AjoutButton;
        private System.Windows.Forms.Button supprButton;
        private System.Windows.Forms.Button modifButton;

        private System.Windows.Forms.Button menuButton;

        #endregion
    }
}