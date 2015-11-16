<?php 
$view = "";
$base_path = str_replace(basename(__FILE__),"",__FILE__);
$files = scandir($base_path."/"."views");
foreach($files AS $file) {
	if(strstr($file,".php")) {
		if(str_replace(".php","",basename($_SERVER['REQUEST_URI'])) == str_replace(".php","",$file)) {
			$view = $file;	
			break;
		}
	}
}

if(!$view) {
	if(basename($_SERVER['REQUEST_URI']) == "" || is_numeric(basename($_SERVER['REQUEST_URI']))) {
	$view = "index.php";	
	} else {
	$view = "404.php";		
	}
}


include($base_path."/views/".$view);

?>
