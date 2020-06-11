using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace ProjekatBibliotekaPPP.Models
{
    public class Knjiga
    {
        public int KnjigaId { get; set; }

        [Required(ErrorMessage = "Morate uneti naziv knjige")]
        public string Naziv { get; set; }

        [Required(ErrorMessage = "Morate uneti serijski broj")]
        [Display(Name = "Serijski broj")]
        public string SerijskiBroj { get; set; }

        public string Autor { get; set; }

        public string Izdavac { get; set; }
        public ICollection<Izdavanje> Izdavanja { get; set; }
    }
}