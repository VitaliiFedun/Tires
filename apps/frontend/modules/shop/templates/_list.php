<?php //use_stylesheets_for_form($form) ?>
<?php //use_javascripts_for_form($form) ?>
<?php
/**
 * Created by PhpStorm.
 * User: 2
 * Date: 04.08.2017
 * Time: 22:57
 */
?>

<?php $i=1 ?>

<table class = 'disco'>
    <tbody>
    <tr class="<?php echo fmod($i++, 2) ? 'even' : 'odd' ?>">
        <td>Uuid:</td>
        <td><?php echo $tiresproduct->getuuid() ?></td>
    </tr>
    <tr class="<?php echo fmod($i++, 2) ? 'even' : 'odd' ?>">
        <td>Name:</td>
        <td><?php echo $tiresproduct->getname() ?></td>
    </tr>
    <tr class="<?php echo fmod($i++, 2) ? 'even' : 'odd' ?>">
        <td>Uuid category:</td>
        <td><?php echo $tiresproduct->getTiresCategory() ?></td>
    </tr>
    <tr class="<?php echo fmod($i++, 2) ? 'even' : 'odd' ?>">
        <td>Price:</td>
        <td><?php echo $tiresproduct->getprice() ?></td>
    </tr>
    <tr class="<?php echo fmod($i++, 2) ? 'even' : 'odd' ?>">
        <td>Active:</td>
        <td><?php echo $tiresproduct->getactive() ?></td>
    </tr>
    <tr class="<?php echo fmod($i++, 2) ? 'even' : 'odd' ?>">
        <td>Slug:</td>
        <td><?php echo $tiresproduct->getslug() ?></td>
    </tr>

    <tr class="<?php echo fmod($i++, 2) ? 'even' : 'odd' ?>">
        <td>Fotoname:</td>
        <td><?php echo $tiresproduct->getFotoname() ?>  </td>
    </tr>

    <tr class="<?php echo fmod($i++, 2) ? 'even' : 'odd' ?>">
        <td>Image:</td>
        <td>
          <img
            width="100" height="100"
            src=    <?php echo '/uploads/products/'.$tiresproduct->getFotoname() ?>
            alt=<?php echo $tiresproduct->getName() ?>
          >
        </td>
    </tr>
    </tbody>
</table>
<hr />
