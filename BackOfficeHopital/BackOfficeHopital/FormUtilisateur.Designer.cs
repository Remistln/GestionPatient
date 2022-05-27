using System.ComponentModel;

namespace BackOfficeHopital
{
    partial class FormUtilisateur
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
            this.titreLabel = new System.Windows.Forms.Label();
            this.nomLabel = new System.Windows.Forms.Label();
            this.prenomLabel = new System.Windows.Forms.Label();
            this.identifiantLabel = new System.Windows.Forms.Label();
            this.mdpLabel = new System.Windows.Forms.Label();
            this.validerButton = new System.Windows.Forms.Button();
            this.nomTextBox = new System.Windows.Forms.TextBox();
            this.prenomTextBox = new System.Windows.Forms.TextBox();
            this.identifiantTextBox = new System.Windows.Forms.TextBox();
            this.mdpTextBox = new System.Windows.Forms.TextBox();
            this.retourButton = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // titreLabel
            // 
            this.titreLabel.Location = new System.Drawing.Point(211, 37);
            this.titreLabel.Name = "titreLabel";
            this.titreLabel.Size = new System.Drawing.Size(102, 31);
            this.titreLabel.TabIndex = 0;
            this.titreLabel.Text = "Utilisateur";
            // 
            // nomLabel
            // 
            this.nomLabel.Location = new System.Drawing.Point(170, 99);
            this.nomLabel.Name = "nomLabel";
            this.nomLabel.Size = new System.Drawing.Size(66, 34);
            this.nomLabel.TabIndex = 1;
            this.nomLabel.Text = "Nom :";
            // 
            // prenomLabel
            // 
            this.prenomLabel.Location = new System.Drawing.Point(159, 150);
            this.prenomLabel.Name = "prenomLabel";
            this.prenomLabel.Size = new System.Drawing.Size(76, 22);
            this.prenomLabel.TabIndex = 2;
            this.prenomLabel.Text = "Prenom :";
            // 
            // identifiantLabel
            // 
            this.identifiantLabel.Location = new System.Drawing.Point(151, 188);
            this.identifiantLabel.Name = "identifiantLabel";
            this.identifiantLabel.Size = new System.Drawing.Size(84, 26);
            this.identifiantLabel.TabIndex = 3;
            this.identifiantLabel.Text = "Identifiant :";
            // 
            // mdpLabel
            // 
            this.mdpLabel.Location = new System.Drawing.Point(153, 230);
            this.mdpLabel.Name = "mdpLabel";
            this.mdpLabel.Size = new System.Drawing.Size(81, 37);
            this.mdpLabel.TabIndex = 4;
            this.mdpLabel.Text = "Mot de passe :";
            // 
            // validerButton
            // 
            this.validerButton.Location = new System.Drawing.Point(224, 291);
            this.validerButton.Name = "validerButton";
            this.validerButton.Size = new System.Drawing.Size(98, 31);
            this.validerButton.TabIndex = 5;
            this.validerButton.Text = "Valider";
            this.validerButton.UseVisualStyleBackColor = true;
            this.validerButton.Click += new System.EventHandler(this.validerButton_Click);
            // 
            // nomTextBox
            // 
            this.nomTextBox.Location = new System.Drawing.Point(232, 97);
            this.nomTextBox.Name = "nomTextBox";
            this.nomTextBox.Size = new System.Drawing.Size(80, 20);
            this.nomTextBox.TabIndex = 6;
            this.nomTextBox.TextChanged += new System.EventHandler(this.nomTextBox_TextChanged);
            // 
            // prenomTextBox
            // 
            this.prenomTextBox.Location = new System.Drawing.Point(232, 142);
            this.prenomTextBox.Name = "prenomTextBox";
            this.prenomTextBox.Size = new System.Drawing.Size(79, 20);
            this.prenomTextBox.TabIndex = 7;
            this.prenomTextBox.TextChanged += new System.EventHandler(this.prenomTextBox_TextChanged);
            // 
            // identifiantTextBox
            // 
            this.identifiantTextBox.Location = new System.Drawing.Point(226, 178);
            this.identifiantTextBox.Name = "identifiantTextBox";
            this.identifiantTextBox.Size = new System.Drawing.Size(84, 20);
            this.identifiantTextBox.TabIndex = 8;
            this.identifiantTextBox.TextChanged += new System.EventHandler(this.identifiantTextBox_TextChanged);
            // 
            // mdpTextBox
            // 
            this.mdpTextBox.Location = new System.Drawing.Point(226, 228);
            this.mdpTextBox.Name = "mdpTextBox";
            this.mdpTextBox.Size = new System.Drawing.Size(95, 20);
            this.mdpTextBox.TabIndex = 9;
            this.mdpTextBox.TextChanged += new System.EventHandler(this.mdpTextBox_TextChanged);
            // 
            // retourButton
            // 
            this.retourButton.Location = new System.Drawing.Point(20, 12);
            this.retourButton.Name = "retourButton";
            this.retourButton.Size = new System.Drawing.Size(63, 31);
            this.retourButton.TabIndex = 10;
            this.retourButton.Text = "Retour";
            this.retourButton.UseVisualStyleBackColor = true;
            this.retourButton.Click += new System.EventHandler(this.retourButton_Click);
            // 
            // FormUtilisateur
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(800, 450);
            this.Controls.Add(this.retourButton);
            this.Controls.Add(this.mdpTextBox);
            this.Controls.Add(this.identifiantTextBox);
            this.Controls.Add(this.prenomTextBox);
            this.Controls.Add(this.nomTextBox);
            this.Controls.Add(this.validerButton);
            this.Controls.Add(this.mdpLabel);
            this.Controls.Add(this.identifiantLabel);
            this.Controls.Add(this.prenomLabel);
            this.Controls.Add(this.nomLabel);
            this.Controls.Add(this.titreLabel);
            this.Name = "FormUtilisateur";
            this.Text = "FormUtilisateur";
            this.ResumeLayout(false);
            this.PerformLayout();
        }

        private System.Windows.Forms.Button retourButton;

        private System.Windows.Forms.Label titreLabel;
        private System.Windows.Forms.Label nomLabel;
        private System.Windows.Forms.Label prenomLabel;
        private System.Windows.Forms.Label identifiantLabel;
        private System.Windows.Forms.Label mdpLabel;
        private System.Windows.Forms.Button validerButton;
        private System.Windows.Forms.TextBox nomTextBox;
        private System.Windows.Forms.TextBox prenomTextBox;
        private System.Windows.Forms.TextBox identifiantTextBox;
        private System.Windows.Forms.TextBox mdpTextBox;

        #endregion
    }
}