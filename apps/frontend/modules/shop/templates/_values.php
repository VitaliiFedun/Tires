<?php
/**
 * Created by PhpStorm.
 * User: 2
 * Date: 04.08.2017
 * Time: 23:06
 */

?>

<table class="disco">
    <tbody>
<?php foreach ($valuessets as $i =>$valuesset):     ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
        <td>
            <?php echo $valuesset-> getTiresAttribute();  ?> </td>
        <td> <?php echo $valuesset->getValue(); ?> </td>

    </tr>

    <?php endforeach; ?>


</tbody>
</table>
 <hr>

