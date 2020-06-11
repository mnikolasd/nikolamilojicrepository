using System;
using System.ComponentModel.DataAnnotations;

namespace ProjekatBibliotekaPPP.Models
{
    public class Izdavanje
    {
        public int IzdavanjeId { get; set; }

        [Required]
        [Display(Name = "Knjiga")]
        public int KnjigaId { get; set; }

        public Knjiga Knjiga { get; set; }

        [Required]
        [Display(Name = "Clan")]
        public int ClanID { get; set; }

        public Clan Clan { get; set; }

        [Display(Name = "Datum izdavanja")]
        public DateTime DatumIzdavanja { get; set; }

        [Display(Name = "Datum vracanja")]
        public DateTime? DatumVracanja { get; set; }
    }
}