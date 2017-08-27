<?php use_stylesheet('jquery-ui.min.css') ?>
<?php use_javascript('jquery.js') ?>
<?php use_javascript('jquery-ui.min.js') ?>
<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.08.2017
 * Time: 0:52
 */
?>

	<!-- Script -->
	<script>
$( function() {
    $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 500,
                values: [ 75, 300 ],
                slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
    }
            });
            $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
                " - $" + $( "#slider-range" ).slider( "values", 1 ) );
        } );
	</script>
<!--</head>-->
<!--<body>-->
<div class="rangeselect">
<p>
	<label for="amount"></label>
	<input type="text" id="amount" readonly style="
	border:1px solid #c5c5c5;
	margin-top: 10px;
	margin-left: -10px;
	 /*color:#5156ff;*/
	  /*font-weight:bold;*/
	   font-size: 12pt">
</p>
</div>

