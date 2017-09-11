<?php
/**
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
<?php
 $set_value = null;
 $set_value = $sf_user -> getFilterFilds($tirescategory,$key);
 $insert_str='';
if ($bool_check) {
    $insert_str=' class="options" ';
}
?>

<select  <?php echo $insert_str.'id="filter_'.$key.'"'?>
        <?php echo 'title="Set value filter for: '.$attrib_name.'"' ?>
    onchange="setvisible(<?php echo "'".$key."'"?>,'block')"
>

    <option value='empty' disabled selected>      </option>
<?php $i=1;
foreach ( $attrib_sets as $attrib_set):?>
<?php  ($set_value = $attrib_set) ? $term = 'selected':$term = ''; ?>
   <option <?php echo 'value="'.$attrib_set.'"'.$term.'>'.$attrib_set.'</option>' ?>

 <?php $i++; endforeach; ?>
        </select>
