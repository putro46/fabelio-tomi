<head>
	<title>Fabelio</title>
</head>
<?php
	include('simple_html_dom.php');
	include('connection.php');
	
	function scraping_generic($url, $conn) {
	$check_if_exist = "SELECT url FROM products WHERE url = '$url'";
		$result = $conn->query($check_if_exist);

		if ($result->num_rows > 0) {
			echo '<script type="text/javascript">',
			     "alert('product is exists, please choose another product');",
			     '</script>'; ?>
			     <!DOCTYPE html>
			     <html>
			     <head>
			     	<meta http-equiv="refresh" content="0; url=http://localhost/fabelio" />
			     	<title></title>
			     </head>
			     <body>
			     
			     </body>
			     </html>

	<?php 
		} else {
		$return = false;
	    $html = file_get_html($url);

	foreach($html->find("div[class=column main]") as $link) {
		$return - true;
		$item['name'] = $link->find("h1[class=page-title]", 0)->innertext;
		$item['price'] = $link->find("span[class=price]", 0)->innertext;
		$item['desc'] = $link->find("div[id=description]", 0)->innertext;
		//$item['img'] = $link->find("div[class=fotorama__stage__frame fotorama_horizontal_ratio fotorama__loaded fotorama__loaded--img fotorama__active]", 0)->href;

		$name = html_entity_decode(trim($item['name']));
		$price = html_entity_decode(trim($item['price']));
		$desc = html_entity_decode(trim($item['desc']));
		//$img = html_entity_decode(trim($item['img']));
		$dt = new DateTime();
		$dt->setTimestamp(time());
		$dt->setTimezone(new DateTimeZone('Asia/Jakarta'));
		$created_at = $dt->format('Y-m-d H:i:s');
		
		echo '<b>'.$name.'</b><hr>';
		echo $price.'<hr>';
		echo $desc.'<hr>';
		echo 'Created at '.$created_at.'<hr>';
		echo '<b><a href="list.php">Product List</a></b><br><br>';
		echo '<b><a href="index.php">Index</a></b>';			

			$sql = "INSERT INTO 
					products (name, price, description, url, created_at) 
				VALUES ('$name', '$price', '$desc', '$url', '$created_at')";
			$result = $conn->query($sql);
			if(!$result) {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}			 
			$conn->close();	
		}

		
	}
	$html->clear();
	unset($html);
	return $return;
}
			
if (isset ($_POST['submit'])) {
	$response = scraping_generic($_POST['url'], $conn);
}
?>