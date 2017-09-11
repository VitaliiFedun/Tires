<?php
/**H:\1_PHP\OpenServer\domains\localhost\tires\apps\frontend\modules\shop\templates\_filtr_checed.php
 * Created by PhpStorm.
 * User: user
 * Date: 25.08.2017
 * Time: 14:27
 * <?php include_partial('filtr_set',
 * array('tirescategory'=>$tirescategory,
 *       'attrib_name'=>$attrib_name ,
 *       'attrib_sets'=>$attrib_sets)) ?>
 * from _aside.php
 */
?>
<?php if (!$bool_check) return; ?>
<ul class="options">
    <?php
    $set_value = null;
    $set_values = $sf_user -> getFilterFilds($tirescategory, $key);
//    foreach ($set_values as $set_value) {
//      echo  '<li onclick="$(this).remove();"> <input type="hidden" name="ingredients[]" value="'.
//          $set_value.'" /> '. $set_value.'</li>';
//}
?>
</ul>
