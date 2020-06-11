using ProjekatBibliotekaPPP.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace ProjekatBibliotekaPPP.Controllers
{
    public class LoginController : Controller
    {
        // GET: Login
        public ActionResult Index()
        {
            return View();
        }

        [HttpPost]
        public ActionResult Authorize(ProjekatBibliotekaPPP.Models.Login loginModel)
        {
            using (Entities db = new Entities())
            {
                var userDetails = db.Logins.Where(x => x.UserName == loginModel.UserName && x.Password == loginModel.Password).FirstOrDefault();
                if(userDetails == null)
                {
                    loginModel.LoginErrorMessage = "Pogresno korisnicko ime ili password.";
                    return View("Index", loginModel);
                }
                else
                {
                    Session["userId"] = userDetails.UserId;
                    Session["userName"] = userDetails.UserName;
                    return RedirectToAction("Index", "Clans");
                }
            }
        }

        public ActionResult LogOut()
        {
            int userId = (int)Session["userId"];
            Session.Abandon();
            return RedirectToAction("Index", "Login");
        }
    }
}