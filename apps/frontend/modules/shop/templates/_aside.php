<?php slot('aside') ?>

<div class="content">
    <h1> filter set:</h1>
    <div id="sf_admin_bar ">

        <div id="sf_admin_bar ">
            <?php include_partial('shop/filters',
                array('form' => $filters,
                    'configuration' => $configuration,
//                     'bool_check' => $bool_check,
//                        'key' => $key,
                        'tirescategory' => $tirescategory,
//                        'attrib_name' => $attrib_name,
//                        'attrib_sets' => $attrib_sets
                    ))
            ?>
        </div>
    </div>

    <?php end_slot(); ?>
    <?php
//    $max_price=this gett
    ?>

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
                $("#tires_product_filters_pricefrom").val(min);
                $("#tires_product_filters_priceto").val(max);
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

        function initslider(value)
        {
            var minset = 0;
            var maxset = parseInt(value)+1;
            var minvalue = minset;
            var maxvalue = maxset;

//            alert('value priceto='+$("#tires_product_filters_priceto").val());
            if ($("#tires_product_filters_priceto").val()>0 ) {
                minvalue =  $("#tires_product_filters_pricefrom").val() ;
                maxvalue = $("#tires_product_filters_priceto").val() ;
            }

                $("#slider-range").slider({
                    range: true,
                    min: minset,
                    max: maxset,
                    values: [minvalue, maxvalue]
                });

//                $("#tires_product_filters_pricefrom").val(min);
//                $("#tires_product_filters_priceto").val(max);

        }

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

