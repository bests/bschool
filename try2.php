<!doctype html>
<html>
	<head>
		<title>Slidebars Basic Template</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Slidebars CSS -->
		<link rel="stylesheet" href="css/slidebars.min.css">
	</head>
	
	<body>	
		<div id="sb-site">
			<!-- Your main site content here. -->
		</div>
		
		<div class="sb-slidebar sb-left">
			<!-- Your left Slidebar content. -->
		</div>
		
		<div class="sb-slidebar sb-right">
			<!-- Your right Slidebar content. -->
		</div>
				
		<!-- jQuery -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		
		<!-- Slidebars -->
		<script src="js/vendor/slidebars.min.js"></script>
		<script>
			(function($) {
				$(document).ready(function() {
					$.slidebars();
				});
			}) (jQuery);
		</script>
	</body>
</html>