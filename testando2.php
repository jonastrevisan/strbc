<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>
<CENTER><FORM NAME=form2>
<INPUT TYPE=TEXT NAME=banner SIZE=40>
</FORM></CENTER>


<SCRIPT LANGUAGE="JavaScript">
<!-- 
var MESSAGE = "          Banner 1 - Exemplo de JavaScript!"
var SPEED   = 10;
var id,pause=0,position=0;

banner();


function banner() {
var i,k,msg=MESSAGE; 
k=(66/msg.length)+1;
for(i=0;i<=k;i++) msg+=" "+msg;
document.form2.banner.value=msg.substring(position,position+50);
if(position++==msg.length) position=0;
id=setTimeout("banner()",5000/SPEED); }
function action() {
if(!pause) {
clearTimeout(id);
pause=1; }
else {
banner();
pause=0; } 
}
//  -->
</SCRIPT>

</body>
</html>
