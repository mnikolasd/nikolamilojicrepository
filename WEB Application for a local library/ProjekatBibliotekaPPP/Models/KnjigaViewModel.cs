using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace ProjekatBibliotekaPPP.Models
{
    public class KnjigaViewModel
    {
        public int KnjigaID { get; set; }

        public string Naziv { get; set; }

        [Display(Name = "Serijski Broj")]
        public string SerijskiBroj { get; set; }

        public string Autor { get; set; }

        public string Izdavac { get; set; }

        public bool IsAvailable { get; set; }
    }
}