<?php
$host="127.0.0.1" ;
$port=54001; # login_view_port
$timeout=30;
$sk=fsockopen($host,$port,$errnum,$errstr,$timeout) ;

if (!is_resource($sk))
{
	echo '<span style="color:#FF0000;"><strong>OFFLINE</strong></span>';
}
else
{
	echo '<span style="color:#00C000;"><strong>ONLINE</strong></span>';
}
?>