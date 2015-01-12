<table width="100%" cellspacing="5" cellpadding="5" border="1px">
    <tr>
        <td rowspan="5">
             <?php echo $randomHotelImage; ?>
        </td>
        <td>
             <?php echo $hotelName; ?>
        </td>
        <td rowspan="5">
             <h1>
                <center>
                    <?php echo $hotelPrice; ?>
                </center>
             </h1>
        </td>
    </tr>
    <tr>
        <td>
             <?php echo $hotelStar; ?> - <?php echo $hotelRating; ?>
        </td>
    </tr>
    <tr>
        <td>
             <hr />
             <?php echo $discountInfo; ?>
             <hr />
        </td>
    </tr>
    <tr>
        <td>
             <?php echo $distanceInfo; ?>
        </td>
    </tr>
    <tr>
        <td>
             <?php echo $hotelView; ?>
        </td>
    </tr>
</table>