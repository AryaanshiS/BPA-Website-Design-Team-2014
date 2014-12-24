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

			<!-- Search Autocomplete for #zipsearch -->
			<script type="text/javascript">
				jQuery(document).ready(								// Initalize jQuery after document is ready
					function()										// When document is ready, do this function
					{
						$('#zipsearch').autocomplete(				// Autocomplete search results from tags with zipsearch ID
							{
								source:'php/suggest_zip.php',		// Use this as the source for autocompletion
								minLength:2							// Do not autocomplete unless there are at least 2 charactors present
							});
					});
			</script> 


	</head>

	<body>

		<form action="php/search.php" method="POST">
			Enter a Zipcode:
			<input id="zipsearch" type="text" name="zipsearch"/>
		</form>

	</body>

</html>