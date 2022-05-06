using System.ComponentModel;

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
            // 
            // mdpInput
            // 
            this.mdpInput.Location = new System.Drawing.Point(252, 209);
            this.mdpInput.Name = "mdpInput";
            this.mdpInput.Size = new System.Drawing.Size(75, 20);
            this.mdpInput.TabIndex = 4;
            // 
            // PageLogin
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(800, 450);
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

        private System.Windows.Forms.Label mdpLabel;
        private System.Windows.Forms.TextBox mailInput;
        private System.Windows.Forms.TextBox mdpInput;

        private System.Windows.Forms.Label mailLabel;
        private System.Windows.Forms.Label titreLabel;
        
        #endregion
    }
}