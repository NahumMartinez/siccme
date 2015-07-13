<html>
<head>
<style>
.drop-shadow {   margin:2em 40% 4em; }
*{margin:0px}
#searchbox
{
width:250px;
border:solid 1px #000;
padding:3px;
}
#display
{
width:250px;
display:none;
border-left:solid 1px #dedede;
border-right:solid 1px #dedede;
border-bottom:solid 1px #dedede;
overflow:hidden;
}
.display_box
{
padding:4px; 
border-top:solid 1px #dedede; 
font-size:12px; 
height:50px;
}
.display_box:hover
{
background:#3b5998;
color:#FFFFFF;
}

</style>
<link rel="stylesheet" href="../live_examples.css" type="text/css"></link>

<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
<script>
$(document).ready(function(){
$(".search").keyup(function() 
{
var box = $(this).val();
var dataString = 'query='+ box;
if(box!='')
{
$.ajax({
type: "POST",
url: "finder.php",
data: dataString,
cache: false,
success: function(contenido)
{
	var dos = $("#searchbox").val();
	if(dos == '')
	{
	$("#display").html(contenido).hide();
	}
	else
	{$("#display").html(contenido).show();}

}
});
}return false; 
});
});
</script>
<title>Suggest con Ajax, PHP y jQuery</title>
</head>
<body>
<div class="logo"><img src="http://www.elclubdelprogramador.com/wp-content/uploads/2011/08/logo_Ext1.png" /></div>
<div class="drop-shadow curved curved-hz-1">
<h3>Prueba buscando "Ga"</h3>
<input type="text" class="search" id="searchbox" />
<div id="display">
</div>
</div>
</body>
</html>