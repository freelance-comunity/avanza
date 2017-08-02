<?php

try {
	$x=1;
	$y=0;
	$div=$x/$y;
	
} catch (Exception $e) {
	 echo 'Error: ',  $e->getMessage(), "\n";
}
echo "hola";
?>

