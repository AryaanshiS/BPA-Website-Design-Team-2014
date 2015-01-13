<!DOCTYPE html>
<html lang="en">

	<head>

		<title>Index</title>

		<!-- Include Head Files -->
		<?php include('si/head.html'); ?>
		
	</head>

	<body>

		<form action="php/search.php" method="GET">
			
			<table>
			    <tr>
			        <td colspan="2"><div align="center">Location Information<br />
			            </div>
			            <hr /></td>
			    </tr>
			    <tr>
			        <td><p>Enter Your Zipcode:</p></td>
			        <td><p>Enter You Destination:</p></td>
			    </tr>
			    <tr>
			        <td><input type="text" id="zipsearch" name="zipsearch" /></td>
			        <td><input type="text" id="citysearch" name="citysearch" /></td>
			    </tr>
			    <tr>
			        <td colspan="2"><div align="center">Date Information<br />
			            </div>
			            <hr /></td>
			    </tr>
			    <tr>
			        <td><p>Enter Departure Date:</p></td>
			        <td><p>Enter Return Date:</p></td>
			    </tr>
			    <tr>
			        <td><input type="text" id="departureDate" name="departureDate" /></td>
			        <td><input type="text" id="returnDate" name="returnDate" /></td>
			    </tr>
			    <tr>
			        <td colspan="2"><div align="center">Other Options</div>
			            <br/>
			            <hr /></td>
			    </tr>
			    <tr>
			        <td colspan="2">Hotel<br />
			            <hr /></td>
			    </tr>
			    <tr>
			        <td>I want a hotel for the duration of my trip:</td>
			        <td><input name="hotel" id="hotel" type="radio" value="yes"></td>
			    </tr>
			    <tr>
			        <td colspan="2">&nbsp;</td>
			    </tr>
			    <tr>
			        <td colspan="2">Rental Car<br />
			            <hr /></td>
			    </tr>
			    <tr>
			        <td>I want a rental car for the duration of my trip:</td>
			        <td><input name="rental" id="rental" type="radio" value="yes"></td>
			    </tr>
			    <tr>
			        <td>I want my rental car from:</td>
			        <td><select name="rentalCompany" id="rentalCompany">
			            <option value="advantage">Advantage</option>
			            <option value="dollar">Dollar</option>
			            <option value="budget">Budget</option>
			            <option value="alamo">Alamo</option>
			            <option value="enterprise">Enterprise</option>
			            <option value="hertz">Hertz</option>
			            <option value="avis">AVIS</option>
			            <option value="national">National</option>
			        </select></td>
			    </tr>
			    <tr>
			        <td>I want a car from the class of:</td>
			        <td><select name="rentalCarClass" id="rentalCarClass">
			            <option value="economy">Economy</option>
			            <option value="compact">Compact</option>
			            <option value="standard">Standard</option>
			            <option value="van">Van</option>
			            <option value="suv">SUV</option>
			            <option value="pickup">Pickup</option>
			        </select></td>
			    </tr>
			    <tr>
			        <td><input type="submit"></td>
			    </tr>
			</table>

		</form>

	</body>

</html>