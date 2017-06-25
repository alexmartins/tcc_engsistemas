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
            int cep = Convert.ToInt32(Request.Form["cep"]);
            string protocolo = Request.Form["protocolo"].ToString();

            if (protocolo == "soap")
            {
                var service = new TCC.Clima.ClimaPortClient();
                lblTempo.Text = service.previsao(cep);
            }

            if (protocolo == "rest")
            {
                var client = new RestClient("http://localhost/webserver/index.php?rest");

                var request = new RestRequest("", Method.POST);
                request.AddParameter("method", "previsao");
                request.AddParameter("cep", cep);

                IRestResponse response = client.Execute(request);
                lblTempo.Text = new System.Web.Script.Serialization.JavaScriptSerializer().DeserializeObject(response.Content).ToString();
            }
        }
    }
}