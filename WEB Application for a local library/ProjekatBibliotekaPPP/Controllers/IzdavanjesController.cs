using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using ProjekatBibliotekaPPP.Models;

namespace ProjekatBibliotekaPPP.Controllers
{
    public class IzdavanjesController : Controller
    {
        private ApplicationDbContext db = new ApplicationDbContext();

        // GET: Izdavanjes
        public ActionResult Index()
        {
            var izdavanja = db.Izdavanjes.Include(i => i.Clan).Include(i => i.Knjiga);
            return View(izdavanja.ToList());
        }

        // GET: Izdavanjes/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Izdavanje izdavanje = db.Izdavanjes.Find(id);
            if (izdavanje == null)
            {
                return HttpNotFound();
            }
            return View(izdavanje);
        }

        // GET: Izdavanjes/Create
        public ActionResult Create(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }

            var knjiga = db.Knjigas.Find(id);
            if (knjiga == null)
            {
                return HttpNotFound();
            }

            var izdavanje = new Izdavanje { KnjigaId = knjiga.KnjigaId, DatumIzdavanja = DateTime.Now, Knjiga = knjiga };
            
            ViewBag.ClanID = new SelectList(db.Clans.Where(c => c.ClanstvoDo > DateTime.Now), "ClanID", "Ime");
            return View(izdavanje);
        }

        // POST: Izdavanjes/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "IzdavanjeId,KnjigaId,ClanID,DatumIzdavanja,DatumVracanja")] Izdavanje izdavanje)
        {
            if (ModelState.IsValid)
            {
                db.Izdavanjes.Add(izdavanje);
                db.SaveChanges();
                TempData["uspeh"] = "Knjiga je uspesno izdata clanu";
                return RedirectToAction("Index", "Izdavanjes");
            }

            ViewBag.ClanID = new SelectList(db.Clans, "ClanID", "Ime", izdavanje.ClanID);
            izdavanje.Knjiga = db.Knjigas.Find(izdavanje.KnjigaId);
            return View(izdavanje);
        }

        // GET: Izdavanjes/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Izdavanje izdavanje = db.Izdavanjes
                .Include(b => b.Knjiga)
                .Include(c => c.Clan)
                .Where(b => b.KnjigaId == id && b.DatumVracanja == null)
                .FirstOrDefault();
            if (izdavanje == null)
            {
                return HttpNotFound();
            }

            return View(izdavanje);
        }

        // POST: Izdavanjes/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "IzdavanjeId,KnjigaId,ClanID,DatumIzdavanja,DatumVracanja")] Izdavanje izdavanje)
        {
            if (ModelState.IsValid)
            {
                var izdavanjeItem = db.Izdavanjes.Include(i => i.Knjiga)
                    .FirstOrDefault(i => i.IzdavanjeId == izdavanje.IzdavanjeId);
                if (izdavanjeItem == null)
                {
                    return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
                }

                izdavanjeItem.DatumVracanja = DateTime.Now;
                db.SaveChanges();
                TempData["uspeh1"] = "Knjiga je uspesno vracena";
                return RedirectToAction("Index", "Izdavanjes");
            }
            return View(izdavanje);
        }

        // GET: Izdavanjes/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Izdavanje izdavanje = db.Izdavanjes.Find(id);
            if (izdavanje == null)
            {
                return HttpNotFound();
            }
            return View(izdavanje);
        }

        // POST: Izdavanjes/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            Izdavanje izdavanje = db.Izdavanjes.Find(id);
            db.Izdavanjes.Remove(izdavanje);
            db.SaveChanges();
            TempData["deleted"] = "Izdavanje je uspesno obrisano iz baze podataka";
            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }
    }
}
