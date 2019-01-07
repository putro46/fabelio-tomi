<head>
	<title>Fabelio</title>
</head>
<?php
	include 'connection.php';

	$sql = "SELECT name, price, description, url FROM products";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        ?>

	    <table>
	    	<tr>
	    		<td>
	    			<b><?php echo $row['name']; ?></b><br>
	    			<?php echo $row['price']; ?><br>
	    			<?php echo $row['description']; ?>
	    			<a href="<?php echo $row['url']; ?>"><?php echo $row['url']; ?></a><br>
	    			<hr>
	    		</td>
	    	</tr>
	    </table>    
	        <?php
	    }
	} else {
	    echo "No data";
	}
	$conn->close();
	echo '<br><b><a href="index.php">Index</a></b><br><br>';
?>