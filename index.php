<!DOCTYPE html>

<html>
	
	<head>

		<title>Index</title>


		<!-- CSS -->

			<!-- jQuery UI -->
			<link rel="stylesheet" href="css/jquery-ui.css">

			<!-- jQuery UI Structure -->
			<link rel="stylesheet" href="css/jquery-ui.structure.css">

			<!-- jQuery UI Theme -->
			<link rel="stylesheet" href="css/jquery-ui.theme.css">



		<!-- JAVASCRIPT -->

			<!-- jQuery -->
			<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>

			<!-- jQuery UI -->
			<script type="text/javascript" src="js/jquery-ui.js"></script>

			<!-- Search Autocomplete -->
			<script type="text/javascript">
				jQuery(document).ready(function(){
					$('#zipsearch').autocomplete({source:'php/suggest.php', minLength:2});
				});
			</script> 
		

	</head>

	<body>

		<form action="php/search.php">
			Enter a Zipcode:
			<input id="zipsearch" type="text" />
		</form>

	</body>

</html>