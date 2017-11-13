<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<div id="sample">
    <script type="text/javascript" src="js/NicEdit.js"></script> 
    <script type="text/javascript">
	bkLib.onDomLoaded(function() {
		new nicEditor({buttonList : ['bold','italic','underline','left','center','right','ol','ul','fontSize','fontFamily','fontFormat','superscript','subscript','indent','outdent','link','unlink','striketrhough','forecolor','upload','bgcolor','xhtml']}).panelInstance('DDDD');
	});
	</script>

  <form action="editor2.php" method="post">
    <textarea name="area3" id="DDDD"  style="width: 100%; height: 100px;">
       HTML content default in textarea
</textarea>

  <button type="submit" name="enviar" title="Enviar">Enviar</button>
  </form>
 
</div>
</body>
</html>
