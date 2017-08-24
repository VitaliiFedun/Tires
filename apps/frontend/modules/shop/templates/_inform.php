<div class="inform height_100">
    <table class="height_100" width="100%"  cellpadding="5" cellspacing="0">
        <tr>
            <td>
                <table class="inform-table " width="90%" cellspacing="0" cellpadding="4">
                    <tr>
                        <td align="right" width="100">Favorite:</td>
                        <td align="left" width="100"> <?php echo $sf_user->getProductfavoriteCol() ?> </td>
                    </tr>
                    <tr>
                        <td align="right">Cart:</td>
                        <td align="left" width="100"> <?php echo $sf_user->getProductcartCol() ?> </td>
                    </tr>
                    <tr>
                        <td align="right">Compare:</td>
                        <td align="left" width="100"> <?php echo $sf_user->getProductcompareCol() ?> </td>
                    </tr>
                    <tr>
                        <td align="right"></td>
                        <td align="left" width="100"></td>
                    </tr>
                </table>


            </td>
        </tr>
    </table>

</div>
