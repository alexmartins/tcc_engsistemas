using RestSharp;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace TCC
{
    public partial class Webclient : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            string cep = Request.Form["cep"].ToString();
            string protocolo = Request.Form["protocolo"].ToString();
            string clima = "";

            if (protocolo == "soap")
            {
                var service = new TCC.Clima.ClimaPortClient();
                clima = service.previsao(Convert.ToInt32(cep));
            }

            if (protocolo == "rest")
            {
                var client = new RestClient("http://localhost/webserver/index.php?rest");

                var request = new RestRequest("", Method.POST);
                request.AddParameter("method", "previsao");
                request.AddParameter("cep", cep);

                IRestResponse response = client.Execute(request);
                clima = new System.Web.Script.Serialization.JavaScriptSerializer().DeserializeObject(response.Content).ToString();
            }

            lblCep.Text = cep;
            lblTempo.Text = clima;
        }
    }
}