﻿using System.ComponentModel;

namespace BackOfficeHopital
{
    partial class PageLogin
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
            this.mailLabel = new System.Windows.Forms.Label();
            this.mdpLabel = new System.Windows.Forms.Label();
            this.mailInput = new System.Windows.Forms.TextBox();
            this.mdpInput = new System.Windows.Forms.TextBox();
            this.valitationButton = new System.Windows.Forms.Button();
            this.consoleLabel = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // titreLabel
            // 
            this.titreLabel.Location = new System.Drawing.Point(198, 109);
            this.titreLabel.Name = "titreLabel";
            this.titreLabel.Size = new System.Drawing.Size(41, 20);
            this.titreLabel.TabIndex = 0;
            this.titreLabel.Text = "Login";
            // 
            // mailLabel
            // 
            this.mailLabel.Location = new System.Drawing.Point(130, 162);
            this.mailLabel.Name = "mailLabel";
            this.mailLabel.Size = new System.Drawing.Size(100, 23);
            this.mailLabel.TabIndex = 1;
            this.mailLabel.Text = "Mail";
            // 
            // mdpLabel
            // 
            this.mdpLabel.Location = new System.Drawing.Point(123, 209);
            this.mdpLabel.Name = "mdpLabel";
            this.mdpLabel.Size = new System.Drawing.Size(79, 19);
            this.mdpLabel.TabIndex = 2;
            this.mdpLabel.Text = "Mot de Passe";
            // 
            // mailInput
            // 
            this.mailInput.Location = new System.Drawing.Point(252, 162);
            this.mailInput.Name = "mailInput";
            this.mailInput.Size = new System.Drawing.Size(75, 20);
            this.mailInput.TabIndex = 3;
            this.mailInput.TextChanged += new System.EventHandler(this.mailInput_TextChanged);
            // 
            // mdpInput
            // 
            this.mdpInput.Location = new System.Drawing.Point(252, 209);
            this.mdpInput.Name = "mdpInput";
            this.mdpInput.Size = new System.Drawing.Size(75, 20);
            this.mdpInput.TabIndex = 4;
            this.mdpInput.TextChanged += new System.EventHandler(this.mdpInput_TextChanged);
            // 
            // valitationButton
            // 
            this.valitationButton.Location = new System.Drawing.Point(252, 235);
            this.valitationButton.Name = "valitationButton";
            this.valitationButton.Size = new System.Drawing.Size(67, 27);
            this.valitationButton.TabIndex = 5;
            this.valitationButton.Text = "Valider";
            this.valitationButton.UseVisualStyleBackColor = true;
            this.valitationButton.Click += new System.EventHandler(this.valitationButton_Click);
            // 
            // consoleLabel
            // 
            this.consoleLabel.Location = new System.Drawing.Point(381, 152);
            this.consoleLabel.Name = "consoleLabel";
            this.consoleLabel.Size = new System.Drawing.Size(240, 109);
            this.consoleLabel.TabIndex = 6;
            this.consoleLabel.Text = "label1";
            // 
            // PageLogin
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(800, 450);
            this.Controls.Add(this.consoleLabel);
            this.Controls.Add(this.valitationButton);
            this.Controls.Add(this.mdpInput);
            this.Controls.Add(this.mailInput);
            this.Controls.Add(this.mdpLabel);
            this.Controls.Add(this.mailLabel);
            this.Controls.Add(this.titreLabel);
            this.Name = "PageLogin";
            this.Text = "PageLogin";
            this.ResumeLayout(false);
            this.PerformLayout();
        }

        private System.Windows.Forms.Label consoleLabel;

        private System.Windows.Forms.Button valitationButton;

        private System.Windows.Forms.Label mdpLabel;
        private System.Windows.Forms.TextBox mailInput;
        private System.Windows.Forms.TextBox mdpInput;

        private System.Windows.Forms.Label mailLabel;
        private System.Windows.Forms.Label titreLabel;
        
        #endregion
    }
}