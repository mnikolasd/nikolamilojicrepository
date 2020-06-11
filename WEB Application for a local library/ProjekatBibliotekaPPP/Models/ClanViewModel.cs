using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace ProjekatBibliotekaPPP.Models
{
    public class ClanViewModel
    {
        public int ClanID { get; set; }

        [Display(Name = "Ime i Prezime")]
        public string Ime { get; set; }

        public string Adresa { get; set; }

        public string Kontakt { get; set; }

        [Display(Name = "Datum isteka clanstva")]
        public DateTime ClanstvoDo { get; set; }

        public bool isValid { get; set; }
    }
}