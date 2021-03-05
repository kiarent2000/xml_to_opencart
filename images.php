<html dir=ltr lang=ua>
<head>
<meta charset=UTF-8 />
</head>
<?php 
require_once('includes/config.php');
require_once('includes/connect.php');

$images = (new GetAllImages($conn))->get();

foreach($images as $image)
{
	$base_image =  'cristals.com.ua/www/image/catalog/'.basename($image);
	
	if (in_array($base_image, $contents_photo))
	{
		echo "Картинка $base_image уже есть в базе<br>";
	}
	else
	{
		echo "Новая картинка $image<br>";
		$upload = ftp_put($conn_id, $base_image , $image, FTP_BINARY);
	}
	
	
}