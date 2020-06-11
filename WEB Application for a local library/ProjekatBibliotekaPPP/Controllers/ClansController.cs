using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Threading.Tasks;
using System.Web;
using System.Web.Mvc;
using ProjekatBibliotekaPPP.Models;
using PagedList;

namespace ProjekatBibliotekaPPP.Controllers
{
    public class ClansController : Controller
    {
        private ApplicationDbContext db = new ApplicationDbContext();

        // GET: Clans
        public ViewResult Index(string sortOrder, string currentFilter, string searchString, int? page)
        {
            ViewBag.NameSortParm = String.IsNullOrEmpty(searchString) ? "ime_desc" : "";
            ViewBag.CurrentSort = sortOrder;
            if (searchString != null)
            {
                page = 1;
            }
            else
            {
                searchString = currentFilter;
            }

            ViewBag.CurrentFilter = searchString;

            var clan = db.Clans.Select(c => new ClanViewModel
            {
                ClanID = c.ClanID,
                Ime = c.Ime,
                Adresa = c.Adresa,
                Kontakt = c.Kontakt,
                ClanstvoDo = c.ClanstvoDo,
                isValid = c.ClanstvoDo > DateTime.Now
            });

            switch (searchString)
            {
                case "naziv_desc":
                    clan = clan.OrderByDescending(c => c.Ime);
                    break;

                default:
                    clan = clan.OrderBy(c => c.Ime);
                    break;
            }

            if (!String.IsNullOrEmpty(searchString))
            {
                clan = clan.Where(c => c.Ime.Contains(searchString));
            }

            int pageSize = 3;
            int pageNumber = (page ?? 1);

            return View(clan.ToPagedList(pageNumber, pageSize));

        }

        // GET: Clans/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Clan clan = db.Clans.Find(id);
            if (clan == null)
            {
                return HttpNotFound();
            }
            return View(clan);
        }

        // GET: Clans/Create
        public ActionResult Create()
        {
            return View();
        }

        // POST: Clans/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "ClanID,JMBG,Ime,Adresa,Kontakt,ClanstvoDo")] Clan clan)
        {
            
            if (ModelState.IsValid)
            {
                db.Clans.Add(clan);
                db.SaveChanges();
                TempData["Success"] = "Clan je uspesno unesen u bazu podataka";
                return RedirectToAction("Index");
            }
            else
            {
                ViewData["Error"] = "Neuspesan unos";
                return View(clan);
            }
        }

        // GET: Clans/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Clan clan = db.Clans.Find(id);
            if (clan == null)
            {
                return HttpNotFound();
            }
            return View(clan);
        }

        // POST: Clans/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "ClanID,JMBG,Ime,Adresa,Kontakt,ClanstvoDo")] Clan clan)
        {
            if (ModelState.IsValid)
            {
                db.Entry(clan).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(clan);
        }

        // GET: Clans/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Clan clan = db.Clans.Find(id);
            if (clan == null)
            {
                return HttpNotFound();
            }
            return View(clan);
        }

        // POST: Clans/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            Clan clan = db.Clans.Find(id);
            db.Clans.Remove(clan);
            db.SaveChanges();
            TempData["deleted"] = "Clan je uspesno obrisan iz baze podataka";
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
