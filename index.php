<!DOCTYPE html>

<html>
	
	<head>

		<title>Index</title>

		<!-- Include Head Files -->
		<?php include('si/head.html'); ?>
		
	</head>

	<body>

		<form action="php/search.php" method="GET">
			
			<table>
				<tr>
					<td>
						<p>Enter Your Zipcode:</p>
					</td>
					<td>
						<p>Enter You Destination:</p>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" id="zipsearch" name="zipsearch" />
					</td>
					<td>
						<input type="text" id="citysearch" name="citysearch" />
					</td>
				</tr>
				<tr>
					<td>
						<p>Enter Departure Date:</p>
					</td>
					<td>
						<p>Enter Return Date:</p>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" id="departureDate" name="departureDate" />
					</td>
					<td>
						<input type="text" id="returnDate" name="returnDate" />
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit">
					</td>
				</tr>
			</table>

		</form>

	</body>

</html>