<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<script type="text/javascript">
var img = ["1.jpeg","2.jpg","3.jpg"];
var i = 0;

function changeImg() {
	document.getElementById("myimg").setAttribute("src", "img/" + img[i]);
	if(i>=2) i = 0;
	else i++;
}

</script>
<style>
a{
	color:black;
}
</style>
</head>

<body>
<p>
Το κατάστημα μας αναφέρεται κυρίως σε βιβλία και ήδη γραφείου
</p>
<img src="img/3.jpg" style="width:500px;height:300px;margin-left:1%" id="myimg"/>
<input type="button" id="myb" value="Roll Img" onclick="changeImg()"/><br>
<object data="pdf.pdf" type="application/pdf" width="50%" height="100%"></object>


</body>

</html>
