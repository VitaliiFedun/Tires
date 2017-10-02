<?php
/**apps/frontend/modules/shop/templates/rez/_filters_end.php:2
 * Created by PhpStorm.
 * User: user
 * Date: 11.09.2017
 * Time: 18:35
 */
?>
<?php
if (!isset($attribnames)) {
    $go = new Goodest();
    $go->setGoodCharname();
    $attrib_names = $go->getGoodCharname();
    $attrib_checed = $go->getGoodCharbool();

}

?>



<table class="super-table " width="90%" cellspacing="5" cellpadding="4">
<tr>
            <td align="right">
                <img class="addtofavorite" id="image_price"
                     src="/legacy/images/filter/delete (2).png"
                     alt="Remote" style="display: none"
                     onclick="recognized('price')"/>
            </td>

            <td align="left" width="100"> <?php echo "Price" ?>
</td>

<td align="right">
    <?php include_partial('rangeselect') ?>
</td>
</tr>
<tr valign="middle">
    <td>
        <img class="addtofavorite" src="/legacy/images/filter/play.png"
             alt="Remote" style="display: block"
             onclick="recognized('price')"/>
    </td>

    <td align="left" colspan="2">
        <div id="slider-range"></div>
    </td>
</tr>


<?php foreach ($attrib_names[$tirescategory] as $key => $attrib_name): ?>

    <?php
    $attrib_sets = null;
    $attrib_sets = $go->GetArrayOfSets($attrib_name, $tirescategory);
    $bool_check = $attrib_checed[$tirescategory][$key];
    ?>

    <tr valign="top"> <!--Add icon for attribute name-->
        <td align="right">
            <img class="addtofavorite img_filter"

                <?php echo 'id="image_' . $key . '"' ?>
                 src="/legacy/images/filter/delete (2).png" alt="Remote"
                 style="display: none"
                 onclick="recognized(<?php echo "'" . $key . "'" ?>)"/>

        </td>

        <td align="left" width="100"> <?php echo $attrib_name ?> </td>

        <td align="left">
            <?php include_partial('filtr_set', array('bool_check' => $bool_check,
                'key' => $key,
                'tirescategory' => $tirescategory,
                'attrib_name' => $attrib_name,
                'attrib_sets' => $attrib_sets)) ?>

            <?php include_partial('filtr_checed', array('bool_check' => $bool_check,
                'key' => $key,
                'tirescategory' => $tirescategory,
                'attrib_name' => $attrib_name,
                'attrib_sets' => $attrib_sets)) ?>
        </td>


    <tr valign="top">
        <td>
        </td>

        <td align="left" colspan="2">

        </td>

    </tr>
<?php endforeach; ?>

</table>

