using System.ComponentModel;

namespace BackOfficeHopital
{
    partial class PageMenu
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
            this.litButton = new System.Windows.Forms.Button();
            this.patientButton = new System.Windows.Forms.Button();
            this.rdvButton = new System.Windows.Forms.Button();
            this.serviceButton = new System.Windows.Forms.Button();
            this.utilisateurButton = new System.Windows.Forms.Button();
            this.vaccinButton = new System.Windows.Forms.Button();
            this.decoButton = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // litButton
            // 
            this.litButton.Location = new System.Drawing.Point(90, 60);
            this.litButton.Name = "litButton";
            this.litButton.Size = new System.Drawing.Size(64, 33);
            this.litButton.TabIndex = 0;
            this.litButton.Text = "Lits";
            this.litButton.UseVisualStyleBackColor = true;
            // 
            // patientButton
            // 
            this.patientButton.Location = new System.Drawing.Point(126, 145);
            this.patientButton.Name = "patientButton";
            this.patientButton.Size = new System.Drawing.Size(56, 37);
            this.patientButton.TabIndex = 1;
            this.patientButton.Text = "Patients";
            this.patientButton.UseVisualStyleBackColor = true;
            // 
            // rdvButton
            // 
            this.rdvButton.Location = new System.Drawing.Point(126, 220);
            this.rdvButton.Name = "rdvButton";
            this.rdvButton.Size = new System.Drawing.Size(92, 31);
            this.rdvButton.TabIndex = 2;
            this.rdvButton.Text = "Rendez-vous";
            this.rdvButton.UseVisualStyleBackColor = true;
            // 
            // serviceButton
            // 
            this.serviceButton.Location = new System.Drawing.Point(149, 304);
            this.serviceButton.Name = "serviceButton";
            this.serviceButton.Size = new System.Drawing.Size(59, 34);
            this.serviceButton.TabIndex = 3;
            this.serviceButton.Text = "Services";
            this.serviceButton.UseVisualStyleBackColor = true;
            // 
            // utilisateurButton
            // 
            this.utilisateurButton.Location = new System.Drawing.Point(298, 72);
            this.utilisateurButton.Name = "utilisateurButton";
            this.utilisateurButton.Size = new System.Drawing.Size(79, 37);
            this.utilisateurButton.TabIndex = 4;
            this.utilisateurButton.Text = "Utilisateurs";
            this.utilisateurButton.UseVisualStyleBackColor = true;
            // 
            // vaccinButton
            // 
            this.vaccinButton.Location = new System.Drawing.Point(305, 145);
            this.vaccinButton.Name = "vaccinButton";
            this.vaccinButton.Size = new System.Drawing.Size(72, 37);
            this.vaccinButton.TabIndex = 5;
            this.vaccinButton.Text = "Vaccins";
            this.vaccinButton.UseVisualStyleBackColor = true;
            // 
            // decoButton
            // 
            this.decoButton.Location = new System.Drawing.Point(457, 66);
            this.decoButton.Name = "decoButton";
            this.decoButton.Size = new System.Drawing.Size(116, 43);
            this.decoButton.TabIndex = 6;
            this.decoButton.Text = "Déconnexion";
            this.decoButton.UseVisualStyleBackColor = true;
            // 
            // PageMenu
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(800, 450);
            this.Controls.Add(this.decoButton);
            this.Controls.Add(this.vaccinButton);
            this.Controls.Add(this.utilisateurButton);
            this.Controls.Add(this.serviceButton);
            this.Controls.Add(this.rdvButton);
            this.Controls.Add(this.patientButton);
            this.Controls.Add(this.litButton);
            this.Name = "PageMenu";
            this.Text = "PageMenu";
            this.ResumeLayout(false);
        }

        private System.Windows.Forms.Button litButton;
        private System.Windows.Forms.Button patientButton;
        private System.Windows.Forms.Button rdvButton;
        private System.Windows.Forms.Button serviceButton;
        private System.Windows.Forms.Button utilisateurButton;
        private System.Windows.Forms.Button vaccinButton;
        private System.Windows.Forms.Button decoButton;

        #endregion
    }
}