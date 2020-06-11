using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace ProjekatBibliotekaPPP.Models
{
    public class Clan
    {
        public int ClanID { get; set; }
        [Required(ErrorMessage ="Morate uneti ime i prezime")]
        [Display(Name = "Ime i Prezime")]
        public string Ime { get; set; }
        [Required(ErrorMessage = "Morate uneti adresu")]
        public string Adresa { get; set; }
        [Required(ErrorMessage = "Morate uneti kontakt")]
        public string Kontakt { get; set; }
        [Required(ErrorMessage = "Morate uneti datum isteka clanstva")]
        [Display(Name = "Datum isteka clanstva")]
        public DateTime ClanstvoDo { get; set; }
    }
}