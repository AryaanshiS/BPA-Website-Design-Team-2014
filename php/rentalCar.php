<table width="100%" border="1" cellspacing="5" cellpadding="5">
    <tr>
        <td>
            <?php echo $rentalCompanyImage; ?>
        </td>
        <td colspan="3">
            <?php echo ucwords($rentalCompany); ?>
        </td>
        <td>Pick-up:</td>
        <td>Drop-off:</td>
    </tr>
    <tr>
        <td rowspan="3">
            <?php echo $rentalTypeImage; ?>
        </td>
        <td colspan="3">
            <?php echo ucwords($rentalType); ?>
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
            <?php echo $rentalPassengers[$rentalType]; ?>
        </td>
        <td>
            <?php echo $rentalLuggage[$rentalType]; ?>
        </td>
        <td>
            <?php echo $rentalDoor[$rentalType]; ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo $rentalColor[$rentalType]; ?>
        </td>
        <td colspan="2">
            <?php echo $rentalTrans; ?>
        </td>
    </tr>
</table>
