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
			<script type="text/javascript" src="js/zipsearch-autocomplete.js"></script>

			<!-- Search Autocomplete for #citysearch -->
			<script type="text/javascript" src="js/citysearch-autocomplete.js"></script>

	</head>

	<body>

		<form action="php/search.php" method="POST">
			
			<table>
				<tr>
					<td>Enter Your Zipcode: </td>
					<td>
						<input type="text" id="zipsearch" name="zipsearch" />
					</td>
				</tr>
				<tr>
					<td>Enter You Destination: </td>
					<td>
						<input type="text" id="citysearch" name="citysearch" />
					</td>
				</tr>
				<tr>
					<td rowspan="2">
						<input type="submit">
					</td>
				</tr>
			</table>

		</form>

	</body>

</html>