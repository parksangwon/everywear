<html>
	<head>
	<title>My Form</title>
	</head>
	<body>


		<?php echo form_open('/Location/insertTest'); ?>

		<input type="text" name="ino" size="50" value="sangwon"/>

		<input type="text" name="date" value="20160224121212" size="50" />

		<input type="text" name="lat" value="321.321321" size="50" />

		<input type="text" name="lon" value="321.321321" size="50" />

		<input type="submit" value="Submit" />
		</form>
	</body>
</html>
