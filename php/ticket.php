<table width="100%" cellspacing="5" cellpadding="5">
    <tr>
        <td colspan="6">
            <?php echo $ticketTitle; ?>
        </td>
    </tr>
    <tr>
        <td>Leave:</td>
        <td colspan="2">
            <?php echo $departureDate ?>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td rowspan="5">
            <?php echo $ticketPrice ?>
        </td>
    </tr>
    <tr>
        <td><p>
            <?php echo $firstDepartureTime ?>
        <br>
        
            <?php echo $airportNearLocationCity ?>
         - 
            <?php echo $airportNearLocationCallsign ?>
        </p></td>
        <td>&#8594;</td>
        <td>
            <?php echo $firstArrivalTime ?>
        <br>
        
            <?php echo $airportNearDestinationCity ?>
         - 
            <?php echo $airportNearDestinationCallsign ?>
        </td>
        <td>Time<br>
        
            <?php echo $hoursOfFlight ?>
        </td>
        <td>
            <?php echo $departureAirlineName ?>

            <?php echo $departureFlightNumber ?>
        </td>
    </tr>
    <tr>
        <td colspan="5"><hr /></td>
    </tr>
    <tr>
        <td>Return:</td>
        <td colspan="2">
            <?php echo $returnDate ?>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>
            <?php echo $secondDepartureTime ?>
        <br>
        
            <?php echo $airportNearDestinationCity ?>
         - 
            <?php echo $airportNearDestinationCallsign ?>
        </td>
        <td>&#8594;</td>
        <td><p>
            <?php echo $secondArrivalTime ?>
        <br>
        
            <?php echo $airportNearLocationCity ?>
         - 
            <?php echo $airportNearLocationCallsign ?>
        </p></td>
        <td>Time<br>
        
            <?php echo $hoursOfFlight ?>
        </td>
        <td>
            <?php echo $destinationAirlineName ?>

        
            <?php echo $returnFlightNumber ?>
        </td>
    </tr>
</table>