<table width="100%" cellspacing="5" cellpadding="5">
    <tr>
        <td rowspan="5" width="33%">
             <img src="<?php echo $randomHotelImage; ?>" width="500px" />
        </td>
        <td width="33%">
             <?php echo $hotelName; ?>
        </td>
        <td rowspan="5" valign="center">
             <h1>
                <?php echo $hotelPrice; ?> <br />
                <span style="color: grey; font-size: 18;">per night</span>
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