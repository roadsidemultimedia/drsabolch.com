<?php

/*
 * CONFIG AREA
 * edit this section to configure how you
 * want turbo-send to function
 *********************************/
 
 
$site_name = "drsabolch.com";
$to_email = "info@drsabolch.com";
$subject = "New message from drsabolch.com";
$from_email = "noreply@drsabolch.com";



/* END CONFIG AREA *******************
 * Do not edit below this line
 */
 
$keys = array_keys($_POST);
$message = "Hello,\r\n";
$message.= "you have a new message from $site_name.\r\n";
foreach($keys as $k)
{
	if(!is_array($_POST[$k]))
	{
		$message.= "$k: {$_POST[$k]}\r\n";
	}
	else
	{
		$message.= "$k: ".implode(", ", $_POST[$k])."\r\n";
	}
}
$message.= "";

$header  = "From:$from_email";

mail($to_email, $subject, $message, $header);

require("template.php");

?>
