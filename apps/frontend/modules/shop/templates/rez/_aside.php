<?php slot('aside') ?>

<div class="content">
    <h1> filter set:</h1>


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


    <div id="sf_admin_bar ">
        <form action="<?php echo
        url_for(array(
            'module'   => 'shop',
            'action'   => 'filter',
            'query'   => 'Marinerreset',
        )) ?>" method="post">
<!--        --><?php //echo $filter ?>
                                    <input type="submit" value="Filter">
            <?php echo link_to('Reset', 'shop_filter', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?>

<!--            url_for(array(-->
<!--            'module'   => 'shop',-->
<!--            'action'   => 'filter',-->
<!--            'query'   => '_reset',-->
<!--            )) ?>" method="post">-->
                                    <a href="shop/filter/?_reset">Reset222</a>

        </form>
                    <?php include_partial('shop/filters', array('form' => $filter, 'configuration' => $configuration)) ?>
    </div>

    <table
            width="90%" cellspacing="5" cellpadding="4">

        <div class="sf_admin_filter beginform">
<!--            <form id="VF" action="/shop/filter/action" method="post">-->
<!--<!--                -->--><?php ////echo $filter ?>
<!--                <a onclick="var f = document.createElement('form');-->
<!--                                 f.style.display = 'block';-->
<!--                                 this.parentNode.appendChild(f);-->
<!--                                 f.method = 'post';-->
<!--                                 f.action = this.href;-->
<!--                                 var m = document.createElement('input');-->
<!--                                 m.setAttribute('type', 'hidden');-->
<!--                                 m.setAttribute('name', '_csrf_token');-->
<!--                                 m.setAttribute('value', '7c063035b12d7436cdc23fd723c18a8a');-->
<!--                                 f.appendChild(m);-->
<!--                                 f.submit();return !false;"-->
<!---->
<!--                </a>-->
<!---->
<!--                <tr valign="top">-->
<!--                    <td>-->
<!--                        <img class="addtofavorite" src="/legacy/images/filter/play.png"/>-->
<!--                    </td>-->
<!---->
<!--                    <td align="left" colspan="2">-->
<!--                        <input type="submit" value="Filter">-->
<!--                        <a href="shop/filter/?_reset">Reset</a>-->
<!---->
<!--                    </td>-->
<!---->
<!--                </tr>-->
<!--            </form>-->
        </div>


        <a href="shop?filter=Acura">Afilter</a>
    </table>

<!--    http://tires.localhost/frontend_dev.php/shop?-->
<!--    tires_product_filters[name][text]=minerva-->
<!--    &tires_product_filters[uuid_category]=1-->
<!--    &tires_product_filters[price][text]=360.25-->
<!--    &tires_product_filters[price][is_empty]=on-->
<!--    &tires_product_filters[active]=-->
<!--    &tires_product_filters[fotoname][text]=-->
<!--    &tires_product_filters[slug][text]=-->
<!--    &tires_product_filters[_csrf_token]=891f0be12cfc84c5230a540bdc68fbdf-->
<!--    -->


    <?php end_slot(); ?>

    <script>
        $(function () {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 500,
                values: [75, 300],
                slide: function (event, ui) {
                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                    setvisible('price', 'block');
                }
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0) +
                " - $" + $("#slider-range").slider("values", 1));
            setvisible('price', 'block');
        });


    </script>

    <script>

        function recognized(param) {
            if (param === 'price') {
                var min = $("#slider-range").slider("option", "min");
                var max = $("#slider-range").slider("option", "max");
                $("#slider-range").slider({
                    values: [min, max]
                });
                $("#amount").val("$" + $("#slider-range").slider("values", 0) +
                    " - $" + $("#slider-range").slider("values", 1));
            }
            else {

                var selector = '#filter_'.concat(param);
                document.querySelector(selector).value = "empty";

            }
            setvisible(param, 'none');

        }


        function setvisible(event, param) {
            var selector = '#image_'.concat(event);

            $(selector).css('display', param);
//
            if (param == 'block') {
                return;
            }
            ;
            var selector = '#filter_'.concat(event);
            if ($(selector).attr("class") !== "options") {
                return;
            }
            ;

            var $ul = $(selector).next('ul');
            var inputs = $($ul).find('li');
            inputs.remove();
//        $(inputs).remove();
        }

    </script>

    <script>

        function selectIngredient(select) {
            var value = String(select.val());
            var $ul = $(select).next('ul');

            if ($ul.find('input[value="' + value + '"]').length == 0)
                $ul.append('<li onclick="$(this).remove();">' +
                    '<input type="hidden" name="ingredients[]" value="' +
                    value + '" /> ' + value + '</li>');
        }
        //

        $('select.options').on('change', function () {
            selectIngredient($(this));
        });
    </script>

