<div class="inform height_100">
    <table class="height_100" width="100%"  cellpadding="5" cellspacing="0">
        <tr>
            <td>
                <table class="inform-table " width="90%" cellspacing="0" cellpadding="4">
                    <tr>
                        <td align="right" >
                        <img class="addtofavorite" src="/legacy/images/favorite/favorite.png"  alt="Add to Favorite" />
                        </td>

                        <td align="left" width="100"> <?php echo $sf_user->getProductfavoriteCol() ?> </td>
<!--                    </tr>-->
<!--                    <tr>-->
                        <td align="right">
                            <img class="addtocart" src="/legacy/images/cart/checkout-light.png" alt="Add to Cart" />
                        </td>
                        <td align="left" width="100"> <?php echo $sf_user->getProductcartCol() ?> </td>
<!--                    </tr>-->
<!--                    <tr>-->
                        <td align="right">
                            <img class="addtocompare" src="/legacy/images/compare/compare-min.png" height="25" alt="Add to Compare" />
                        </td>
                        <td  align="left" width="100"> <?php echo $sf_user->getProductcompareCol() ?> </td>
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
