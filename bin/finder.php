<?php
include('db.class.php');


if($_POST)
{
$q=$_POST['query'];
$db=new DB();
$db->connectDB();
$db->executeQuery($q);

echo $q;

while($row=$db->fetchArray())
{

$nombre=$row['nombre'];
$ape=$row['apellido'];
$img=$row['imagenPerfil'];
$ciudad=$row['ciudad'];
$amigos=$row['amigosComun'];

$nombreResaltado='<b>'.$q.'</b>';
$apeResaltado='<b>'.$q.'</b>';

$nombreFinal = str_ireplace($q, $nombreResaltado, $nombre);

$apeFinal = str_ireplace($q, $apeResaltado, $ape);


?>
<div class="display_box" align="left">
<img src="images/<?php echo $img; ?>" style="width:50px; float:left; margin-right:6px" /><?php echo $nombreFinal ; ?>&nbsp;<?php echo $apeFinal ; ?><br/>
<span style="font-size:11px; color:#999999"><?php echo $ciudad; ?></span><br/>
<span style="font-size:9px; color:#9999ff"><?php echo "Amigos en com&uacute;n:".$amigos; ?></span>
</div>

<?php
}
}
?>
