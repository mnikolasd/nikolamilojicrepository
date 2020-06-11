using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(ProjekatBibliotekaPPP.Startup))]
namespace ProjekatBibliotekaPPP
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
        }
    }
}
