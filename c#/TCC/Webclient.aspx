<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="Webclient.aspx.cs" Inherits="TCC.Webclient" %>
<!DOCTYPE html>
<html>
<head runat="server">
<meta charset="UTF-8">
<title>>Clima pelo CEP</title>
</head>
<body>
    <form id="form1" runat="server">
        O clima no CEP <asp:Label ID="lblCep" runat="server"></asp:Label> será <asp:Label ID="lblTempo" runat="server"></asp:Label>.
        <a href="Default.aspx">Retornar</a>
    </form>
</body>
</html>