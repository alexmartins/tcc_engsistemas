<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Webclient</title>
<script type="text/javascript">
  function focar() {
    document.getElementById("cep").focus();
  }
</script>
</head>
<body onload="focar()">
  <h1>Previsão do tempo pelo CEP</h1>
  <form action="webclient.php" method="post">
    CEP <input id="cep" name="cep" type="text" size="8"><br>
    Tipo de Web Service
    <select id="protocolo" name="protocolo">
      <option value="soap">SOAP</option>
      <option value="rest">REST</option>
    </select><br> <input type="submit" value="obter previsão">
  </form>
</body>
</html>