<?php
$diretorio = "update";


if (!is_dir($diretorio)){ echo "Pasta $diretorio nao existe";} 


else { echo "A Pasta Existe<br>";


			$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;

				for ($k = 0; $k < count($arquivo['name']); $k++)
					{
					   $destino = $diretorio."/".$arquivo['name'][$k];

					    if (move_uploaded_file($arquivo['tmp_name'][$k], $destino)) {echo "MOVEUUUUUU<br>"; }

					    else {echo "NAOOOO MOVEU";}
					}		



} // fecha else