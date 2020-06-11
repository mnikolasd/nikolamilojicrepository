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
    public class KnjigasController : Controller
    {
        private ApplicationDbContext db = new ApplicationDbContext();

        // GET: Knjigas
        public ViewResult Index(string sortOrder,string currentFilter, string searchString, int? page)
        {
            ViewBag.CurrentSort = sortOrder;
            ViewBag.NameSortParm = String.IsNullOrEmpty(sortOrder) ? "naziv_desc" : "";
            if(searchString != null)
            {
                page = 1;
            }
            else
            {
                searchString = currentFilter;
            }

            ViewBag.CurrentFilter = searchString;

            var knjiga = db.Knjigas.Include(h => h.Izdavanja)
                .Select(b => new KnjigaViewModel
                {
                    KnjigaID = b.KnjigaId,
                    Autor = b.Autor,
                    Izdavac = b.Izdavac,
                    SerijskiBroj = b.SerijskiBroj,
                    Naziv = b.Naziv,
                    IsAvailable = !b.Izdavanja.Any(h => h.DatumVracanja == null)
                });

            if (!String.IsNullOrEmpty(searchString))
            {
                knjiga = knjiga.Where(s => s.Naziv.Contains(searchString));
            }

            switch (sortOrder)
            {
                case "naziv_desc":
                    knjiga = knjiga.OrderByDescending(s => s.Naziv);
                    break;

                default:
                    knjiga = knjiga.OrderBy(s => s.Naziv);
                    break;
            }
            

            int pageSize = 3;
            int pageNumber = (page ?? 1);

            return View(knjiga.ToPagedList(pageNumber, pageSize));
        }

        // GET: Knjigas/Create
        public ActionResult Create()
        {
            return View();
        }

        // POST: Knjigas/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "KnjigaId,Naziv,SerijskiBroj,Autor,Izdavac")] Knjiga knjiga)
        {
            if (ModelState.IsValid)
            {
                db.Knjigas.Add(knjiga);
                db.SaveChanges();
                TempData["Success"] = "Knjiga je uspesno unesena u bazu podataka";
                return RedirectToAction("Index");
            }
            else
            {
                ViewData["Error"] = "Neuspesan unos";
                return View(knjiga);
            }
        }

        // GET: Knjigas/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Knjiga knjiga = db.Knjigas.Find(id);
            if (knjiga == null)
            {
                return HttpNotFound();
            }
            return View(knjiga);
        }

        // POST: Knjigas/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "KnjigaId,Naziv,SerijskiBroj,Autor,Izdavac")] Knjiga knjiga)
        {
            if (ModelState.IsValid)
            {
                db.Entry(knjiga).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(knjiga);
        }

        // GET: Knjigas/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Knjiga knjiga = db.Knjigas.Find(id);
            if (knjiga == null)
            {
                return HttpNotFound();
            }
            return View(knjiga);
        }

        // POST: Knjigas/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            Knjiga knjiga = db.Knjigas.Find(id);
            db.Knjigas.Remove(knjiga);
            db.SaveChanges();
            TempData["deleted"] = "Knjiga je uspesno obrisana iz baze podataka";
            return RedirectToAction("Index");
        }

        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Knjiga knjiga = db.Knjigas.Find(id);
            if (knjiga == null)
            {
                return HttpNotFound();
            }
            return View(knjiga);
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
