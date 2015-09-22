<?php

  
function Conectarse2()

{
if(!($link=mysql_connect("192.168.1.28","root","sistemas")))
{

echo"Presione F5 para Actualizar :P";

	exit();
}
  if (!mysql_select_db("control_de_servicios",$link)) 
  {

  	echo"Error seleccionando la base de datos";

  	exit();
}

return $link;

}


  ?>