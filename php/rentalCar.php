<table width="100%" cellspacing="5" cellpadding="5">
    <tr>
        <td>
            <img class="border" src="<?php echo $rentalCompanyImage; ?>" width="200px" />
        </td>
        <td colspan="3">
            <?php echo ucwords($rentalCompany); ?>
        </td>
        <td>Pick-up:</td>
        <td>Drop-off:</td>
        <td rowspan="3">
            <h1>
                <?php echo $rentalPrice[$rentalType]; ?>
                <br>
                <span style="font-size: 12px">per day</span>
            </h1>
        </td>
    </tr>
    <tr>
        <td rowspan="3">
            <img src="<?php echo $rentalTypeImage; ?>" width="200px" />
        </td>
        <td colspan="3">
            <p>Type: <?php echo ucwords($rentalType); ?></p>
        </td>
        <td rowspan="3">
            <?php echo $departureDate; ?>
        </td>
        <td rowspan="3">
            <?php echo $returnDate; ?>
        </td>
    </tr>
    <tr>
        <td>
            <p>Passengers: <?php echo $rentalPassengers[$rentalType]; ?></p>
        </td>
        <td>
            <p>Bags: <?php echo $rentalLuggage[$rentalType]; ?></p>
        </td>
        <td>
            <p>Doors: <?php echo $rentalDoor[$rentalType]; ?></p>
        </td>
    </tr>
    <tr>
        <td>
            <p>Color: <?php echo $rentalColor[$rentalType]; ?></p>
        </td>
        <td colspan="2">
            <p>Transmission <?php echo $rentalTrans; ?></p>
        </td>
    </tr>
</table>
