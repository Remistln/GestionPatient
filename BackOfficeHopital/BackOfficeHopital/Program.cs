using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace BackOfficeHopital
{
    static class Program
    {
        /// <summary>
        /// The main entry point for the application.
        /// </summary>
        [STAThread]
        static void Main()
        {
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);

            PageMenu menu = new PageMenu();
            Form[] listePage = new Form[8];

            listePage[0] = new PageLogin(menu);
            listePage[1] = new PageUtilisateur(menu);
            listePage[2] = new PagePatient(menu);
            listePage[3] = new PageLit(menu);
            listePage[4] = new PageService(menu);
            listePage[5] = new PageRdv(menu);
            listePage[6] = new PageVaccin(menu);

            menu.listePage = listePage;
            
            Application.Run(listePage[0]);
        }
    }
}